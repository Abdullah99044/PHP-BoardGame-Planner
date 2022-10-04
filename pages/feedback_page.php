<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\feedback.class.php';

$feedBack = new Feedback();

$type_of_feedback = $_GET['type'];
 
$feedBack->feedback_insert($type_of_feedback);

?>

<!DOCTYPE html>
<html lang="en">
<head>
     
</head>
<body>

    <header class="header">

    <?php require 'pageParts/header.php'; ?>

    </header>

    <article>
        <div>
         
         <form  method="POST" action="" >
    
            <textarea  name="feedback" rows="10" cols="50" required>

            </textarea>
            <input type="submit" value="submit" name="submit">

         </form>
        
        </div>
    </article>

    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>