<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\login.control.php';

echo Login_control::login();

?>



<!DOCTYPE html> 
<html lang="en">
<head>
    <?php include 'pageParts/head.php'; ?>
    <title>Login | Meesterproef</title>
</head>
<body>



    <header class="header">

    <?php include 'pageParts/header.php'; ?>

    </header>



    <article >
        
        <form class="loginbox" method="POST" action="loginPage.php">
            <input class="loginInputText" type="text" name="username" placeholder="Username"  required>
            
            
            <input class="loginInputText" type="text" name="password" placeholder="Password"  required>
            
                
            <input class="loginButton" type="submit" name="submit" value="login">
        </form>
 
    </article>



    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>