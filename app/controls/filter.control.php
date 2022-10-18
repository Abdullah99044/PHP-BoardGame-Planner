<?php

 
require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\filter.model.php';


class FilterControl {

    public static function select_filter(){

        $game_types= ["40 minuten spelletjes "  , "45 minuten spelletjes "   ,  "50 minuten spelletjes " ,  "60 minuten spelletjes "   , "minder dan 40 minuten spelletjes " , "meer dan 60 minuten spelletjes " ];
        $game_time = [40 , 45 , 50 ,60 , 30 , 65];
        
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

    public static function filter(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $type_of_game = $filter_off = $filter_onn = " ";

            if(isset($_POST['filter_off'])){
                
                $filter_off = false;
                
                return  $filter_off;
                
            }else{ 

                $type_of_game = $_POST['games_type']  ;

                $type = $type_of_game;

                
                return   FilterModel::filter($type);
                
               
            }

             
        }


        
    }

    public static function show_joined_games(){
        

        $list = FilterModel::show_joined_games();
        
        return $list;
    }

}










?>