<?php
// Include config file
require_once "config.php";
 
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username=$_POST["username"];
    $password=$_POST["password"];
    
    //check if account exists with given username and password
    $sql = "SELECT COUNT(*) FROM users WHERE username='$username' AND password='$password';";

    $result = $link->query($sql);
    if(!$result){
        echo '<script>alert("sql error: " . mysqli_error($link);)</script>';
    }
    $row = $result->fetch_row();//number of accounts with this username-password combination
    $correctInfo= (bool)(int)$row[0];


    if($correctInfo){
        header("Location: access.html");
    }
    else{//if username or password was incorrect
        $sql = "SELECT COUNT(*) FROM users WHERE username='$username';";
        $row = $link->query($sql)->fetch_row();
        $userExists= (bool)(int)$row[0];
        if($userExists){
            echo '<script>alert("Incorrect password")</script>';
        }
        else{
            echo '<script>alert("Incorrect username")</script>';
        }
    }


}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
        <div class="inputBox">
            <form method="post">
                <label>Username</label><br>
                <input type="text" id="username" name="username" required><br>

                <label>Password</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" value="Log in">
            </form>

            <p>Don't have an account?</p>
            <a href="register.php">Sign up here</a>

        </div>

    </body>
</html>

