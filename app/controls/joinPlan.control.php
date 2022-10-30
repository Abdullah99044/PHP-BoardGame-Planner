<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\joinPlan.model.php';



class JoinPlan_control {


    

    public static function joinPlan($plan_id  , $game_name){


        if(isset($plan_id , $game_name)){

            $max_players =  JoinPlan_model::maxPlayer($game_name);
            $planer_id   =  App::select_plan_user_id($plan_id);
            $user_id     =  App::select_user_id();

            if($planer_id !=  $user_id){

                $is_full = JoinPlan_model::join_bolean($plan_id ,$max_players);

                if($is_full == "not full"){

                    $is_player_in_the_game = JoinPlan_model::check_player_in_game($plan_id);

                    if(  $is_player_in_the_game  == false ){

                        $html = " "; 
                        $html .= " <form action='' method='POST'> ";
                        $html .= " <input  onclick='myFunction()' type='submit' value='Add yourself' name='add_player' > ";
                        $html .= " </form> ";

                        return  $html ;
                    }

                }else{
                    return " its full";
                }

            }

        }else{

            return "Something wrong";

        }
    }
    


    public static function add_player($plan_id){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset($plan_id)){ 
                
                $insert_the_player = JoinPlan_model::joinPlayer($plan_id);
                return  $insert_the_player;

            }else{

                return "Something wrong";

            }
        }
    }


     

    public static function quit_joined_games(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset($_POST['plan_id'])){

                $plan_ID = $_POST['plan_id'];
                return JoinPlan_model::quit_joined_games($plan_ID);

            }       
        }
    }
}

 



 














?>