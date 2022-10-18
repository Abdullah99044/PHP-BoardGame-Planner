
 <?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\gameDetails.control.php';


$id = $_GET['id'];
$id = App::mysql_escape($id);

$game = $_GET['game']; 
$game = mysqli_real_escape_string(App::dataBase() ,   $game);  

 
echo JoinPlan_control::add_player($id);
 
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
         
        <?php   echo   GameDetails_Control::get_gamesDetails($game) ;  ?>

        </div>

        <div>

        <?php 
        
        if(!empty( $_SESSION["user_name"]) && $_SESSION["login"] != true){

            echo GameDetails_Control::getPlan($id); 

            echo JoinPlan_control::joinPlan($id  , $game);
        }
        ?>

        
        </div>
    </article>

    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>