<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\filter.control.php';

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Home | Meesterproef </title>
</head>


<body>

    <header class="header">
        <?php include 'app/views/pageParts/header.php'; ?>
    </header>



    <article>
        

        <div>

                
            <form action='app/views/loginPage.php' method='POST'> 

                <input   type='submit' value='login'>

            </form> 


            <form action='/../../meesterproef/app/views/signUppage.php' method='POST'>;

                <input   type='submit' value='signUp'> 
        
            </form> 


        </div>



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