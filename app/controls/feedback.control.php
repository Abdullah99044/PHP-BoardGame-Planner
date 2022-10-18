<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\feedback.model.php';



class Feedback{

    private static $type;

    public function __construct($type)
    {
        return self::$type = $type;
    }

    public static function feedback(){

        if(App::check_connection()){

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $id = App::select_user_id();
                
                $type = self::$type ;
    
                $feedBack = $_POST['feedback'];
    
                $feedBack = App::mysql_escape($feedBack);

                return Feedback_model::feeddback($id ,   $feedBack , $type );
    
            }

        }else{

            return App::check_connection();

        }
        
    }

}












?>