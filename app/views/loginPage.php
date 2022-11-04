<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\login.control.php';

$html_code = "";

if($_SERVER["REQUEST_METHOD"] == "POST" ){
    

    $login = Login_control::login();


    if(!$login){

        $html_code .=  "  <div class='loginValid' > ";
        $html_code .=  "        <h1> Aanmelden mislukt! ongeldige gebruikersnaam of wachtwoord  </h1> ";  
        $html_code .=  "  </div> ";
                
    }else{

        header('Location: /../../meesterproef/app/views/personalPage.php');
        
    }

     
}

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

        <?= $html_code  ?>

        
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