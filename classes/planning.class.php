<?php



require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\app.class.php';



class Plans extends App {

   #This fuctions will display the game plans for users

    public function show_plans($results , $type_user , $type_display ){


            if($results){
                
                $game =  mysqli_fetch_assoc($results);
                $start_time = $game['startTime'];
                $name_of_the_game = $game['name'];
                $name_of_the_orgnaiser = $game['makerName'];

                $id =  $game['id'];

                $players = $game['players'];
                $players = explode("," ,  $players);


                $query_image_time = "SELECT image , play_minutes , explain_minutes  FROM games WHERE name='$name_of_the_game' ";

                $result_image_time = mysqli_query($this->dataBase() , $query_image_time );

                if($result_image_time){

                    $image_time =  mysqli_fetch_assoc($result_image_time);
                    $image = $image_time['image'];
                    $time = $image_time['play_minutes'] + $image_time['explain_minutes'];

                }
                
                $html_code = "";

                $html_code .= "<br> <h2> Start time : $start_time   </h2> <br> ";

                if($type_display == "read_plans"){

                    $html_code .= "<img  src='/../../meesterproef/afbeeldingen/$image'   alt='$name_of_the_game'> ";
                    $html_code .= "<br>  <p> Game : <a href='/../../meesterproef/pages/detailsPage.php?game=$name_of_the_game&id=$id'> $name_of_the_game  </a>  <br> ";  
                }

                $html_code .= "<p> The orgnaiser :$name_of_the_orgnaiser    <br> " ;
                $html_code .= "Time :  $time   <br> " ;
                $html_code .= "Players :  ";

             

                foreach($players as $player){ 
                 

                    $html_code .= "<br>  $player ";

                } 
                
              

                $html_code .= "</p>  ";
 

                if($type_user == "admin"){  

                    
                    $html_code .= "<a href='/../../meesterproef/pages/update_plans.php?id=$id&type=update'> Update </a> "; 
                    $html_code .= "<form action='' method='POST'> ";  
                    $html_code .= "<input type='hidden' name='id' value='$id'> ";  
                    $html_code .= "<input onclick='myFunction()' type='submit' name='submit' value='delete'> " ;
                    $html_code .= "</form>  ";

                    
                }
                

                return  $html_code;
            
            }else{

                return die('Query failed!' . mysqli_error($this->dataBase()));

            }

    }

    public function readplans($user , $type)
    {   

        if($this->check_connection()){

            
           

            if($user == "personal"){

                if(isset($_SESSION["user_name"])){
                    
                    $username = $_SESSION["user_name"];

                    $query = "SELECT id FROM planning";
                

                    $results = mysqli_query($this->dataBase() , $query );

                    $plans_list = [];
                
                    while($row = mysqli_fetch_assoc($results)){

                        $id = $row['id'];

                        if($results){

                            $query_2 = "SELECT * FROM planning WHERE id='$id'";
                            
                            $results_2 = mysqli_query($this->dataBase() , $query_2 );

                            $row_name = mysqli_fetch_assoc($results_2);

                            $username_row = $row_name['userName'];

                            if( $results_2){

                                if($username_row == $username){

                                    $query_3 = "SELECT * FROM planning WHERE id='$id' AND userName='$username'";

                                    $results_3 = mysqli_query($this->dataBase() , $query_3 );
            
                                    if($results_3){
            
                                        array_push($plans_list , $this->show_plans( $results_3 , $type  , "read_plans" ));
            
                                    }else{
            
                                        return die('Query failed!' . mysqli_error($this->dataBase()));
                                    }

                                }
                            
                            }else{

                                return  die('Query failed!' . mysqli_error($this->dataBase()));
                            } 


                            $id++;

                            
            
                        }



                    }

                    return $plans_list ;
                }
   
            }else{

                $query = "SELECT id FROM planning";
            

                $results = mysqli_query($this->dataBase() , $query );

                $plans_list = [];

                if($results){

                    while($row = mysqli_fetch_assoc($results)){

                        $id = $row['id'];
                        
                        $query_2 = "SELECT * FROM planning WHERE id='$id'";
                        $results_2 = mysqli_query($this->dataBase() , $query_2 );
            
                        if($results_2){
                            array_push($plans_list , $this->show_plans($results_2 ,  $id , "read_plans"));
                        }else{

                            return  die('Query failed!' . mysqli_error($this->dataBase()));

                        }
                       

                        $id++;
 
                    }
                    
                    return  $plans_list; 
        

                }else{

                    return  die('Query failed!' . mysqli_error($this->dataBase()));
                } 

            }

        }else{

            return $this->check_connection();
        }
    }


    #This fuctions will help the users with saving their plans in the data base

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

    public function insert($type){

        if($_SERVER["REQUEST_METHOD"] == "POST"){


            if(!empty($_POST["maker"]) && !empty($_POST["time"])){

               
                $username = $_SESSION["user_name"];;

                $userName = mysqli_real_escape_string($this->dataBase() ,$username);
                 #Het naam van de speler die zal uitlig geven over het spel

                $person_who_explains_game = $_POST["maker"];
                $person_who_explains_game = mysqli_real_escape_string($this->dataBase() , $person_who_explains_game);

                #De start tijd van het spell

                $time = $_POST["time"];  
                
                $startTime = (string) $time;

                $startTime =  mysqli_real_escape_string($this->dataBase() , $startTime);

                
                #Deze 'session' is gemaakt om ons te vertellen over het aantal spelers

                 

                $players = []; #in dit array bewaren we de namen van de spelers

                $number_of_players = $_SESSION["numPlayers"] ; #Deze variable bewaart de aantal van de spelers van class inputData

                $game_Name =  $_SESSION["game"] ;

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

                $players = implode("," , $players );
                $players = mysqli_real_escape_string($this->dataBase() ,  $players );
                

                $id = $_POST["id"];

                if($this->check_connection()){
                    if($type == "update"){
                        $id = $id;
                        

                        $data = [ $game_Name , $person_who_explains_game , $startTime , $players , $userName ];
                        $coloumn = [ 'name' , 'makerName' , 'startTime' , 'players' , 'userName' ];
        
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

                        $query = "INSERT INTO planning(name , makerName , startTime , players , userName) VALUES('$game_Name' , '$person_who_explains_game' , '$startTime' , '$players' , '$userName')";
                        $result = mysqli_query($this->dataBase() ,  $query);

                        if(!$result){

                            return  die('Query faild' .  mysqli_error($this->dataBase()));

                        }else{

                            return header('Location: /../../meesterproef/pages/feedback_page.php?type=update');

                        }
                    }
                }else{

                    return $this->check_connection();
                }
            }
        }
    }

}


?>