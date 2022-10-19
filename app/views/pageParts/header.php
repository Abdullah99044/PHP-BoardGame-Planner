
 
 

<html> 


<head>

<?php include 'head.php'; ?>

</head>

<body>

  
            
    <div  class="header">

        <div class="title">
            <p><a  class="navlinls" href="/../../meesterproef/index.php" > Games planner</a></p>  
        </div>


        <div class="nav">
        
          


            <?php




            if(isset($_SESSION["isLogged"])){

                if($_SESSION["isLogged"] == true){

            ?> 
    
            <ul>
                <li></li>
                <li><a  class="navlinls" href="/../../meesterproef/index.php" >Home</a></li>
                <li><a  class="navlinls" href='/../../meesterproef/app/views/personalPage.php'>Persoonlijk pagina</a></li>
                <li><a  class="navlinls" href=''>Toegevoegde spellen</a></li>
                <li><a  class="navlinls" href=''>settings</a></li>
                <li><a  class="navlinls" href='/../../meesterproef/app/views/logoutPage.php'>Afmelden</a></li>

               
            </ul>


            <?php
                }
            }else{

            ?>


            <ul>

                <li></li>
                <li><a class="navlinls" href="/../../meesterproef/index.php" > Home </a></li>
                <li><a class="navlinls" href="/../../meesterproef/app/views/loginPage.php" > Login </a></li>
                <li><a class="navlinls" href="/../../meesterproef/app/views/signUppage.php" > Aanmelden </a></li>

            </ul>

                <?php



            }


                ?>
                    
        
           

        </div>


    </div>

    
    
    


</body>

</html>


   
    
    
  