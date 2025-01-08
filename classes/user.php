<?php

class User{

    public function get_data($id){

        $query = "select * from users where userid = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result){
            // We got the data
            $row = $result[0]; // Just get one user's records, not many
            return $row;

        } else{
            // We didn't get the data
            return false;
        }
    }

    public function get_user($id){
        $query = "select * from users where userid = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result){
            return $result[0];
        }else{ // Couldn't find user
            return false;
        }
    }

    public function get_friends($id){
        $query = "select * from users where userid != '$id'";

        $DB = new Database();
        $result = $DB->read($query);

        if($result){
            return $result;
        }else{ // Couldn't find user
            return false;
        }
    }
}




?>