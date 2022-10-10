<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\app.class.php';



class Feedback extends App {

    public function feedback_insert($type){

        if($this->check_connection()){

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $id = $this->select_user_id();
                $type = $type ;
    
                $feedBack = $_POST['feedback'];
    
                $feedBack = mysqli_real_escape_string($this->dataBase() ,   $feedBack  );
    
    
                $query =  "INSERT INTO feedback( userId , feedback , type ) VALUES( $id , '$feedBack' , '$type')";
                
                $result = mysqli_query($this->dataBase() , $query);
    
                if($result){


    
                    return header('Location: /../../game_alpha/pages/personalPage.php');
                }else{
                    
                       
                    return $result . die("Query failed! " . mysqli_error($this->dataBase()));
                }
    
            }

        }else{

            return $this->check_connection();

        }
        
    }


}














?>