<?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\app.php';

$signUp= new App();

$signUp->signUp();

 
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
        <form method="POST" action="signUppage.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="password" placeholder="Password" required>
            <input type="text" name="email" placeholder="email" required>
            <input type="submit" name="submit" value="signUp">
        </form>
    </article>

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>