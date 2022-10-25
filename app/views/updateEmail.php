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


        <form class="updateEmailBox" method="POST" action="">

           
            <input class="updateEmailTextInput" type="text" name="email" placeholder="Write your curnet email" required>
            <label><br></label>

         
            <input class="updateEmailTextInput" type="text" name="newEmail" placeholder="Write your new email" required>
            <input class="updateEmailButton" type="submit" onclick="myFunction()" name="submit" value="update">


        </form>
        
 

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>