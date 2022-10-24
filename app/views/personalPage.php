<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_delete_plans.control.php';

App::check_login(); 

UpdateDelete::delete(); 

$name =    $_SESSION["user_name"];

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php include 'pageParts/head.php'; ?>
    <title>Persoonlijk pagina | Meesterproef</title>
     
</head>
<body>


    <header   class="header">

    <?php require 'pageParts/header.php'; ?>

    </header>




    <article class="article">

        <div class="personalPageHeader">
          
            <div >
                <h1 class="personalPageHeaderH1" >Welcome  <?php  echo $name; ?></h1>

                <p class="personalPageHeaderP">This page will let you edit delete and make your planning!</p>
            </div>

            <div  >
                <form action="/../../meesterproef/app/views/reservePage.php" method="POST">

                    <input type='hidden' name='type' value='reserve'>
                    <input class="personalPageHeaderButton" type="submit" name="submit" value="Maak een plan">

                </form>
            </div>

          
            
        </div>
        <div>




            <?php  

            if(isset( $_POST['logout'])){

                $logout =  $_POST['logout'];
                App::logout($logout);
            
            }else{
            
                $logout  = " ";
            
            }
            
            $list = PlansControl::readplans("personal" , "admin");

                if($list != "No plans yet" ){

                    foreach($list as $value){

                        echo $value;
                    }

                }else{

                    echo $list;
                }
            
            ?>


             

        </div>
        
    </article>




    <footer>
        <?php require 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>