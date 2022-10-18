<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\joinPlan.model.php';



class JoinPlan_control {


    

    public static function joinPlan($plan_id  , $name){


        if(isset($plan_id , $name)){


            $maxPlayers = JoinPlan_model::maxPlayer($name);


            $planer_id = App::select_plan_user_id($plan_id);
            $user_id = App::select_user_id();

            if($planer_id !=  $user_id){


                $result = JoinPlan_model::join_bolean($plan_id ,$maxPlayers);

                if($result == "not full"){

                    $bolean = JoinPlan_model::check_player_in_game($plan_id);

                    if(  $bolean  == true ){

                        $html = " "; 

                        $html .= " <form action='' method='POST'> ";
                        $html .= " <input  onclick='myFunction()' type='submit' value='Add yourself' name='add_player' > ";
                        $html .= " </form> ";

                        return  $html ;
                    }else{
                        return "You are Already in";
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


            if(isset($plan_id  )){ 
                
                $result = JoinPlan_model::joinPlayer($plan_id);
                return $result;

            }else{
                return "Something wrong";
            }

        }
    }


     

    public static function quit_joined_games(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            if(isset($_POST['plan_ID'])){


                $plan_ID = $_POST['plan_ID'];
                return JoinPlan_model::quit_joined_games($plan_ID);


            }

          
        }


    }




}

 



 














?>