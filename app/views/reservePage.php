
<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\plans.control.php';


App::check_login();

echo PlansControl::insert("reserve");
?>

<!DOCTYPE html>
<html lang="en">
<head>

 

     
</head>
<body>

    <header class="header">

    <?php include 'pageParts/header.php'; ?>

    </header>

    <article>

    <?php if(isset( $_SESSION["user_name"])){


        ?>
        <form method="POST" action="reservePage.php">

            

            <select name="game_name" >
                
                <?php 

  

                   
                    $select = new PlansControl();

                    $list = $select->select_game();
                     
                    foreach ( $list as $value){
                        echo $value;
                         
                    }

                    
                
               
                
                
              
                
                ?>



            </select>

             
            
            
            <input type="submit" name="submit" value="submit">
        </form>

        <form method="POST" action="reservePage.php">

        

        <?php 
        
         

            echo PlansControl::reserveren();
          
                
          
            
        }else{
            echo '<h1> login pls!  </h1>';
        }
            
       
        
        
        ?>

       

        </form>
        
            
       
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>