<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_delete_plans.control.php';

 
  

App::check_login(); 



UpdateDelete::delete( );


$name =    $_SESSION["user_name"];

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


            <h1>Welcome  <?php  echo $name;
            
            
            
            
            ?></h1>

            <p>This page will let you edit delete and make your planning!</p>

        </div>

        <div>

            <form action="updatePassword.php" method="POST">

                <input type="submit" name="submit" value="Updat your password">
                <input type='hidden' name='Type' value='password'>

            </form>

            <form action="update_user_info_page.php" method="POST">

                <input type="submit" name="submit" value="Updat your email">
                <input type='hidden' name='Type' value='email'>

            </form>

            <form action="/../../meesterproef/app/views/reservePage.php" method="POST">

                <input type='hidden' name='type' value='reserve'>
                

                <input type="submit" name="submit" value="Reserveren">

            </form>
            
            <form action="" method="POST">

                <input type='hidden' name='logout' value='true'>
                
                <input onclick="myFunction()" type="submit" name="submit" value="Log out">

            </form>

            <form action="/../../meesterproef/app/views/joinedGames.php" method="POST">

                

                <input type="submit" name="submit" value="The games I joined">

            </form>

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
        <?php 

        require 'pageParts/footer.php';
        
        ?>
    </footer>

    
    
</body>
</html>