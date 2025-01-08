<?php

class Login{

    private $error = "";

    public function evaluate($data){
        $email = addslashes($data['email']); // addslashes to protect from confusion and add security
        $password = addslashes($data['password']);

        $query = "select * from users where email = '$email' limit 1";
                
        // Send data to db
        $DB = new Database();
        $result = $DB->read($query);

        if ($result){
            $row = $result[0];

            if ($password == $row['password']){
                // Create session data
                $_SESSION['mybook_userid'] = $row['userid'];
                
            } else{
                $this->error .= "wrong password<br>";
            }
        } else{
            $this->error .= "No such email was found<br>";
        }

        return $this->error;
    }

    public function check_login($id){
        if(is_numeric($id)){

            $query = "select * from users where userid = '$id' limit 1";
                    
            // Send data to db
            $DB = new Database();
            $result = $DB->read($query);

            if($result){
                $user_data = $result[0];
                return $user_data; // The user was found
            } else{
                header("Location: login.php");
                die; // Doesn't load the rest of the page
            }
        } else{  // Check if user is logged in
            header("Location: login.php");
            die;
        }
    }
}