<?php 

 
require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\filter.control.php';
 
App::check_login();

echo JoinPlan_control::quit_joined_games();
 
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

    <?php


        $list = FilterControl::show_joined_games();
        foreach( $list as $value){

            echo $value;

        }



    ?>


    </article>

    <footer>
        <?php 

        require 'pageParts/footer.php';
        
        ?>
    </footer>

    
    
</body>
</html>