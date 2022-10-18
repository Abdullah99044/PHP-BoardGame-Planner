<?php

 
require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\plans.control.php';



class FilterModel {

    public static function filter($time){
            
        $plans = [];    

        $mysqli = App::dataBase();

        if($time == 30){

             
            $query  = $mysqli->prepare("SELECT  GROUP_CONCAT(id) FROM planning WHERE play_time < ? ");
            App::prepare_method(1 , $query , "i" , 40 , "" , "" );
            $result =  $query->get_result();
            


        }elseif($time == 65){

            
            $query  = $mysqli->prepare("SELECT  GROUP_CONCAT(id) FROM planning WHERE play_time > ? ");
            App::prepare_method(1 , $query , "i" , 60 , "" , "" );
            $result =  $query->get_result();

        }else{

            
            $query  = $mysqli->prepare("SELECT  GROUP_CONCAT(id) FROM planning WHERE play_time= ? ");
            App::prepare_method(1 , $query , "i" ,$time , "" , "" );
            $result =  $query->get_result();


        }
        


        if($result){

            $rowTime = $result->fetch_assoc();       

            $row  = $rowTime['GROUP_CONCAT(id)'];


            if(!empty($row)){ 
                $query->close();
                $result->close();

                $id = explode(",",$row ) ;
                
            
                foreach($id as $value){

                    $query_1  = $mysqli->prepare("SELECT  * FROM planning WHERE id= ? ");
                    App::prepare_method(1 , $query_1 , "i" , $value , "" , "" );
                    $result_1 =  $query_1->get_result();
                    


                    array_push($plans , PlansControl::show_plans( $result_1->fetch_assoc() , "not admin"  , "read_plans" , false ));

                }


                $query_1->close();
                $result_1->close();

                $mysqli->close();

                return  $plans;

            }else{
                return "No plans";
            }

        }else{

            return "false";
        }

    }

     

    public static function show_joined_games(){

        $username = $_SESSION["user_name"];

        $games = [];

        $mysqli = App::dataBase();


        $query = $mysqli->prepare("SELECT * FROM players WHERE name= ? ");
        App::prepare_method(1 , $query  , "s" , $username , "" , "" );
        $result = $query->get_result();
        $query->close();

        if($result){

            while( $row = $result->fetch_assoc()){

                
                $plan_id = $row["plan_id"];
                

                $query_1 = $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
                App::prepare_method(1 , $query_1  , "i" , $plan_id , "" , "" );
                $result_1 = $query_1->get_result();
        

                array_push($games , PlansControl::show_plans($result_1->fetch_assoc()  , "joinedGames"  , "read_plans"  , false));

            }   

            $result->close();

            $query_1->close();
            $result_1 ->close();

            $mysqli->close();

            return $games;

        }else{

            return  die('d' .  mysqli_error(App::dataBase()));
        }

    }

}
















?>