<?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\planning.php';

$feedBack = new Plans();

$type_of_feedback = $_GET['type'];
 
$feedBack->feedback_insert($type_of_feedback);

?>

<!DOCTYPE html>
<html lang="en">
<head>
     
</head>
<body>

    <header class="header">

    <?php include 'pageParts/header.php'; ?>

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
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>