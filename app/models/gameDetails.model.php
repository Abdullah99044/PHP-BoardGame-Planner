<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\plans.control.php';


class GameDetails {

    public static function set_gameDetails($game)
    {
        $mysqli        =   App::dataBase();
        $query         =   $mysqli->prepare("SELECT * FROM games WHERE name= ? ");
        App::prepare_method(1 ,$query  , "s" , $game , "" , "" );
        $result        =   $query->get_result();

        if($result){

            $query ->close();
            $mysqli->close();

            return $result->fetch_assoc();

        }else{

            return die("Query faield!" . mysqli_error(App::dataBase()));
        }
      
    }






    public static function set_gamePlan($plan_id){

        if(App::check_connection()){
            

            $mysqli         =     App::dataBase();
            $query          =     $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
            App::prepare_method(1 , $query , "i" , $plan_id , "" , "" );
            $result         =     $query->get_result();

            if($result){

                $query->close();
                $mysqli->close();
               
                return   $result->fetch_assoc() ;

            }else{

                return die("Query faield!!!!" . mysqli_error(App::dataBase()));
            }


        }else{

           return App::check_connection();
           
        }

    }
}












?>