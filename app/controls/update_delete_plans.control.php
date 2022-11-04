<?php



require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\update_delete_plans.model.php';

 

class UpdateDelete {

 

    public static function update($id){
 
            $user_name = $_SESSION["user_name"];
            
            $user_id = App::select_user_id();

            $update_game_details = Update_Delete_Model::update($id , $user_id );

        if(isset($id , $update_game_details)){
            
            $game_name =  $update_game_details['Game_ID'];

            return PlansControl::show_insert_boxes($game_name ,  $id  , $user_name ,"update" , $update_game_details);    
             
        }else{

            return "Iets fout";
        }

      

    }

 

    
    public static function add_update_Player($type){

        if($_SERVER["REQUEST_METHOD"] == "POST" ){

            if(isset($type , $_POST['name'] , $_POST['id'] , $_POST['player'])){


                $game_name       =     $_POST['name'];
                $plan_id         =     $_POST['id'];
                $player_name     =     $_POST['player']; 
                

                $game_name       =     App::mysql_escape($game_name);
                $plan_id         =     App::mysql_escape($plan_id);
                $player_name     =     App::mysql_escape($player_name);

                return Update_Delete_Model::add_update_Player($game_name  , $plan_id, $player_name , $type);

            }else{

                return "Iets fout";
            }

        }
            
    }
 




    public static function delete(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset( $_POST['delete_type']  , $_POST['plan_id']  )){

                $plan_id     =    $_POST['plan_id'];
                $delete_type =    $_POST['delete_type'];
                $player_id   =    $_POST['player_id']; 

                $plan_id     =    App::mysql_escape($plan_id);
                $delete_type =    App::mysql_escape($delete_type);
                $player_id   =    App::mysql_escape($player_id);


                $user_id     = App::select_user_id();
                 

                return Update_Delete_Model::delete($plan_id , $user_id ,  $delete_type , $player_id);

 
            
            }else{

                return "Iets fout";
            }
        }
    }
}

















?>