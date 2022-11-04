<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_userInfo.control.php';


App::check_login();


$html_code = " ";

if($_SERVER["REQUEST_METHOD"] == "POST"){


    $update_password = UpdateInfo::passwordUpdate();

    if(!$update_password){

        $html_code .=  "  <div class='loginValid' > ";
        $html_code .=  "        <h1> Ongildige wachtwoord!   </h1> ";  
        $html_code .=  "  </div> ";
    }

}
 

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


        <?=$html_code; ?>


        <form class="updatePassBox" method="POST" action="">

          
            <input class="updatePassTextInput" type="text" name="password" placeholder="Schrijf uw wachtwoord" required>
            <label ><br></label>
            
            <input class="updatePassTextInput" type="text" name="newPassword" placeholder="Schrijf uw nieuwe wachtwoord " required>
            <input class="updatePassButton" type="submit" name="submit"  onclick="myFunction()" value="Updaten">

        </form>

    
    </article>



<footer>
    <?php include 'pageParts/footer.php'; ?>
</footer>


</body>
</html>




 

