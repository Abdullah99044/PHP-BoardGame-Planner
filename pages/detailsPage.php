
 <?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\displayDetails.class.php';

$read_details = new Details();
$id = $_GET['id'];
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
         
        <?php   echo $read_details->read_games_details();        ?>

        </div>

        <div>

        <?php echo $read_details->read_game__plan($id); ?>

        
        </div>
    </article>

    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>