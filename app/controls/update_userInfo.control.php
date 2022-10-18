<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\update_userInfo.model.php';

class UpdateInfo {

    public static function passwordUpdate(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST["password"]) && empty($_POST["username"])){

                echo 'write something'; 

            }else{
 
                 
                $username = $_SESSION["user_name"];
                $password = $_POST["password"];
                $newPassword = $_POST["newPassword"];

                $username = App::mysql_escape($username);
                $password = App::mysql_escape($password);
                $newPassword = App::mysql_escape($newPassword);


                return UpdateInfo_MO::passwordUpdate($username , $password , $newPassword);

            }
        } 
    }


    public static function emailUpdate(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST["email"]) && empty($_POST["newEmail"])){

                return 'write something'; 

            }else{

                $username = $_SESSION["user_name"];
                $email = $_POST["email"];
                $newEmail = $_POST["newEmail"];

                $email = App::mysql_escape($email);
                $newEmail = App::mysql_escape($newEmail);
                
                return UpdateInfo_MO::emailUpdate($username , $email , $newEmail);
                
            }
        }
    }
}
        

 
















?>