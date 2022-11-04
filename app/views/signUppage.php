<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\signUp.control.php';

$html_code = " ";
 
if($_SERVER["REQUEST_METHOD"] == "POST" ){


    if(!SignUp_control::signUp()){
 
        $html_code .=  "  <div class='loginValid' > ";
        $html_code .=  "        <h1> Deze informatie is al gebruikt!  </h1> ";  
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
    <title>Sign up | Meesterproef</title>
</head>
<body>

    <header class="header">
        <?php include 'pageParts/header.php'; ?>
    </header>



    <article class="article">

        
        <?=  $html_code ?>
        
        <form class="signUpBox" method="POST" action="signUppage.php">
            <input class="SignUpInputText" type="text" name="username" placeholder="Username" required>
            <input class="SignUpInputText" type="text" name="password" placeholder="Password" required>
            <input class="SignUpInputText" type="text" name="email" placeholder="email" required>
            <input class="signUpButton" type="submit" name="submit" value="signUp">
        </form>

    </article>

    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>