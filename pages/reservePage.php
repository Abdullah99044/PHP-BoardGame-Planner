
 <?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\update_delete_plans.class.php';

$plans = new Plans();
$update_delete = new Update_delelte();
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

    <?php if(isset( $_SESSION["user_name"])){


        ?>
        <form method="POST" action="reservePage.php">

            

            <select name="gameName" >
                
                <?php 

  

                   $row = $plans->select_game();

                   foreach(   $row as $value){
                        echo $value;

                    }
                
               
                
                
                # للتذكير استخدم forLoop لتكرير كودات html
                
                ?>



            </select>

             
            
            
            <input type="submit" name="submit" value="submit">
        </form>

        <form method="POST" action="reservePage.php">

        

        <?php 
        
         
             
            echo $plans->reserveren();
            
            $plans->insert("reserve");

          
            
        }else{
            echo '<h1> login pls!  </h1>';
        }
            
       
        
        
        ?>

       
            <input  onclick="myFunction()"  type='submit' name='submit' value='reserve'> 

        </form>
        
            
       
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>