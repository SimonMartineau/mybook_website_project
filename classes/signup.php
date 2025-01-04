<?php

class Signup
{
    private $error = "";

    // Analyses data sent by user
    public function evaluate($data){
        // code ...
        foreach ($data as $key => $value) {
            if(empty($value)){
                $this->error = $this->error . $key . " is empty!<br>"; // .= to concatenate errors if multiple
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
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];

        // Auto create these
        $userid = $this->create_userid();
        $url_address = strtolower($first_name) . "." . strtolower($last_name);


        $query = "insert into users (userid, first_name, last_name, gender, email, password, url_address)
                  values ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";
        
        return $query;
        
        //$DB = new Database();
        //$DB->save($query);
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