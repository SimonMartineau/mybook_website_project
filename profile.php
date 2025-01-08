<?php

    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");

    $id = $_SESSION['mybook_userid'];
    $login = new Login();
    $user_data = $login->check_login($id);

    // Posting starts here
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $post = new Post();
        $result = $post->create_post($id, $_POST);

        if($result == ""){
            header("Location: profile.php");
            die;
        } else{
            echo "<div style='text-align:center; font-size:12px; color:white; background-color:grey;'> ";
            echo "The following errors occured:<br><br>";
            echo $errors;
            echo "</div>";
        }
    }

    // Collect posts
    $post = new Post();
    $posts = $post->get_post($id);

    // Collect friends
    $user = new User();
    $friends = $user->get_friends($id);

    


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MyBook | Profile</title>
    </head>

    <style>
        #blue_bar{
            height: 50px;
            background-color: #405d9b;
            color: #d9dfeb;
        }

        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 5px;
            border: none;
            padding: 4px;
            font-size: 14px;
            background-image: url(social_images/search.png);
            background-repeat: no-repeat; /*So image doesn't repeat*/
            background-position: right;
        }

        #profile_pic{
            width: 150px;
            margin-top: -200px; /*A negative margin will go in the opposite direction*/
            border-radius: 50%;
            border: solid 2px white;
        }

        #menu_buttons{
            width: 100px;
            display: inline-block; /*To put the buttons in a line*/
            margin: 2px;
        }

        #friends_img{
            width:75px;
            float: left; /*Wraps text around to the right of an image*/
            margin: 8px; /*To leave a gap around the image, leaves no color*/
        }

        #friends_bar{
            min-height: 400px;
            background-color: white;
            margin-top: 20px;
            color: #aaa;
            padding: 8px; /*Determines how an element will sit in a container */
        }

        #friends{
            clear: both; /*Specifies what should happen with the element that is next to a floating element*/
            font-size: 12px;
            font-weight: bold;
            color: #405d9b;
        }

        /*No # because this is going to affect all textareas, not id=textarea */
        textarea{
            width: 100%;
            border: none;
            font-family: sans-serif;
            height: 60px;
        }

        #post_button{
            float: right;
            background-color: #405d9b;
            border: none;
            color: white;
            padding: 4px;
            font-size: 14px;
            border-radius: 2px;
            width: 40px;
        }

        #post_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;

        }

        #post{
            padding: 4px;
            font-size: 13px;
            display: flex;
            margin-bottom: 20px;

        }

    </style>

    <body style="font-family: sans-serif ; background-color: #d0d8e4;">

        <!-- Top bar -->
        <?php include("header.php"); ?>

        <!-- Cover area -->
        <div style="width: 800px; min-height: 400px; margin:auto;">
            <div style="background-color: white; text-align: center; color: #405d9b">
                <img src="social_images/mountain.jpg" style="width:100%">
                <img src="social_images/user1.jpg" id="profile_pic">
                <br>
                <div style="font-size: 20px"><?php echo $user_data['first_name'] . " " . $user_data['last_name']?></div>
                <br>
                <a href="index.php"><div id="menu_buttons">Timeline</div></a>
                <div id="menu_buttons">About</div>
                <div id="menu_buttons">Friends</div>
                <div id="menu_buttons">Photos</div>
                <div id="menu_buttons">Settings</div>
            </div>

            <!-- Below cover area -->
            <div style="display: flex;">

                <!-- Friends area -->
                <div style="min-height: 400px; flex:1;">

                    <div id="friends_bar">
                        Friends <br>

                        <?php
                            if($friends){
                                foreach($friends as $FRIEND_ROW){
                                    include("user.php");
                                }
                            }
                        ?>

                    </div>
                </div>

                <!-- Posts area -->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 0px;"> <!-- Flex to divide between 2 div unequally-->

                    <!-- Post it box -->
                    <div style="background-color:white; border: solid thin #aaa; padding: 10px">
                        <form method="post">
                            <textarea name="post" placeholder="What's on your mind?"></textarea>
                            <input type="submit" id="post_button" value="Post">
                            <br>
                        </form>
                    </div>

                    <!-- Displaying posts -->
                    <div id="post_bar">

                        <?php
                            if($posts){
                                foreach($posts as $POST_ROW){
                                    $user = new User();
                                    $ROW_USER = $user->get_user($POST_ROW['userid']); // important user data
                                    include("post.php");
                                }
                            }
                        ?>

                    </div>

                </div>
            </div>
            
        </div>
        
    </body>
</html>