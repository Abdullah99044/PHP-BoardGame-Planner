<?php

 
require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\filter.model.php';


class FilterControl {

    public static function select_filter(){

        

        $game_types= [  "40 minuten spelletjes " =>  40 , 

                        "45 minuten spelletjes " =>  45 , 
                        
                        "50 minuten spelletjes " =>  50 ,  
                        
                        "60 minuten spelletjes " =>  60  , 
                        
                        "minder dan 40 minuten spelletjes " => 30 , 
                        
                        "meer dan 60 minuten spelletjes "   => 65
                
                     ];

        
        $htm_code = " ";
        
        
         
        foreach($game_types as  $key => $value){


            $htm_code .= "<option value='$value '> $key  </option> "; 

           
 
        }
        
       

       

        return $htm_code;

    }


    public static function filter(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $game_type  = $filter_off =  " ";

            if(isset($_POST['filter_off'])){
                
                $filter_off = false;
                
                return  $filter_off;
                
            }else{ 

                $game_type = $_POST['games_type']  ;

                $game_type = mysqli_real_escape_string( App::dataBase() , $game_type) ;

                return   FilterModel::filter($game_type);
                   
            }

             
        }


        
    }

    public static function show_joined_games(){
        

        $filterd_games = FilterModel::show_joined_games();
        
        return $filterd_games;
    }

}










?>