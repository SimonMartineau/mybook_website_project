<div id="friends">
    <?php
        $default_image_link = "";
        if($FRIEND_ROW['gender'] == "Male"){
            $default_image_link = "social_images/user_male.jpg";
        } else{
            $default_image_link = "social_images/user_female.jpg";
        }
    ?>

    <img id="friends_img" src="<?php echo $default_image_link ?>">
    <br>
    <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name']?>
</div>