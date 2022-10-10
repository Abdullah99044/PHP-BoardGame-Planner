<?php 

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\app.class.php';

class PlansInsert extends App {

    public function players_insert($players , $id){
  
            $player_num = 0 ;
            
            foreach($players as $player){

                $query = "INSERT INTO players(name , plan_id) VALUES('$players[$player_num]' ,  '$id') ";
                $result = mysqli_query($this->dataBase() ,    $query );
        
                if($result){
                    echo "good";
                }else{

                    echo die('Query faild' .  mysqli_error($this->dataBase()));
                }

                echo  $player_num;
                $player_num++;


            }

            return header('Location: /../../meesterproef/pages/personalPage.php');
    }

    public function insert($type){

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            if(!empty($_POST["maker"]) && !empty($_POST["time"])){

               
                $user_id =  $this->select_user_id();

                 
 
                $person_who_explains_game = $_POST["maker"];
                $person_who_explains_game = mysqli_real_escape_string($this->dataBase() , $person_who_explains_game);

                #De start tijd van het spell

                $time = $_POST["time"];  
                
                $startTime = (string) $time;

                $startTime =  mysqli_real_escape_string($this->dataBase() , $startTime);

                
                #Deze 'session' is gemaakt om ons te vertellen over het aantal spelers

                 

                $players = []; #in dit array bewaren we de namen van de spelers

                $number_of_players = $_SESSION["numPlayers"] ; #Deze variable bewaart de aantal van de spelers van class inputData

                $game_Name = $_POST['game_name'];

                $game_id = $_POST['game_id'];

                $number_of_players = (int)  $number_of_players; 


                #Player + number ( zoals 'player1' of 'player2') zijn de namen van de input forms in reservePage.php

                #We gaan zorgen om deze nammen in een autmatch maneer te maken door een nummer tevogen aan 'player'

                #Daarna we gaan dit nammen elke keer in $players array toevogen zodat kunnen we alle players een keer toevogen in de database


                $num = 1; 

                for($i = 0 ; $i <  $number_of_players ; $i++){

                    $numString = (string) $num; 

                    $playerName = 'player' . $numString; 

                    $player = $_POST[$playerName];   #Hier verzamel we de naam van elke player die in de input forms heeft geschreven

                    array_push($players ,   $player);

                    $num++;


                }

               

                 
                 

                $id = $_POST["id"];

                if($this->check_connection()){
                    if($type == "update"){
                        $id = $id;
                        

                        $data = [ $game_Name , $person_who_explains_game , $startTime , $user_id ];
                        $coloumn = [ 'name' , 'makerName' , 'startTime' , 'userID' ];
        
                        $num = 0;    
        
                        foreach($data as $value){
        
                            $nas =  $coloumn[$num];
                            
        
                        
                            $query = "UPDATE planning SET  $nas='$value' WHERE id='$id'";
                            $result = mysqli_query($this->dataBase() ,  $query);
        
                            if(!$result){
                                return die('Query faild' .  mysqli_error($this->dataBase()));
                            }
        
                            $num++;
                        } 
                        
                        if($result){
                            
                            return header('Location: /../../meesterproef/pages/feedback_page.php?type=update');

                        }else{

                            return  die('Query faild' .  mysqli_error($this->dataBase()));

                        }
                            
                    }else{

                        $query = "INSERT INTO planning(name , makerName , startTime , userID , Game_ID ) VALUES('$game_Name' , '$person_who_explains_game' , '$startTime' , '$user_id' , '$game_id')";
                        $result = mysqli_query($this->dataBase() ,  $query);

                        if(!$result){

                            return  die('Query faild' .  mysqli_error($this->dataBase()));

                        }else{

                            $query_1 = "SELECT * FROM planning WHERE  makerName='$person_who_explains_game' AND  userID='$user_id' AND startTime='$startTime' AND Game_ID='$game_id'";
                            $result_1 =  mysqli_query($this->dataBase() ,  $query_1);

                            if($result_1){

                                $row = mysqli_fetch_assoc($result_1);
                                $id = $row['id'];

                                $this->players_insert($players , $id );

                                return header('Location: /../../meesterproef/pages/feedback_page.php?type=update');
                                
                            }else{
                                return  die('Query faild' .  mysqli_error($this->dataBase()));
                            }

                        }
                    }
                }else{

                    return $this->check_connection();
                }
            }
        }
    }

    public function filter_games_model($time){

        if($time == 40)
        {
            $time = 40;
            $query = "SELECT * FROM games WHERE play_minutes < '$time'";
            $result = mysqli_query($this->dataBase() , $query);

        }        
        
        
     
        
        $list = [];

        if($result){

            while($row = mysqli_fetch_array($result)){

                $row_name = $row['name'];
                array_push( $list , $row_name);

            }

            return $list;

        }else{
            return  die('Query faild' .  mysqli_error($this->dataBase()));
        }

    }
}















?>