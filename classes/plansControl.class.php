<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansView.class.php';


class PlansControl extends App {

    public function select_game()
    {   

        if($this->check_connection()){

            
            $query = "SELECT name FROM games";

            $results = mysqli_query($this->dataBase() , $query );

            if($results){

                $games_list = [];
            
                while($row =  mysqli_fetch_assoc($results)){

                    $name = $row['name'];

                    $value = "<option value='$name'>$name  </option>" ;

                    array_push( $games_list ,  $value);

                }

                return $games_list;

            }else{

                return die('Query failed!' . mysqli_error($this->dataBase()));
            }
        
        }
    } 

    public function show_insert_boxes($select , $id , $userName , $type , $game_update ){

        $maker = $time =  '';
        $game_players = ['' , '' , ' ' , '' , '' , '' , ' ' , '' , '' , '' , ' ' , ''];
     
        $html_code = " ";

        if($type == "update"){

            $game_id = $id;
            $_SESSION["game_id"] =  $game_id;

            $username = $userName;
             
            $game = $game_update;

            $maker = $game['makerName'];
            $time = $game['startTime'];
            $game_players = $game['players'];
            $game_players = explode("," ,  $game_players);

            $_SESSION["game"] =  $select;

            $html_code .= "<input type='hidden' name='id'  value='$game_id'  > ";
        }

        if($this->check_connection()){

            $query = "SELECT * FROM games where name='$select'" ;    
            $result = mysqli_query( $this->dataBase() , $query );
            $row = mysqli_fetch_assoc($result);

            if($result){

                $maxPlayers = $row['max_players'];


                $players = (string) $maxPlayers;
                $_SESSION["numPlayers"] = $players;
        
                $img = $row['image'];
        
                $playTime = $row['play_minutes'] + $row['explain_minutes'];
        
                $num = 1;
                $player_num = 0;
                
               
        
                $html_code .= "<label> Name of the explain player : </label> "  ;
                
                $html_code .= "<input type='text' name='maker' value='$maker' required>  <br> ";
        
                $html_code .= "<label>Start time : </label> "; 
                
                $html_code .= "<input type='time'  value='$time' name='time' required>   " ;
        
        
                
        
                for($i = 0 ; $i < $maxPlayers ; $i++){
        
                    $numString =  (string) $num;
        
                    
            
        
                    $html_code .= "<br> <label>Player $num : </label>  <input required  type='text' value='$game_players[$player_num]'   name='player$numString'> "  ;
                    
                
        
                    $num++;
                    $player_num++;
                    
                }
        
                return  $html_code;


            }else{

                return  die('Query faild' .  mysqli_error($this->dataBase()));


            }

        }else{
            
            return $this->check_connection();

        }
       
    }

    
    public function reserveren()
    {
 
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST["gameName"])){
                

                $select = $_POST['gameName'];
                $_SESSION["game"] =  $select;
            

                if($this->check_connection()){

                    return $this->show_insert_boxes($select , "" , "" , "" , "" );

                }else{

                    return $this->check_connection();

                }
            }
        }
    }

   
}
















?>