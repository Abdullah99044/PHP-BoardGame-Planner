<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansView.class.php';


class PlansControl extends PlansView {

    public function select_game()
    {   

        if($this->check_connection()){

            
            $query = "SELECT * FROM games";

            $results = mysqli_query($this->dataBase() , $query );

            if($results){

                $games_list = [];
            
                while($row =  mysqli_fetch_assoc($results)){

                    $name = $row['name'];
                    $id = $row['id'];

                    $value = "<option value='$id'>$name  </option>" ;

                    array_push( $games_list ,  $value );

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
            

            $_SESSION["game"] =  $select;

            $html_code .= "<input type='hidden' name='id'  value='$game_id'  > ";
        }

        if($this->check_connection()){

            $query = "SELECT * FROM games where id='$select'" ;    
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

                $game_name = $row['name'];
                
               
        
                $html_code .= "<label> Name of the explain player : </label> "  ;

                $html_code .= "<input type='hidden' name='game_name' value='$game_name' >  <br> ";

                $html_code .= "<input type='hidden' name='game_id' value='$select' >  <br> ";
                
                $html_code .= "<input type='text' name='maker' value='$maker' required>  <br> ";
        
                $html_code .= "<label>Start time : </label> "; 
                
                $html_code .= "<input type='time'  value='$time' name='time' required>   " ;


        
                 
                $results_players =   $this->select_players($id);

                
                for($i = 0 ; $i < $maxPlayers ; $i++){
        
                    $numString =  (string) $num;
                    
                    $row_players = mysqli_fetch_assoc($results_players);
                    
                    $row_name_player = " ";
                   
                    if(!empty($row_players)){
                        $row_name_player = $row_players['name'];

                    }
        
                    $html_code .= "<br> <label>Player $num : </label>  <input required  type='text' value='$row_name_player'   name='player$numString'> "  ;
                    
                
        
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
               
            

                if($this->check_connection()){

                    return $this->show_insert_boxes($select , "" , "" , "" , "" );

                }else{

                    return $this->check_connection();

                }
            }
        }
    }

    public function plans_update_delete($id){
        $html_code = " ";
        $html_code .= "<a href='/../../meesterproef/pages/update_plans.php?id=$id&type=update'> Update </a> "; 
        $html_code .= "<form action='' method='POST'> ";  
        $html_code .= "<input type='hidden' name='id' value='$id'> ";  
        $html_code .= "<input onclick='myFunction()' type='submit' name='submit' value='delete'> " ;
        $html_code .= "</form>  ";

        return $html_code;
    }


    

   
}
















?>