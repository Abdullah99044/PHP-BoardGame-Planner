
 <?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\update_delete_plans.php';

$update_delete = new Update_delelte();
$plans = new Plans();

$id =  $_GET['id']; 
echo  $id  . " = id " . "<br>";

$plans->insert("update");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<script>
    function myFunction() {
      let result = confirm("Bennt U zeker?");

        if (result == false) {
            event.preventDefault();
        }
    }
</script>

     
</head>
<body>

    <header class="header">

    <?php include 'pageParts/header.php'; ?>

    </header>

    <article>


    <form method="POST" action="update_plans.php">

        <?php if(isset( $_SESSION["user_name"])){


               
              
        

             
            $update_delete->update($id);

                
                
                
                
            }else{
                echo '<h1> login pls!  </h1>';
            }
                
        
        
            
            ?>
                
                <input   onclick="myFunction()"  type='submit' name='submit' value='update'> 

            </form>
        
        
       
           <?php

            

            ?>
       
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>