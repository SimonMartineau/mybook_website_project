<div id="post">
    <div>
        <?php
            $default_image_link = "";
            if($ROW_USER['gender'] == "Male"){
                $default_image_link = "social_images/user_male.jpg";
            } else{
                $default_image_link = "social_images/user_female.jpg";
            }

        ?>
        <img src="<?php echo $default_image_link ?>" style="width: 75px; margin-right: 4px;">
    </div>
    <div>
        <div style="font-weight: bold; color: #405d9b"><?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name'] ?></div>
        <?php echo $POST_ROW['post']?>

        <br><br>

        <a href="">Like</a> . <a href="">Comment</a> . 
        <span style="color: #999">  <!-- Span keeps the element in the same line-->
            <?php echo $POST_ROW['date'] ?>
        </span> 

    </div>
</div>