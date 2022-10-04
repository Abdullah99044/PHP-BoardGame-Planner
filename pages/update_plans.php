
 <?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\update_delete_plans.class.php';

$update_delete = new Update_delelte();
$plans_insert = new PlansInsert();

$id = $_GET['id'];
$plans_insert->insert("update");

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


               
              
        

             
            echo $update_delete->update($id);

                
                
                
                
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