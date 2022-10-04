<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\update_user_info.class.php';
 

$updatePassword = new updateData();
$updatePassword->passwordUpdate();


$updateEmail = new updateData();
$updateEmail->emailUpdate();

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
        
        $type = $_POST['Type'];

        if($type == "password"){
        
        ?>

            <form method="POST" action="">
                <label for="username">Write your curnet password <br></label>
                <input type="text" name="password" placeholder="Password" required>
                <label ><br></label>
    
            

                <label for="password">Write your new password <br></label>
                <input type="text" name="newPassword" placeholder="newPassword" required>
                <input type="submit" name="submit" value="update">


            </form>



    <?php 
    
        }else{

        ?>

            <form method="POST" action="">

            <label for="password">Write your curnet email <br> </label>
            <input type="text" name="email" placeholder="email" required>
            <label><br></label>




            <label for="newEmail">Write your new email <br></label>
            <input type="text" name="newEmail" placeholder="New email" required>
            <input type="submit" name="submit" value="update">


            </form>

        <?php }

    }else{
        
        echo '<h1> login pls!  </h1>';

    }
     ?>

        

    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>