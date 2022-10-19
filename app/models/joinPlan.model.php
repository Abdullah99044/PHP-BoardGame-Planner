<?php


require  'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\plans.model.php';



class JoinPlan_model {


    public static function maxPlayer($game_name){

        $mysqli   =   App::dataBase();

        $query    =   $mysqli->prepare("SELECT *  FROM games WHERE name= ? ");
        App::prepare_method(1 , $query , "s" , $game_name  ,  "" , "" );
        $result   =   $query->get_result();


        $row           =    $result->fetch_assoc();
        $max_players   =    $row['max_players'];


        $query->close();
        $mysqli->close();

        return $max_players;
    }



    
    
    public static function check_player_in_game($plan_id ){

        $username =   $_SESSION["user_name"];
        $mysqli   =   App::dataBase();
 
        $query    =   $mysqli->prepare("SELECT  COUNT(*)  FROM players WHERE name= ?  AND plan_id= ? ") ;
        App::prepare_method(2 ,  $query , "si" , "$username" , "$plan_id" , "" );

 
        $result   =   $query->get_result();
        $row      =   $result->fetch_assoc();
         
      
        $count    =   $row["COUNT(*)"];


        $query->close();
        $mysqli->close();


        if($count > 0){

            return true;

        }else{

            return false;
        }




    }




 
    public static function join_bolean($plan_id , $max_players ){

        if($max_players  == App::read_how_many_players_in_plan($plan_id)){
            return "full";
        }else{
            return "not full";
        }
         

    }



    

    public static function joinPlayer($plan_id){


        $username   =  $_SESSION["user_name"];
        $mysql      =  App::dataBase();
  
       
        $query      =  $mysql->prepare("INSERT INTO players(name , plan_id)  Values( ? ,? )");
        App::prepare_method(2 , $query , "si" ,  $username , $plan_id ,  "");


        $query->close();
        $mysql->close();


        return "goed";

    }





    public static function quit_joined_games($plan_id){

        $userName = $_SESSION['user_name'];

        $mysql = App::dataBase();
        $query = $mysql->prepare("DELETE FROM players WHERE  plan_id= ?  AND name= ? ");

        $result = App::prepare_method(2 , $query , "is" , $plan_id , $userName , "");

        if($result){

            $query->close();
             
            $mysql->close();
            

            return header('Location: /../../meesterproef/app/views/feedback_page.php?type=delete');


        }else{

            return  die('Query faild!' . mysqli_error(App::dataBase()) );
        }
    }

}

















?>