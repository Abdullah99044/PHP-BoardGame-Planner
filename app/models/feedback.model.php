<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';


class Feedback_model{

    public static function feeddback($user_id , $feedBack , $feedback_type ){

        $mysqli     =    App::dataBase();
        $query      =    $mysqli->prepare("INSERT INTO feedback( userId , feedback , type ) VALUES( ? , ? , ? )");
        $result     =    App::prepare_method(3 , $query , "iss" , $user_id  , $feedBack , $feedback_type );
        
        $query->close();
        $mysqli->close();

        if($result){
            return header('Location: /../../meesterproef/app/views/personalPage.php');

        }else{
   
            return  die("Query failed! " . mysqli_error(App::dataBase()));
        }
    }
}














?>