
 <?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\planning.php';

$read_details = new Plans();

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
         
        <?php   $read_details->read_games_details();        ?>

        </div>

        <div>

        <?php $read_details->read_game_plan(); ?>

        
        </div>
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>