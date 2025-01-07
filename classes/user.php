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
}




?>