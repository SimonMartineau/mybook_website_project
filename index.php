<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");

    $id = $_SESSION['mybook_userid'];
    $login = new Login();
    $user_data = $login->check_login($id);
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
            margin-top: 20px;
            color: #405d9b;
            padding: 8px; /*Determines how an element will sit in a container */
            text-align: center;
            font-size: 20px;
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

            <!-- Below cover area -->
            <div style="display: flex;">

                <!-- Friends area -->
                <div style="min-height: 400px; flex:1;">

                    <div id="friends_bar">
                        <img src="social_images/user1.jpg" id="profile_pic"><br>
                        <a href="profile.php" style="text-decoration: none">
                            <?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?>
                        </a>
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