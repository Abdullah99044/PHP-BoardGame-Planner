<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';


class PlansModel {


    #Deze functies gaan plans data van dataBase halen en dan geeft dit data aan plans.control.php om dit data te tonen


    public static function gameData($gameName){

        $mysqli = App::dataBase();
        $query_image_time = $mysqli->prepare("SELECT *  FROM games WHERE name= ? ");
        App::prepare_method(1 , $query_image_time , "s" ,$gameName , "" , "" );
        $result_image_time = $query_image_time->get_result();

        $query_image_time->close();
        $mysqli->close();

        return $result_image_time->fetch_assoc();;

    }


    public static function players($planID){

        $id = [];

        $mysqli = App::dataBase();
        

        $query = $mysqli->prepare("SELECT  GROUP_CONCAT(id) FROM players WHERE plan_id= ? ");
        App::prepare_method(1 , $query , "i" , $planID , "" , "");
        $result =  $query->get_result();

        $row_id  = $result->fetch_assoc();       

        $row  =  $row_id['GROUP_CONCAT(id)'];

        $query->close();
         

        $id = explode(",", $row ) ;

        return $id;


    }

    public static function read_player_data($id){

        $mysqli = App::dataBase();
        $query  = $mysqli->prepare("SELECT *  FROM players WHERE id= ? ");
        App::prepare_method(1 , $query , "s" ,$id , "" , "" );
        $result  = $query->get_result();

        $query->close();
        $mysqli->close();

        return $result->fetch_assoc();;

    }

    public static function get_personal_plans(){


        $id = [];
        $plans = [];

        $mysqli = App::dataBase();
        $userID = App::select_user_id();

        $query = $mysqli->prepare("SELECT  GROUP_CONCAT(id) FROM planning WHERE userID= ? ");
        App::prepare_method(1 , $query , "i" , $userID , "" , "");
        $result =  $query->get_result();

        $rowTime = $result->fetch_assoc();       

        $row  = $rowTime['GROUP_CONCAT(id)'];

        $query->close();
         

        $id= explode(",",$row ) ;

        if($row != 0){

            foreach($id as $value){

                $query  = $mysqli->prepare("SELECT  * FROM planning WHERE id= ? ");
                App::prepare_method(1 , $query , "i" , $value , "" , "" );
                $result_1 =  $query->get_result();

                array_push($plans , PlansControl::show_plans( $result_1->fetch_assoc() , "admin" , "read_plans" , false ));

            }

            $query->close();
            $mysqli->close();

            return $plans;

        }else{
            return "No plans yet";
        }

        
        
        

    }

    public static function get_all_plans(){
        
        $plans_list = [];

        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT id FROM planning");
        $query->execute();
        $result =  $query->get_result();

        $query->close();

        while($row =  $result->fetch_assoc()){

            $id = $row["id"];
       
            $query = $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
            App::prepare_method(1 , $query , "i" , $id , "" , "");
            $plan =  $query->get_result();

            array_push($plans_list , PlansControl::show_plans( $plan->fetch_assoc()  ,  "not admin" , "read_plans" , false));

        }

       
        $query->close();
        $mysqli->close();

        return  $plans_list; 
        
        
    }

    public static function get_all_planning($id){

        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
        App::prepare_method(1 , $query , "i" , $id , "" , "");
        $result = $query->get_result();

        $query->close();
        $mysqli->close();


        return $result ;

    }

    public static function get_planning_userId($id , $user_id){


        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT * FROM planning WHERE id= ? AND userID= ? ");
        App::prepare_method(2 , $query , "ii" , $id , $user_id , "");

        $result =  $query->get_result();


        $query->close();
        $mysqli->close();
         
        return $result ;
         
    }

    public static function selectGame(){

        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT * FROM games");
        $query->execute();
        $result =  $query->get_result();


        $query->close();
        $mysqli->close();

        
        if( $result){

            return  $result;

        }else{

            return die('Query failed!' . mysqli_error(App::dataBase()));
        }
    }


    #public static function select_Game_data(){



    public static function show_insert_boxes($select , $type){

        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT * FROM games where id= ? ") ;    
        App::prepare_method(1 , $query , "i" , $select ,"" , "");

        $result = $query->get_result();
 
        $query->close();
        $mysqli->close();

        if($type == "details"){

            return $result;

        }else{

            return    $result->fetch_assoc();

        }
         
    }


    #Deze functies gaan Plan Data ann de dataBase toevoegen

 

    public static function  insert($type , $id , $game_Name , $person_who_explains_game ,  $startTime , $play_time , $user_id , $game_id  ){

        if($type == "update"){
            $id = $id;                
 
            $mysqli = App::dataBase();
            $query = $mysqli->prepare("UPDATE planning SET  makerName = ?  WHERE id= ? ");
            $query->bind_param( "si"   , $person_who_explains_game   , $id );
            $query->execute();

            if($query){

                $query->close();

                $query = $mysqli->prepare("UPDATE planning SET  startTime = ?  WHERE id= ? ");
                $query->bind_param( "si"   , $startTime  , $id );
                $query->execute();
                
                if($query){

                    $query->close();
                    $mysqli->close();
        
                
                    return header('Location: /../../meesterproef/app/views/feedback_page.php?type=update');
                    
                }else{

                    return die("Query failed! update plan $id" . mysqli_error(App::dataBase()));

                }

            }else{

                return die("Query failed! update plan $id" . mysqli_error(App::dataBase()));

            }
           
                
        }else{

            $mysqli = App::dataBase();
            $query = $mysqli->prepare("INSERT INTO planning(name , makerName , startTime , play_time , userID , Game_ID ) VALUES( ? ,  ? , ?  , ? , ? , ? )");
            $query->bind_param("ssssii" , $game_Name , $person_who_explains_game , $startTime , $play_time , $user_id , $game_id );
            $query->execute();
              
            if($query){

                $query->close();
                $mysqli->close();


                return header('Location: /../../meesterproef/app/views/feedback_page.php?type=reserveren');

            }else{

                return die("Query failed! update plan insert plan" . mysqli_error(App::dataBase()));

            }
            
        }
    }
    
}


?>