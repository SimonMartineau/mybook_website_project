<?php

session_start(); // Important to use _SESSION variable

    include("classes/connect.php");
    include("classes/login.php");

    // Variables to keep user input data if failed submit
    $email = "";
    $password = "";


    // Check if user has submitted info
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = new Login();
        $errors = $login->evaluate($_POST);

        // If there are errors 
        if($errors != ""){
            echo "<div style='text-align:center; font-size:12px; color:white; background-color:grey;'> ";
            echo "The following errors occured:<br><br>";
            echo $errors;
            echo "</div>";

            // Re-enter user input data in prompts
            $email = $_POST['email'];
            $password = $_POST['password'];

        }
        else{
            // Reset the user input variables.
            $email = "";
            $password = "";

            // Changing the page.
            header("Location: profile.php");
            die; // Ending the script
        }    
    }
?> 

<html>
    <head>

        <title>MyBook | Log in</title>
    </head>

    <style>

        #bar{
            height:100px; 
            background-color: #3c5a99; 
            color: white; 
            padding: 4px;
            border-radius: 8px;
        }

        #signup_button{
            background-color: #42b72a;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 8px;
            float: right;
        }

        #login_bar{
            background-color: white; 
            width:800px; 
            margin: auto; 
            margin-top: 50px;
            padding: 10px;
            padding-top: 50px;
            text-align: center;
            font-weight: bold;

        }

        #text{
            height: 40px;
            width: 300px;
            border-radius: 4px;
            border: solid 1px #ccc;
            padding: 4px;
            font-size: 14px;

        }

        #button{
            width: 300px;
            height: 40px;
            border-radius: 8px;
            border: none;
            background-color: rgb(59,89,152);
            color: white;
            font-weight: bold;

        }

    </style>

    <body style="font-family: sans-serif; background-color: #e9ebee">
        <div id="bar">
            <div style="font-size:40px;">MyBook</div>
            <a href="signup.php"><div id="signup_button">Sign up</div></a>
        </div>

        <div id="login_bar">

            <form method="post">
                Log in to MyBook<br><br>

                <input name="email" value="<?php $email?>" type="text" id="text" placeholder="Email"><br><br>
                <input name="password" value="<?php $password?>" type="password" id="text" placeholder="Password"><br><br>
                <input type="submit" id="button" value="Log in"><br><br><br>

            </form>
        </div>
        
    </body>
</html>