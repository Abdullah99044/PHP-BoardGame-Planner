
 <?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\app.php';

$app = new App();

echo $app->login(); 

 
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
        
        
            <form method="POST" action="loginPage.php">
                <input type="text" name="username" placeholder="Username"  required>
                
              
                <input type="text" name="password" placeholder="Password"  required>
                
                 
                <input type="submit" name="submit" value="login">
            </form>

             

         




            
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>