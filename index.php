 


 <?php


include 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansControl.class.php';

$app = new App();

$plans_view = new PlansView();

$plans_cintrol = new PlansControl();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Game website</title>
</head>
<body>

    <header class="header">

        <?php include 'pages/pageParts/header.php'; ?>

    </header>

    <article>
        <?php
        ##<img src="/../../game/afbeeldingen/counterfeiters.jpg" alt="Italian Trulli"> ?>
        
        <div>
            
        <form action='pages/loginPage.php' method='POST'> 

                
            <input   type='submit' value='login'>
        </form> 

        <form action='pages/signUppage.php' method='POST'>;

            <input   type='submit' value='signUp'> 
    
        </form> 


        </div>

        <?php  

        echo $plans_view->select_type_of_games();

        print_r($plans_cintrol->filter()) ;

        $list = $plans_view->readplans("everyone" , "public");

        foreach( $list as $value){

            echo $value;

        }

       
        
        ?>



    </article>

   
    <footer>
        <?php include 'pages/pageParts/footer.php'; ?>
    </footer>
    
</body>
</html>