<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\update_delete_plans.control.php';
 
App::check_login();
 
if(!isset($_GET['id'], $_GET['name'] , $_GET['type'])){

    echo "Something Wrong";

}else{
      
    $id   = $_GET['id'];
    $name = $_GET['name'];
    $type = $_GET['type'];

     
    $id   = App::mysql_escape($id);
    $name = App::mysql_escape($name);
    $type = App::mysql_escape($type );
     
    
    echo UpdateDelete::add_update_Player($type);
}
 
?>




<!DOCTYPE html>
<html lang="en">
<head>     
    <?php include 'pageParts/head.php'; ?>
    <title> Speler toevoegen of updaten | Meesterproef </title>
</head>
<body>

    <header class="header">

    <?php include 'pageParts/header.php'; ?>

    </header>




    <article class="article">


        <div class="spelerToevoegenBox" >

            <form class="spelerToevoegen" method="POST" action=" ">

                <input class="spelerToevoegenInputText" type="text" name="player" placeholder="Speler naam">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="name" value="<?=$name?>">
            
                <input class="spelerToevoegenInputBox"  onclick="myFunction()"  type='submit' name='submit' value="Toevoegen"  > 

            </form>

        </div>
            
       
    </article>


    

    <footer>
        <?php include 'pageParts/footer.php'; ?>
    </footer>

    
    
</body>
</html>