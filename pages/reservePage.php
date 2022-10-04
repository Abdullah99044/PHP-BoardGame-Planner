
 <?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\update_delete_plans.php';

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

                   $select = new select();

                   

                   $row = $select->select();

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
        
         
             
            echo $plans->reserve();
            
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