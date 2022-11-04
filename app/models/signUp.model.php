<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';

 
class Signup_model {

    public static function signUp($userName , $email){    

        if(App::check_connection()){  


            $mysqli    =   App::dataBase();
            $query     =   $mysqli->prepare("SELECT COUNT(*) FROM user where username= ? OR  email= ? ") ;
            App::prepare_method(2 , $query , "ss" , $userName , $email , "");

            $result    =   $query->get_result();

            $row       =   $result->fetch_assoc();  

            $count     =   $row["COUNT(*)"];

            if($result){
                

                $query->close();
                $result->close();

                if($count == 1 ){

                    return true;
  
                }else{ 

                    
                    return false;
                       
                }

         
            }else{

                return die('Query faild!' .  mysqli_error(App::dataBase()));

                
            }
        }
    }


    public static function insert_singUp_data($userName , $email , $passWord){

        $mysqli     =   App::dataBase();
        $query      =    $mysqli->prepare("INSERT INTO user(username , password , email) VALUES ( ? , ? , ?)");
        App::prepare_method(3 , $query , "sss" , $userName , $passWord , $email );
        
        $query->close();
        $mysqli->close();


        $_SESSION["user_name"] = $userName;  
        $_SESSION["isLogged"] = TRUE;

        return;
 
    }
}


















?>