<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\feedback.model.php';



class Feedback{

    private static $feedback_type;

    public function __construct($feedback_type)
    {
        return self::$feedback_type = $feedback_type;
    }

    public static function feedback(){

        if(App::check_connection()){

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $user_id = App::select_user_id();
                
                $feedback_type  = self::$feedback_type ;
    
                $feedBack = $_POST['feedback'];
    
                $feedBack = App::mysql_escape($feedBack);

                return Feedback_model::feeddback($user_id ,   $feedBack , $feedback_type );
    
            }

        }else{

            return App::check_connection();

        }
        
    }

}












?>