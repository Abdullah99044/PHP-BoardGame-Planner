<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansControl.class.php';

 


class Filter extends PlansView {


    public function select_type_of_games(){

        $game_types= ["40 minuten spelletjes "  , "45 minuten spelletjes "   , "60 minuten spelletjes "   , "minder dan 40 minuten spelletjes "  ];
        $game_time = [40 , 45 , 60 , 30];
        
        $htm_code = " ";

        $htm_code .= "<form  method='POST' action='' > ";

        $htm_code .=  "<select name='games_type' > ";

        $num1 = 0;
        $num2 = 0;

        foreach($game_types as  $value){


            $htm_code .= "<option value='$game_time[$num2]'>$game_types[$num1] </option> "; 

            $num1++;
            $num2++;
            
        }
        
        $htm_code .=  "</select> ";

        $htm_code .=  "<input type='submit' value='select' name'submit' > ";

        $htm_code .=  "</form> ";

        $htm_code .= " <form  method='POST' action='' > ";

        $htm_code .=  "<input type='hidden' name='filter_off' value='false' > ";

        $htm_code .=  "<input type='submit' value='resest' name'submit' > ";

        $htm_code .=  "</form> ";

        return $htm_code;

    }


    public function filter_model($time){

        $query = "SELECT * FROM games WHERE play_minutes ='$time'";
        $result = mysqli_query($this->dataBase() ,  $query );

        $games = [];

        if($result){

            while($row = mysqli_fetch_assoc($result)){

                $id = $row['id'];

                array_push($games , $id);

            }

            $plans = [];

            $num = 0;

            foreach($games as $value){

                
                $id = $games[$num];

                $query_1 = "SELECT * FROM planning WHERE Game_ID= '$id' ";
                $result_1 = mysqli_query($this->dataBase() ,  $query_1 );

                $count = mysqli_num_rows($result_1);

                if($count != 0){
   

                    array_push($plans , $this->show_plans($result_1  , ""  , "read_plans" ));
                    

                } 

                $num++;
                    
            }

            return $plans ;


        }else{

            return  die('Query faild' .  mysqli_error($this->dataBase()));
        }


    }


    public function filter_control(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $type_of_game = $filter_off = $filter_onn = " ";

            if(isset($_POST['filter_off'])){
                $filter_off = false;
                
                return  $filter_off;
                
            }else{

                $type_of_game = $_POST['games_type']  ;

                $type = $type_of_game;

                
                return   $this->filter_model($type);
                
               
            }

             
        }
    }

}

















?>