<?php

    include("classes/connect.php");
    include("classes/signup.php");

    // Variables to keep user input data if failed submit
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";

    // Check if user has submitted info
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $signup = new Signup();
        $errors = $signup->evaluate($_POST);

        // If there are errors 
        if($errors != ""){
            echo "<div style='text-align:center; font-size:12px; color:white; background-color:grey;'> ";
            echo "The following errors occured:<br><br>";
            echo $errors;
            echo "</div>";

            // Re-enter user input data in prompts
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
        }
        else{
            // Reset the user input variables.
            $first_name = "";
            $last_name = "";
            $gender = "";
            $email = "";

            // Changing the page.
            header("Location: login.php");
            die; // Ending the script
        }    
    }
?> 


<html>
    <head>

        <title>MyBook | Sign up</title>
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
            <div id="signup_button">Log in</div>
        </div>

        <div id="login_bar">
            Sign up to MyBook<br><br>

            <form method="post" action="signup.php">
                <input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First name"><br><br>
                <input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last name"><br><br>
                <span style="font-weight: normal">Gender:</span><br>
                <select name="gender" id="text">
                    <option><?php echo $gender ?> </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br><br>
                <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>
                <input name="password" type="password" id="text" placeholder="Password"><br><br>
                <input name="password_re" type="password" id="text" placeholder="Retype-Password"><br><br>
                <input type="submit" id="button" value="Sign up"><br><br><br>
            </form>

        </div>
        
    </body>
</html>