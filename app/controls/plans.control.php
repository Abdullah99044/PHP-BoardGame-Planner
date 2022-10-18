<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\controls\joinPlan.control.php';

class PlansControl {


    #Deze functies gaan plans tonen aan de gebruker

    public static function readplans($user )
    {   

        if($user == "personal"){

            if(isset($_SESSION["user_name"])){


                return PlansModel::get_personal_plans();

                
                
                 
            }

        }else{

            return PlansModel::get_all_plans();
            
        }
    }

 
    

    public static function game_details($gameName , $type_display ,  $name_of_the_orgnaiser , $id , $start_time , $type_user ){

        $image_time =  PlansModel::gameData( $gameName);
        $name_of_the_game = $image_time['name'];
        $image = $image_time['image'];
        $play_time = $image_time['play_minutes'];
        $explain = $image_time['explain_minutes'];
        $maxPlayers =  $image_time['max_players'];

        
        $full_or_not = JoinPlan_model::join_bolean($id , $maxPlayers);

        $html_code = " ";

        $html_code .= "<br> <h2> Start time : $start_time  ($full_or_not)  </h2> <br> ";

        if($type_display == "read_plans"){

            $html_code .= "<a href='/../../meesterproef/app/views/detailsPage.php?game=$name_of_the_game&id=$id'> <img  src='/../../meesterproef/afbeeldingen/$image'   alt='$name_of_the_game' width='200' >   </a>  ";
            $html_code .= "<br>  <p> Game : <a href='/../../meesterproef/app/views/detailsPage.php?game=$name_of_the_game&id=$id'> $name_of_the_game  </a>  <br> ";  
        }

        $html_code .= "<p> The orgnaiser :  $name_of_the_orgnaiser  <br> " ;
        $html_code .= "Explain Time :   $play_time   <br> " ;
        $html_code .= "Play Time :  $explain   <br> " ;

        if($type_user == "admin"){  
                
            if($full_or_not == "not full"){
                $html_code .= " <br>   <a href='/../../meesterproef/app/views/add_updatePlayer.php?name=$gameName&id=$id&type=add'>       add player  </a>  <br>";
            }

            $html_code .= self::update_delete_plan($id);
            
        }


        $html_code .= "Players :  ";


        return $html_code;

    }

    public static function show_plans($results , $type_user , $type_display , $join_player  ){

        if($results){

            $game =   $results;
            
            $gameName = $game['name'];
            $start_time = $game['startTime'];
            $name_of_the_orgnaiser = $game['makerName'];

            $id =  $game['id'];

            $html_code = "";

            $html_code .= self:: game_details($gameName , $type_display ,  $name_of_the_orgnaiser , $id , $start_time , $type_user  );
            
            
            
            if(App::read_how_many_players_in_plan($id) != 0){

                $players_list = PlansModel::players($id);

                foreach($players_list as $value){

                    $row = PlansModel::read_player_data($value);

                    $name =  $row['name'];
                    $player_id =  $row['id'];
                    $html_code .= " <br>  $name ";

                    if($type_user == "admin"){  

                        $html_code .= "  <a href='/../../meesterproef/app/views/add_updatePlayer.php?name=$name&id=$id&type=update'>  Update </a> ";

                        

                        $html_code .= "<form action='' method='POST'> ";  
                        $html_code .= "<input type='hidden' name='id' value='$id'> ";  
                        $html_code .= "<input type='hidden' name='name' value='$name'> ";  
                        $html_code .= "<input type='hidden' name='player_id' value='$player_id'> ";  
                        $html_code .= "<input type='hidden' name='type' value='player'> ";  
                        $html_code .= "<input onclick='myFunction()' type='submit' name='submit' value='delete'> " ;
                        $html_code .= "</form>  ";

                    }

                }
 
            }else{

                $html_code .= " No players yet " ;

            }
            
            $html_code .= "</p>  ";
            

            if($type_user == "joinedGames"){

                $html_code .= "<form action='' method='POST'> ";  
                $html_code .= "<input type='hidden' name='plan_ID' value='$id'> ";    
                $html_code .= "<input onclick='myFunction()' type='submit' name='submit' value='delete'> " ;
                $html_code .= "</form>  ";

                
            }

          

            return  $html_code;
            
        }else{

            return die('Query failed plans control' . mysqli_error(App::dataBase()));

        }

    }


    #Deze functies gaan data van de gebruiker halen en tovoegt dit data aan de deatabase

    public  function select_game()
    {   

  
        $games_list = [];
         

        
       
        $result = PlansModel::selectGame();

        while($row =  mysqli_fetch_assoc($result )){

            
            $name = $row['name'];
            $id = $row['id'];
            $time = $row['play_minutes'];
            $max_players = $row['max_players'];

             

    

            $value = "<option value='$id'> Name : $name | Time : $time | Max players : $max_players  </option>" ;

            array_push( $games_list ,  $value );

            

        }

        return $games_list;
 

        
    } 

