<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';

 
class Signup_model {

    public static function signUp($userName , $email , $passWord){    

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

                    return "This informations already exist";
                

                }else{
 
                    $query_1    =    $mysqli->prepare("INSERT INTO user(username , password , email) VALUES ( ? , ? , ?)");
                    $result_1   =    App::prepare_method(3 , $query_1 , "sss" , $userName , $passWord , $email );
                     
                    if($result_1){


                        $query_1->close();
                        $result_1->close();
                        $mysqli->close();

                        $_SESSION["user_name"] = $userName; 
                        return header('Location: /../../meesterproef/app/views/personalPage.php');
 
                    }else{

                        return die('Query faild!!!' .  mysqli_error(App::dataBase()));


                    }     
                }

         
            }else{

                return die('Query faild!' .  mysqli_error(App::dataBase()));

                
            }
        }
    }
}


















?>