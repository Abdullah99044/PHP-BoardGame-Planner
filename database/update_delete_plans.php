
<?php


include 'C:\Program Files\ammps2\Ampps\www\game_alpha\database\planning.php';


class Update_delelte extends Plans{

    public function update($id){

     

         
        $username = $_SESSION["user_name"];


        $query = "SELECT * FROM planning WHERE id='$id' AND userName='$username'";
        $results = mysqli_query($this->dataBase() , $query );

        $game = mysqli_fetch_assoc($results);

        $game_name = $game['name'];

        $this->show_insert_boxes($game_name ,  $id ,  $username , "update" , $game);    
       

    }


    public function delete($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $id = $id;
            $username = $_SESSION["user_name"];

 
            $query = "DELETE FROM planning WHERE  id='$id' AND userName='$username'";
            $results = mysqli_query($this->dataBase() , $query );

            if(!$results){
                echo die('Query faild' .  mysqli_error($this->dataBase()));

            }

        }

    
    }

}













?>