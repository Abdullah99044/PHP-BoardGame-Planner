<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\signUp.control.php';

echo SignUp_control::signUp();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'pageParts/head.php'; ?>
    <title>Sign up | Meesterproef</title>
</head>
<body>

    <header class="header">
        <?php include 'pageParts/header.php'; ?>
    </header>



    <article>

        <form method="POST" action="signUppage.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="password" placeholder="Password" required>
            <input type="text" name="email" placeholder="email" required>
            <input type="submit" name="submit" value="signUp">
        </form>

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>