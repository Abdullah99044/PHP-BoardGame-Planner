<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\gameDetails.model.php';



class GameDetails_Control  extends PlansControl{ 

    public static function get_gamesDetails($game)
    {
 
        return App::gameDetails(GameDetails::set_gameDetails($game));
       
    }


    public static function getPlan($id){

        $game_plan =  GameDetails::set_gamePlan($id) ;

        return self::show_plans($game_plan , "public" , "" , "false");   
  
    }
}




?>