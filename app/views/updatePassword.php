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

        <form class="updatePassBox" method="POST" action="">

          
            <input class="updatePassTextInput" type="text" name="password" placeholder="Write your curnet password" required>
            <label ><br></label>
            
            <input class="updatePassTextInput" type="text" name="newPassword" placeholder="Write your new password " required>
            <input class="updatePassButton" type="submit" name="submit"  onclick="myFunction()" value="update">

        </form>

    
    </article>



<footer>
    <?php include 'pageParts/footer.php'; ?>
</footer>


</body>
</html>




 

