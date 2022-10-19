<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\filter.control.php';

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'app/views/pageParts/head.php'; ?>
    <title> Home | Meesterproef </title>
</head>


<body>

    <header class="header">
        <?php include 'app/views/pageParts/header.php'; ?>
    </header>



    <article class="article">


    <?php  

        ####################################### filter ########################################

        echo FilterControl::select_filter(); # Kies een welke  spelen tijd wil je.

        $list_filter = FilterControl::filter(); # Functie filter_control heeft twee uitkomst "false" of een lijst

        #######################################################################################


        $list = PlansControl::readplans("everyone" , "public");
 
        if(FilterControl::filter() == false){

            foreach( $list as $value){

                echo $value;

            }

        }else{

            
           if($list_filter  == "No plans"){

            echo "No plans";
             
            }else{

                foreach(  $list_filter as $value){

                    echo  $value;

                }

            }

        }
  
    ?>

    </article>



   
    <footer>
        <?php include 'app/views/pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>