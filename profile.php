<?php

    session_start();
    //print_r($_SESSION);
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");

    // Check if user is logged in
    if(isset($_SESSION['mybook_userid']) && is_numeric($_SESSION['mybook_userid'])){
        $id = $_SESSION['mybook_userid'];
        $login = new Login();
        $result = $login->check_login($id);

        if($result){
            // User is logged in. Retrieve user data
            

        } else{
            header("Location: login.php");
            die; // Doesn't load the rest of the page
        }
    }else{
        header("Location: login.php");
        die; // Doesn't load the rest of the page
    }

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
        <br>
        <div id="blue_bar">
            <div style="width: 800px; margin: auto; font-size: 30px;">
                MyBook &nbsp &nbsp
                <input type="text" id="search_box" placeholder="Search for people">
                <img src="social_images/user1.jpg" style="width: 50px; float:right;">
            </div>
        </div>

        <!-- Cover area -->
        <div style="width: 800px; min-height: 400px; margin:auto;">
            <div style="background-color: white; text-align: center; color: #405d9b">
                <img src="social_images/mountain.jpg" style="width:100%">
                <img src="social_images/user1.jpg" id="profile_pic">
                <br>
                <div style="font-size: 20px">Tom Bandar</div>
                <br>
                <div id="menu_buttons">Timeline</div>
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

                        <div id="friends">
                            <img id="friends_img" src="social_images/selfie.jpg">
                            <br>
                            First User
                        </div>

                        <div id="friends">
                            <img id="friends_img" src="social_images/user2.jpg">
                            <br>
                            Second User
                        </div>

                        <div id="friends">
                            <img id="friends_img" src="social_images/user3.jpg">
                            <br>
                            Third User
                        </div>

                        <div id="friends">
                            <img id="friends_img" src="social_images/user4.jpg">
                            <br>
                            Forth User
                        </div>
                    </div>
                </div>

                <!-- Posts area -->
                <div style="min-height: 400px; flex:2.5; padding: 20px; padding-right: 0px;"> <!-- Flex to divide between 2 div unequally-->

                    <!-- Post it box -->
                    <div style="background-color:white; border: solid thin #aaa; padding: 10px">
                        <textarea placeholder="What's on your mind?"></textarea>
                        <input type="submit" id="post_button" value="Post">
                        <br>
                    </div>

                    <!-- Posts -->
                    <div id="post_bar">

                        <!-- Post 1 -->
                        <div id="post">
                            <div>
                                <img src="social_images/user3.jpg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b">Third User</div>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #999">April 23 2020</span> <!-- Span keeps the element in the same line-->
                        
                            </div>
                        </div>

                        <!-- Post 2 -->
                        <div id="post">
                            <div>
                                <img src="social_images/selfie.jpg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b">First User</div>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #999">April 23 2020</span> <!-- Span keeps the element in the same line-->
                        
                            </div>
                        </div>

                        <!-- Post 3 -->
                        <div id="post">
                            <div>
                                <img src="social_images/user2.jpg" style="width: 75px; margin-right: 4px;">
                            </div>
                            <div>
                                <div style="font-weight: bold; color: #405d9b">Second User</div>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            <br><br>
                            <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #999">April 23 2020</span> <!-- Span keeps the element in the same line-->
                        
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            
        </div>
        
    </body>
</html>