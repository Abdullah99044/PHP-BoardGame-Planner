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



    <div class="filter">

     
        <div class="filterform">

            <div class="filterContent">

                <form  method='POST' action='' >  
                
                
                    <select class='filterSelect' name='games_type' >  
            
                <?php  
    
                
                    ####################################### filter ########################################

                    echo FilterControl::select_filter(); # Kies een welke  spelen tijd wil je.

                    # Functie filter_control heeft twee uitkomst "false" of een lijst

                    #######################################################################################

                ?>

                        
                    </select> 

                

                    <input  class="filterButtons" class="filtersss" class="filteSelectButton"   type='submit' value='select' name'submit' >  

                </form> 


                <form    method='POST' action='' >  

                    <input type='hidden' name='filter_off' value='false' >  

                    <input class="filterButtons" class="filteResetButton"   type='submit' value='resest' name'submit' >  

                </form> 

            </div>
        </div>

    </div>

    
        
        <?php

            $list_filter = FilterControl::filter();
            $list = PlansControl::readplans("everyone" , "public");
    
            if(FilterControl::filter() == false){

                foreach( $list as $value){
                
                ?>

                <div class="plansBox"> 
                 
                    <?php echo $value; ?>

                </div>

                <?php

                }

            }else{

                
            if($list_filter  == "No plans"){

                echo "No plans";
                
                }else{

                    foreach(  $list_filter as $value){
                    
                    ?>

                    <div class="plansBox"> 

                       <?php echo  $value; ?>

                    </div>

                    <?php

                    }

                }

            }
    
        ?>

    </div>

    </article>



   
    <footer>
        <?php include 'app/views/pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>