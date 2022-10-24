<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_userInfo.control.php';


App::check_login();

 
echo UpdateInfo::emailUpdate();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'pageParts/head.php'; ?>
    <title>Info updaten | Meesterproef</title>
</head>
<body>


    <header class="header">
        <?php include 'pageParts/header.php'; ?>
    </header>



    <article class="article">


        <form method="POST" action="">

            <label for="password">Write your curnet email <br> </label>
            <input type="text" name="email" placeholder="email" required>
            <label><br></label>

            <label for="newEmail">Write your new email <br></label>
            <input type="text" name="newEmail" placeholder="New email" required>
            <input type="submit" onclick="myFunction()" name="submit" value="update">


        </form>
        
 

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>