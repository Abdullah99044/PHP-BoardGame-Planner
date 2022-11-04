<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\gameDetails.control.php';


$id = $_GET['id'];
$id = App::mysql_escape($id);

$game = $_GET['game']; 
$game = mysqli_real_escape_string(App::dataBase() ,   $game);  

JoinPlan_control::add_player($id);  
 
?> 

<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include 'pageParts/head.php'; ?>
    <title>Details pagina| Meesterproef </title>
</head>
<body>

    <header class="header">

    <?php require 'pageParts/header.php'; ?>

    </header>



    <article class="article">

         

        <div>
         
        <?php   echo   GameDetails_Control::get_gamesDetails($game) ;  ?>

        </div>



        <div class="planInfoBox">

            <h1>Plan details</h1>

            <?php 

            
            ?>

            <div class="planInfo">

                <?php echo GameDetails_Control::getPlan($id);    

          

            

                if(!empty( $_SESSION["user_name"]) && $_SESSION["isLogged"] == true){

                    ?>


                    <div class="zelfToevogenButton">

                    <?php   echo JoinPlan_control::joinPlan($id  , $game);
                }


                ?>

                    </div>
            
            </div>

        
        </div>



    </article>



    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>