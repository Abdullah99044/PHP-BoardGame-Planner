<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';



class Login_Model { 

    public static function login($username , $password){

        if(App::check_connection()){
            
            
            $mysql    =   App::dataBase();
            $query    =   $mysql->prepare("SELECT COUNT(*) FROM user where username= ? AND password= ? ") ;
            App::prepare_method(2 , $query , "ss" , $username , $password , "");
            $result   =   $query->get_result();

            $row      =   $result->fetch_assoc();
            $count    =   $row["COUNT(*)"];
            

            if($result){

                $result->close();
                $query->close();
                $mysql->close();

                if($count == 1){
 
                    $_SESSION["user_name"] = $username;  
                    $_SESSION["isLogged"] = TRUE ;

                    return true;

                }else{

                    return false;

                }


            }else{

                
                return die("Query faild! login  " . mysqli_error(App::dataBase()) );
                

            }
        }else{

            return App::check_connection();
        }
    }
}




 














?>