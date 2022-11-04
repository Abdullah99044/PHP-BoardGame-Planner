<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_userInfo.control.php';

App::check_login();

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



    <article class="article">

        <div class="anchorBox" >

            <a   class="pageButtons" href="updatePassword.php" >Wachtwoord updaten </a>

            <a   class="pageButtons" class="updateEmaillink" href="updateEmail.php"> Email updaten </a>

        </div>

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>