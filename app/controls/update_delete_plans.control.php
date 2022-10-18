<?php



require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\update_delete_plans.model.php';

 

class UpdateDelete {



    public static function update($id){

            $username = $_SESSION["user_name"];
            
            $user_id = App::select_user_id();

            $game = Update_Delete_Model::update($id , $user_id );

        if(isset($id , $game)){
            
            $game_name = $game['Game_ID'];

            return PlansControl::show_insert_boxes($game_name ,  $id  ,  $username ,"update" , $game);    
             
        }else{

            return "Something wrong";
        }

      

    }

    public static function add_update_Player($type){

        if($_SERVER["REQUEST_METHOD"] == "POST" ){

            if(isset($type , $_POST['name'] , $_POST['id'] , $_POST['player'])){


                $name = $_POST['name'];
                $id = $_POST['id'];
                $player = $_POST['player'];
                

                $name = App::mysql_escape($name);
                $id = App::mysql_escape($id);
                $player = App::mysql_escape($player);

                return Update_Delete_Model::add_update_Player($name   , $id , $player , $type);

            }else{

                return "Something wrong";
            }

        }
            
    }
 
    public static function delete(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset( $_POST['type']  , $_POST['id']  )){

                $id =  $_POST['id'];
                $type = $_POST['type'];
                $player_id = $_POST['player_id']; 

                $id = App::mysql_escape($id);
                $type = App::mysql_escape($type);
                $player_id = App::mysql_escape($player_id);


                $user_id = App::select_user_id();
                 

                return Update_Delete_Model::delete($id , $user_id ,  $type , $player_id);

 
            
            }else{

                return "Something wrong";
            }
        }
    }
}

















?>