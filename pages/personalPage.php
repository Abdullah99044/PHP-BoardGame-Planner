<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\update_delete_plans.class.php';

 
$app = new App();  
$plans_view = new PlansView();
$delete = new Update_delelte();


$name =    $_SESSION["user_name"];

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

    <?php require 'pageParts/header.php'; ?>

    </header>

    <article>
        
    <?php  


    if(isset( $_SESSION["user_name"])){

        ?>
        <div>


            <h1>Welcome  <?php  echo $name;
            
            
            
            
            ?></h1>

            <p>This page will let you edit delete and make your planning!</p>

        </div>

        <div>

            <form action="update_user_info_page.php" method="POST">

                <input type="submit" name="submit" value="Updat your password">
                <input type='hidden' name='Type' value='password'>

            </form>

            <form action="update_user_info_page.php" method="POST">

                <input type="submit" name="submit" value="Updat your email">
                <input type='hidden' name='Type' value='email'>

            </form>

            <form action="/../../meesterproef/pages/reservePage.php" method="POST">

                <input type='hidden' name='type' value='reserve'>
                

                <input type="submit" name="submit" value="Reserveren">

            </form>
            
            <form action="" method="POST">

                <input type='hidden' name='logout' value='true'>
                
                <input onclick="myFunction()" type="submit" name="submit" value="Log out">

            </form>

            <?php  

            if(isset( $_POST['id'])){

                $id =  $_POST['id'];
                $delete->delete($id);
            
            }else{
            
                $id  = " ";
            
            }


            if(isset( $_POST['logout'])){

                $logout =  $_POST['logout'];
                $app->logout($logout);
            
            }else{
            
                $logout  = " ";
            
            }


            

            $list = $plans_view->readplans("personal" , "admin");

            foreach($list as $value){

                echo $value;
            }
            
            
            ?>

        </div>

        <?php }else{

            echo '<h1> login pls!  </h1>';
        }

        ?>
        
    </article>

    <footer>
        <?php 

        require 'pageParts/footer.php';
        
        ?>
    </footer>

    
    
</body>
</html>