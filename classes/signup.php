<?php

class Signup{
    private $error = "";

    // Analyses data sent by user
    public function evaluate($data){
        // Checking every input from the user.
        foreach ($data as $key => $value) {
            if ($key == "first_name"){
                if (empty($value)){
                    $this->error = $this->error . "First name is empty.<br>"; // .= to concatenate errors if multiple
                } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$value)){
                    $this->error = $this->error . " Please enter a valid first name.<br>";
                }
            }

            if ($key == "last_name"){
                if (empty($value)){
                    $this->error = $this->error . "Last name is empty.<br>";
                } elseif (!preg_match("/^[a-zA-Z-' ]*$/",$value)){
                    $this->error = $this->error . " Please enter a valid last name.<br>";
                }
            }

            if ($key == "email"){
                if (empty($value)){
                    $this->error = $this->error . "Email is empty.<br>";
                } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->error = $this->error . " Please enter a valid email.<br>";

                }
            }

            if ($key == "password"){
                if (empty($value)){
                    $this->error = $this->error . "Password is empty.<br>";
                }
            }

            if ($key == "password-re"){
                if (empty($value)){
                    $this->error = $this->error . "Repeat password is empty.<br>";
                }
            }




        }

        // If no error, create user profile. Otherwise, echo error
        if($this->error == ""){
            // No error
            $this->create_user($data);

        } else{
            return $this->error;
        }
    }

    public function create_user($data){
        $first_name = ucfirst($data['first_name']); // ucfirst makes first letter capital.
        $last_name = ucfirst($data['last_name']);
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];

        // Auto create these
        $userid = $this->create_userid();
        $url_address = strtolower($first_name) . "." . strtolower($last_name);


        $query = "insert into users (userid, first_name, last_name, gender, email, password, url_address)
                  values ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";
                
        // Send data to db
        $DB = new Database();
        $DB->save($query);
    }

    private function create_userid(){

        $length = rand(4,19);
        $number = "";
        for ($i=1; $i<$length; $i++){
            $new_rand = rand(0,9);
            $number .= $new_rand;
        }
        return $number;
    }

    
}

?>