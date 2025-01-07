<?php

class Post{

    private $error = "";

    public function create_post($userid, $data){
        // If the post is not empty, add into the database.
        if (!empty($data['post'])){
            $post = addslashes($data['post']); // addslashes for security
            $postid = $this->create_postid();
            
            $query = "insert into posts (postid, userid, post) values ('$postid', '$userid', '$post')";

            $DB = new Database();
            $DB->save($query);
            
        } else{  // If the post is empty
            $this->error .= "Post is empty.<br>";

        }
        return $this->error;
    }

    private function create_postid(){

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