<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_userInfo.control.php';


App::check_login();

$html_code = " ";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    

    $update_email =  UpdateInfo::emailUpdate();


    if(!$update_email){

        $html_code .=  "  <div class='loginValid' > ";
        $html_code .=  "        <h1> Ongildige email  </h1> ";  
        $html_code .=  "  </div> ";

    }
}

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

        <?=$html_code; ?>

        <form class="updateEmailBox" method="POST" action="">

           
            <input class="updateEmailTextInput" type="text" name="email" placeholder="Schrijf uw email" required>
            <label><br></label>

         
            <input class="updateEmailTextInput" type="text" name="newEmail" placeholder="Schrijf uw nieuwe email" required>
            <input class="updateEmailButton" type="submit" onclick="myFunction()" name="submit" value="Updaten">


        </form>
        
 

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>