    public static function show_insert_boxes($select , $id , $userName , $type , $game_update ){

        $maker = $time =  '';
        $game_players = ['' , '' , ' ' , '' , '' , '' , ' ' , '' , '' , '' , ' ' , ''];
     
        $html_code = " ";

        if(isset($select , $id , $userName , $type , $game_update )){
            
            if($type == "update"){

                $game_id = $id;
                $_SESSION["game_id"] =  $game_id;

                $username = $userName;
                
                $game = $game_update;

                $num_players_in_plan = App::read_how_many_players_in_plan($game_id);

                $maker = $game['makerName'];
                $time = $game['startTime'];
                

                $_SESSION["game"] =  $select;


                $html_code .= "<input type='hidden' name='id'  value='$game_id'  > ";
            
            }

            $row = PlansModel::show_insert_boxes($select , "not details");

            echo App::gameDetails($row);
            
            $maxPlayers = $row['max_players'];
            $playTime = $row['play_minutes'];
            $game_name = $row['name'];
            
            $html_code .= "<h1> Make a plan </h1> <br> "  ;

            $html_code .= "<label> Name of the explain player : </label> "  ;

            $html_code .= "<input type='text' name='maker' value='$maker' required>  <br> ";

            $html_code .= "<input type='hidden' name='game_name' value='$game_name' >  ";

            $html_code .= "<input type='hidden' name='play_time' value='$playTime' >  <br> ";

            $html_code .= "<input type='hidden' name='game_id' value='$select' >  <br> ";
            
            $html_code .= "<label>Start time : </label> "; 
            
            $html_code .= "<input type='time'  value='$time' name='time' required>   " ;



                
             
       

            $_SESSION["numPlayers"] =  $maxPlayers;
            
             
            
            if($type == "update"){

                $html_code .= "<input   onclick='myFunction()'  type='submit' name='submit' value='update'> ";

            }else{
                $html_code .= "<input  onclick='myFunction()''  type='submit' name='submit' value='reserve'> ";

            }
                    
            return  $html_code;

        }else{

            return "Something wrong";
        }


    }

    public static function reserveren()
    {
 
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST["gameName"])){
                

                $select = $_POST['gameName'];
               
                return self::show_insert_boxes($select , "" , "" , "" , "" );
 
            }
        }
    }

    public static function insert($type){

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            if(!empty($_POST["maker"]) && !empty($_POST["time"])){

               
                $user_id =  App::select_user_id();

                 
 
                $person_who_explains_game = $_POST["maker"];
                $person_who_explains_game = App::mysql_escape($person_who_explains_game);

                #De start tijd van het spell

                $time = $_POST["time"];  
                
                $startTime = (string) $time;

                $startTime =  App::mysql_escape($startTime);

                $play_time = $_POST['play_time'];
                
                #Deze 'session' is gemaakt om ons te vertellen over het aantal spelers

                 

                $players = []; #in dit array bewaren we de namen van de spelers

                $number_of_players = $_SESSION["numPlayers"] ; #Deze variable bewaart de aantal van de spelers van class inputData
                $number_of_players = (int)  $number_of_players; 

                $game_Name = $_POST['game_name'];
                $game_Name = App::mysql_escape($game_Name);

                $game_id = $_POST['game_id'];
                $game_id = App::mysql_escape($game_id);

               


                #Player + number ( zoals 'player1' of 'player2') zijn de namen van de input forms in reservePage.php

                #We gaan zorgen om deze nammen in een autmatch maneer te maken door een nummer tevogen aan 'player'

                #Daarna we gaan dit nammen elke keer in $players array toevogen zodat kunnen we alle players een keer toevogen in de database


                $num = 1; 

                for($i = 0 ; $i != $number_of_players ; $i++){

                    $numString = (string) $num; 

                    $playerName = 'player' . $numString; 

                    if(!empty($_POST[$playerName])){

                        $player = $_POST[$playerName];   #Hier verzamel we de naam van elke player die in de input forms heeft geschreven
                        $player = App::mysql_escape($player);

                        array_push($players , $player);
                    } 
                        

                    $num++;


                }
  

                $id = $_POST["id"];
                $player = App::mysql_escape($id);

                return PlansModel::insert($type , $id , $game_Name , $person_who_explains_game ,  $startTime , $play_time , $user_id , $game_id , $players);
                 
            }
        }
    }

    public static function update_delete_plan($id){

       

        $html_code = " ";
        
        $html_code .= "<a href='/../../meesterproef/app/views/update_plans.php?id=$id&type=update'> Update </a> "; 
        $html_code .= "<form action='' method='POST'> ";  
        $html_code .= "<input type='hidden' name='id' value='$id'> ";  
        $html_code .= "<input type='hidden' name='type' value='plan'> ";
        $html_code .= "<input onclick='myFunction()' type='submit' name='submit' value='delete'> " ;
        $html_code .= "</form>  ";

        return $html_code;
            
    }


 
     
}













?>