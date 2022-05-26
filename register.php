<?php
    // Include config file
    require_once "config.php";
    
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username=$_POST["username"];
        $password=$_POST["password"];
    
        //check if username already exists
        $sql = "SELECT COUNT(*) FROM users WHERE username='$username';";
        $row = $link->query($sql)->fetch_row();
        $userExists= (bool)(int)$row[0];

        if($userExists){
            echo '<script>alert("This username is already taken")</script>';
        }

        //if username is not taken, insert into database
        else{
            $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$password')";

            if(!$result = $link->query($sql)){
                echo '<script>alert("sql error: " . mysqli_error($link);)</script>';
            }
            else{
                echo '<script>alert("Account created")</script>';
            }

        }

    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        
    </head>
    <body>
        <div class="inputBox">
            <form onsubmit="return validateForm()" method="post">
                <label>Username</label><br>
                <input type="text" id="username" name="username" required><br>

                <label>Password</label><br>
                <input type="password" id="password" name="password" required><br>

                <label>Confirm password</label><br>
                <input type="password" id="password2" name="password2" required><br><br>

                <input type="submit" value="Sign up">
            </form>


            <p>Already have an account?</p>
            <a href="index.php">Log in here</a>

        </div>

    </body>
</html>

