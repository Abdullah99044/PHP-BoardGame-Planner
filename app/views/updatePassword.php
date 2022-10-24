<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_userInfo.control.php';


App::check_login();

echo UpdateInfo::passwordUpdate();
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'pageParts/head.php'; ?>
    <title>Wachtwoord updaten | Meesterproef</title>
</head>
<body>


    <header class="header">
        <?php include 'pageParts/header.php'; ?>
    </header>

    
    <article class="article">

        <form method="POST" action="">

            <label for="username">Write your curnet password <br></label>
            <input type="text" name="password" placeholder="Password" required>
            <label ><br></label>
            <label for="password">Write your new password <br></label>
            <input type="text" name="newPassword" placeholder="newPassword" required>
            <input type="submit" name="submit"  onclick="myFunction()" value="update">

        </form>

    
    </article>



<footer>
    <?php include 'pageParts/footer.php'; ?>
</footer>


</body>
</html>




 

