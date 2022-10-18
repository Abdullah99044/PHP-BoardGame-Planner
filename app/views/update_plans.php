
 <?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_delete_plans.control.php';


App::check_login();
 
$id = $_GET['id'];

$id = App::mysql_escape($id);


PlansControl::insert("update");


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


    <form method="POST" action="update_plans.php">

        <?php if(isset( $_SESSION["user_name"])){


               
              
        

             
            echo UpdateDelete::update($id);

                
                
                
                
            }else{
                echo '<h1> login pls!  </h1>';
            }
                
        
        
            
            ?>
                
              

            </form>
        
        
       
           <?php

            

            ?>
       
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>