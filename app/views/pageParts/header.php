
 
 

<html> 


<head>

<?php include 'head.php'; ?>

</head>

<body>

  
            
   

      
          
        <a class="headerTitle" href="/../../meesterproef/index.php" >Game planner </a>  

        <nav>
        
           


            <?php


 

            if(isset($_SESSION["isLogged"])){

                if($_SESSION["isLogged"] == true){

            ?> 
    
            <ul class="headerNav">
                <li><a  class="nav" href='/../../meesterproef/app/views/personalPage.php'>Persoonlijk pagina</a></li>
                <li><a  class="nav"  href='/../../meesterproef/app/views/joinedGames.php'>Toegevoegde spellen</a></li>
                <li><a  class="nav" class="drop" href='/../../meesterproef/app/views/updateUserInfo.php'>Update your info</a> </li>

               
                <li class="nav"><a  class="navlinks" href='/../../meesterproef/app/views/logoutPage.php'>Afmelden</a></li>

               
            </ul>


            <?php
                }
            }else{

            ?>


            <ul class="headerNav">

                
                <li><a  href="/../../meesterproef/index.php" > Home </a></li>
                <li><a   href="/../../meesterproef/app/views/loginPage.php" > Login </a></li>
                <li><a  href="/../../meesterproef/app/views/signUppage.php" > Aanmelden </a></li>

            </ul>

                <?php



            }


                ?>
                    
         
           

        </nav>

 
    
    
    


</body>

</html>


   
    
    
  