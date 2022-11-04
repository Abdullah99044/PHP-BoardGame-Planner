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
                <h1 class="personalPageHeaderH1" >Welkom  <?php  echo $name; ?></h1>

                <p class="personalPageHeaderP">U kunt in dit pagina plannen maken en bijwerken</p>
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

             
            
            $list = PlansControl::readplans("personal" , "admin");

                if($list != "No plans yet" ){

                    foreach($list as $value){
                    
                    ?>

                    <div class="plansBox"> 

                        <?php echo $value; ?>

                    </div>

                    <?php
                     
                    }

                }else{

                    ?>

                    <div class="geenPlanBox">


                        <?=$list; ?>


                    </div>
                    

                    <?php
                    
                }
            
            ?>


             

        </div>
        
    </article>




    <footer>

        <?php require 'pageParts/footer.php'; ?>
        
    </footer>

    
    
</body>
</html>