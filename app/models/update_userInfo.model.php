<?php


require 'C:\Program Files\ammps2\Ampps\www\meesterproef\app\models\app.model.php';



class UpdateInfo_MO {


    public static function passwordUpdate($username , $password , $newPassword ){

        if(App::check_connection()){
                  
            
            $mysqli = App::dataBase();

            $query  = $mysqli->prepare("SELECT *  FROM user where username= ? ") ;
            $result = App::prepare_method(1 , $query , "s" , $username , "" , "" );
            $data   = $query->get_result();

            $row  =           $data->fetch_assoc();
            $user_Password =  $row["password"];
            $id =             $row["id"];
             
            if($result ){
                
                if($password == $user_Password){

                    $query->close();
                    $data->close();
    
                    $query = $mysqli->prepare("UPDATE user SET password= ? WHERE id= ? ");
                    $result =  App::prepare_method(2 , $query , "si" , $newPassword , $id , "" );

                    if($result){

                        $query->close();
                        $mysqli->close();
    
                        return header('Location: /../../meesterproef/app/views/personalPage.php');
                        
                    }else{
    
                        return die('Query faild!' . mysqli_error(App::dataBase()) );
                    }
    
                }else{
    
                    return  "<h1>  Invalid  password.</h1>";  
    
                }
    
            }else{
    
                return die('Query faild!' . mysqli_error(App::dataBase()) );
    
            }


        } else{

            return App::check_connection();

        }


    }



    public static function emailUpdate($username , $email , $newEmail){

       

        $mysqli =  App::dataBase();

        $query = $mysqli->prepare("SELECT * FROM user where username= ? ") ;
        $result =  App::prepare_method(1 , $query , "s" , $username , "" , "" );

        $data =  $query->get_result();
        $row = $data->fetch_assoc();

        $user_email = $row["email"];
        $id =  $row["id"];

        if($result){
            
            if($user_email ==  $email){

                
                $query->close();

                $query = $mysqli->prepare("UPDATE user SET email= ? WHERE id= ? ");
                $result =  App::prepare_method(2 , $query , "si" , $newEmail , $id , "" );

                if($result){

                    $query->close();
                    $data->close();
                    $mysqli->close();

                    return header('Location: /../../meesterproef/app/views/personalPage.php');

                }else{

                    return die('Query faild!' . mysqli_error(App::dataBase()) );
                }

            }else{

                return  "<h1>  Invalid   email </h1>";  

            }

        }else{

            return die('Query faild!' . mysqli_error(App::dataBase()) );

        }
        
    }

}












?>