

<?php 

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/../../meesterproef/style.css">
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

     

    <h1 class="title" >Game website</h1>

    <?php

        $app = new App();
        echo $app->personal_nav()  .   "<br>"    ;


    ?>

   <a  href='/../../meesterproef/index.php'>index </a> 

   
    
    
 
    
</body>
</html>