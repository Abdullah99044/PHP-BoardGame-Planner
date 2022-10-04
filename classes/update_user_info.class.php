<?php

require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\app.class.php';


class updateData extends App{


    public function passwordUpdate()
    {

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST["password"]) && empty($_POST["username"])){

                echo 'write something'; 

            }else{

                
                $username1 = $_SESSION["user_name"];
                $passWord = $_POST["password"];
                $newPassword = $_POST["newPassword"];

                $username = mysqli_real_escape_string($this->dataBase() , $username1);
                $password = mysqli_real_escape_string($this->dataBase() , $passWord );


                $newPassword = mysqli_real_escape_string($this->dataBase() ,  $newPassword );

                #security 


                if($this->check_connection()){
                    
                    $query = "SELECT id FROM user where username='$username' AND password='$password'" ;
                    
                    $result = mysqli_query( $this->dataBase() , $query );

                    $count = mysqli_num_rows($result);  
            
                    if($result){
                        
                        if($count == 1){
            
                            echo 'good';
            
                            $data = mysqli_fetch_row($result);
                            $id = $data[0];
            
                            $query = "UPDATE user SET password='$newPassword' WHERE id=$id";

                            $result = mysqli_query($this->dataBase() , $query );
            
                            if($result){
            
                                return header('Location: /../../game_alpha/pages/personalPage.php');
                                
                            }else{
            
                                return die('Query faild!' . mysqli_error($this->dataBase()) );
                            }
            
                        }else{
            
                            return  "<h1> Login failed. Invalid username or password.</h1>";  
            
                        }
            
                    }else{
            
                        return die('Query faild!' . mysqli_error($this->dataBase()) );
            
                    }

                    
                

                } else{

                    return $this->check_connection();

                }

            }
        }
    }


    public function emailUpdate(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST["email"]) && empty($_POST["newEmail"])){

                return 'write something'; 

            }else{

                $email = $_POST["email"];
            
                $email = mysqli_real_escape_string($this->dataBase() ,  $email);

                $newEmail = mysqli_real_escape_string($this->dataBase() , $_POST["newEmail"]);
            
                

                
                if($this->check_connection()){
                    
                    $query = "SELECT id FROM user where email='$email'" ;
                    
                    $result = mysqli_query( $this->dataBase() , $query );

                    $count = mysqli_num_rows($result);  
            
                    if($result){
                        
                        if($count == 1){
            
                            echo 'good';
            
                            $data = mysqli_fetch_row($result);
                            $id = $data[0];
            
                            $query = "UPDATE user SET email='$newEmail' WHERE id=$id";

                            $result = mysqli_query($this->dataBase() , $query );
            
                            if($result){
            
                                return header('Location: /../../game_alpha/pages/personalPage.php');

                            }else{
            
                                return die('Query faild!' . mysqli_error($this->dataBase()) );
                            }
            
                        }else{
            
                            return  "<h1> Login failed. Invalid username or password.</h1>";  
            
                        }
            
                    }else{
            
                        return die('Query faild!' . mysqli_error($this->dataBase()) );
            
                    }

                    
                

                } else{

                    return $this->check_connection();

                }

            }
        }
    }
}





?>