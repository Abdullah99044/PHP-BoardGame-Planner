<?php

session_start();





class App {

    private static $server_name     =  'localhost' ;
    private static $mysql_user      =  'root';
    private static $mysql_passWord  =  'mysql';
    private static $dataBase_name   =  'games';


    public  static function dataBase(){
        return new mysqli(self::$server_name , self::$mysql_user , self::$mysql_passWord , self::$dataBase_name) ;
    } 




    public static function check_connection(){

        if(self::dataBase()){
            return true;

        }else{
            return die("Database connection failed");
        }

    }



     
 


    

    public static function logout(){

        unset($_SESSION['user_name'] , $_SESSION["isLogged"]);
        session_destroy();

        return header('Location: /../../meesterproef/index.php');
    
    }




    public static function check_login(){

        if(!isset($_SESSION["user_name"]) && $_SESSION["isLogged"] != true){

            return header('Location: /../../meesterproef/index.php');
        
        }else{

            return true;
        }
    }




    public static function check_set_data($data){

        if(!isset($data)){

            return header('Location: /../../meesterproef/app/views/personalPage.php');
        
        }else{

            return true;
        }
    }





    public static function select_user_id(){

        
        $username = $_SESSION["user_name"];
        
        $mysqli = App::dataBase();
        $query = $mysqli->prepare("SELECT id FROM user WHERE username = ? ");
        App::prepare_method(1 , $query , "s" , $username , "" , "");

        $user_data   =    $query->get_result();
         
        $user_row    =    $user_data->fetch_assoc();

        $user_id     =    $user_row['id'];


        $query->close();
        $mysqli->close();

        return $user_id ;
        
    }




    public static function select_players($id){

        $mysqli       =   App::dataBase();
        $query        =   $mysqli->prepare("SELECT * FROM players WHERE plan_id= ? ");
        App::prepare_method(1 , $query , "i" , $id , "" , "");
        $players_data =   $query->get_result();


        $mysqli->close();
        $query->close();
         
        return $players_data->fetch_assoc();
         

    }




    public static function select_player_id( $name , $plan_id){

       

        $mysqli          =    App::dataBase();
        $query           =    $mysqli->prepare("SELECT * FROM players WHERE name= ? AND plan_id= ? ");
        App::prepare_method(2 ,  $query , "si" , $name , $plan_id , "" );
        $player_data     =    $query->get_result();
        $row             =    $player_data->fetch_assoc();

        $player_id       =    $row['id'];

        $query->close();
        $mysqli->close();

        return  $player_id;

    }





    public static function prepare_method( $num , $query , $dataType , $col1 , $col2 ,  $col3){

        if($num == 2){
            $query->bind_param($dataType  , $col1 , $col2);
       
        }elseif($num == 1){
            $query->bind_param($dataType  , $col1);

        }else{
            $query->bind_param($dataType  , $col1 , $col2 , $col3);
        }
       
        return  $query->execute();;

    }





    public static function read_how_many_players_in_plan($plan_id){


        $mysqli     =     App::dataBase();
        $query      =     $mysqli->prepare("SELECT  COUNT(*) FROM players WHERE plan_id= ? ");
        $result     =     App::prepare_method(1 ,  $query , "i" , $plan_id ,  "" , "" );
        $count      =     $query->get_result();

        $query->close();
        $mysqli->close();

        if($result){

            $row = $count->fetch_assoc();
            return $row["COUNT(*)"];

        }else{
            return  die('Query faild!' . mysqli_error(App::dataBase()) );
        }
    }






    public static function max_players($Game_id){
        

        $mysqli       =   App::dataBase();
        $query        =   $mysqli->prepare("SELECT * FROM games WHERE id= ? ");
        $result       =   App::prepare_method(1 , $query , "i" , $Game_id , "" , "");
        $game_data    =   $query->get_result();

        $row          =   $game_data->fetch_assoc();
        $max_players  =   $row['max_players'];

        $query->close();
        $mysqli->close();

        if($result){
           return $max_players ;

        }else{
            return  die('Query faild!' . mysqli_error(App::dataBase()) );
       }

    }






    public static function select_game_id($Plan_id){
        

        $mysqli        =    App::dataBase();
        $query         =    $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
        $result        =    App::prepare_method(1 , $query , "i" , $Plan_id , "" , "");
        $plan_data     =    $query->get_result();


        $query->close();
        $mysqli->close();
        
        if($result){

           $row     =  $plan_data->fetch_assoc();
           $game_id =  $row['Game_ID'];
           return $game_id ;

        }else{
            return  die('Query faild!' . mysqli_error(App::dataBase()) );
       }

    }






    public static function select_plan_user_id($Plan_id){
        
        $mysqli        =    App::dataBase();
        $query         =    $mysqli->prepare("SELECT * FROM planning WHERE id= ? ");
        $result        =    App::prepare_method(1 , $query , "i" , $Plan_id , "" , "");
        $plan_data     =    $query->get_result();

        $query->close();
        $mysqli->close();

        if($result){

           $row        =  $plan_data->fetch_assoc();
           $user_id    =  $row['userID'];
           return $user_id ;

        }else{
            return  die('Query faild!' . mysqli_error(App::dataBase()) );
       }

    }


    



    public static function mysql_escape($data){
    
        return mysqli_real_escape_string(App::dataBase() ,  $data); 

    }






    public static function gameDetails($result){
        
        $data_game_details    =    $result;

                
        $image                =    $data_game_details['image'];

        $name_of_the_game     =    $data_game_details['name'];

        $description          =    $data_game_details['description'];

        $expansions           =    $data_game_details['expansions'];

        $skills               =    $data_game_details['skills'];

        $min_players          =    $data_game_details['min_players'];

        $max_players          =    $data_game_details['max_players'];

        $explain_minutes      =    $data_game_details['explain_minutes'];

        $play_minutes         =    $data_game_details['play_minutes'];

        $url                  =    $data_game_details['url'];

        $youtube              =    $data_game_details['youtube'];


    
        $details              =    "";
        $details             .=    "<h2> $name_of_the_game </h2> <br> ";
        $details             .=    "<img src='/../../game/afbeeldingen/$image' alt=$name_of_the_game  width='200' > ";
        $details             .=    "<br>  $youtube  <p> $description  <br> <a href='$url'> to the game </a>  <br>  ";
        $details             .=    "Expansions : $expansions Skills : $skills <br> Min players : $min_players ";
        $details             .=    " <br> Max players : $max_players <br>  Explain minutes :  $explain_minutes  ";
        $details             .=    "<br> Play minutes : $play_minutes </p> ";

        
        return $details;


    }
 
}

























?>