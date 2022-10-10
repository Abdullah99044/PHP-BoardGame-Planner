
<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansControl.class.php';


class Update_delelte extends PlansControl{

    public function update($id){

        $username = $_SESSION["user_name"];
        $user_id = $this->select_user_id();


        $query = "SELECT * FROM planning WHERE id='$id' AND userID='$user_id'";
        $results = mysqli_query($this->dataBase() , $query );

        if($results){

            $game = mysqli_fetch_assoc($results);

            $game_name = $game['Game_ID'];

            return $this->show_insert_boxes($game_name ,  $id  ,  $username ,"update" , $game);    

        }else{

            return  die('Query faild' .  mysqli_error($this->dataBase()));

        }
        
       

    }


    public function delete($id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

             
            $user_id = $this->select_user_id();

 
            $query = "DELETE FROM planning WHERE  id='$id' AND userID='$user_id'";

            $results = mysqli_query($this->dataBase() , $query );

            if($results){

                return header('Location: /../../meesterproef/pages/feedback_page.php?type=delete');

            }else{

                return die('Query faild' .  mysqli_error($this->dataBase()));
            }
        } 
    }

}













?>