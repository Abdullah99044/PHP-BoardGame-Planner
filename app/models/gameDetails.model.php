<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\plans.control.php';


class GameDetails {

    public static function set_gameDetails($game)
    {
        $mysqli = App::dataBase();
        $query_game_details = $mysqli->prepare("SELECT * FROM games WHERE name= ? ");
        App::prepare_method(1 , $query_game_details , "s" , $game , "" , "" );
        $result_game_details = $query_game_details->get_result();

        if($result_game_details){

            $query_game_details->close();
            $mysqli->close();

            return $result_game_details->fetch_assoc();

        }else{

            return die("Query faield!" . mysqli_error(App::dataBase()));
        }
      
    }


    public static function set_gamePlan($id){

        if(App::check_connection()){
            

            $mysqli = App::dataBase();
            $query_planning_details =  $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
            App::prepare_method(1 , $query_planning_details , "i" , $id , "" , "" );
            $result_planning_details =   $query_planning_details->get_result();

            if($result_planning_details){


                $query_planning_details->close();
                $mysqli->close();
               
                return  $result_planning_details->fetch_assoc() ;

            }else{

                return die("Query faield!!!!" . mysqli_error(App::dataBase()));
            }

        }else{

           return App::check_connection();
        }

    }
}












?>