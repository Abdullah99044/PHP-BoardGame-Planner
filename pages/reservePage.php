
 <?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansControl.class.php';

$plans_insert = new PlansInsert();
$plans_control = new PlansControl();


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

  

                   $row = $plans_control->select_game();

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
        
         
             
            echo $plans_control->reserveren();
            
            echo $plans_insert->insert("reserve");

          
            
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