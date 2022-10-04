<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansView.class.php';



class Details extends PlansView {

    public function read_games_details()
    {

        if($this->check_connection()){
            $game = $_GET['game']; 

            

            $query_game_details = "SELECT * FROM games WHERE name='$game'";
            $result_game_details = mysqli_query($this->dataBase() , $query_game_details );


            

            if($result_game_details){

                $data_game_details = mysqli_fetch_assoc($result_game_details);

                $image =  $data_game_details['image'];

                $name_of_the_game =   $data_game_details['name'];

                $description =   $data_game_details['description'];

                $expansions =   $data_game_details['expansions'];

                $skills =   $data_game_details['skills'];

                $min_players =   $data_game_details['min_players'];

                $max_players =   $data_game_details['max_players'];

                $explain_minutes =   $data_game_details['explain_minutes'];

                $play_minutes =   $data_game_details['play_minutes'];

                $url =   $data_game_details['url'];

                $youtube =   $data_game_details['youtube'];


            
                $details = "";
                $details .= "<h2> $name_of_the_game </h2> <br> ";
                $details .=  "<img src='/../../game/afbeeldingen/$image' alt=$name_of_the_game > ";
                $details .=  "<br>  $youtube  <p> $description  <br> <a href='$url'> to the game </a>  <br>  ";
                $details .=  "Expansions : $expansions Skills : $skills <br> Min players : $min_players ";
                $details .=  " <br> Max players : $max_players <br>  Explain minutes :  $explain_minutes  ";
                $details .= "<br> Play minutes : $play_minutes </p> ";

                return $details;

            }else{

                return die("Query faield!" . mysqli_error($this->dataBase()));
            }
        }else{

            return $this->check_connection();

        }
    }

    public function read_game__plan($id){


        if($this->check_connection()){

            
       

            
            $query_planning_details = "SELECT * FROM planning WHERE id='$id'";
            $result_planning_details = mysqli_query($this->dataBase() , $query_planning_details);

            if($result_planning_details){

                return  $this->show_plans($result_planning_details , "public" , "");

            }else{

                return die("Query faield!" . mysqli_error($this->dataBase()));
            }
        }else{

           return $this->check_connection();
        }

    }








}





















?>