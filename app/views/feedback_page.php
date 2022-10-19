<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\feedback.control.php';

App::check_login();

$type_of_feedback = $_GET['type'];
$type_of_feedback = App::mysql_escape($type_of_feedback);

$feedback = new Feedback($type_of_feedback);
echo Feedback::feedback();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'pageParts/head.php'; ?>
    <title>Feedback | Meesterproef </title>
</head>
<body>


    <header class="header">

    <?php require 'pageParts/header.php'; ?>

    </header>



    <article>


        <div>

         <form  method="POST" action="" >
    
            <textarea  name="feedback" rows="10" cols="50" required> </textarea>
            <input type="submit" value="submit" name="submit">

         </form>
        
        </div>



    </article>


    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>