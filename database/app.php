<?php
session_start();

class App {

    protected static $userName;
    protected static $passWord;
    protected static $email;

   
     
    public  function dataBase(){

        return  mysqli_connect('localhost' , 'root' , 'mysql' , 'games');
    } 

    public function connecting(){

        if($this->dataBase()){
            return true;

        }else{
            return die("Database connection failed");
        }

    }
     

    public function login(){

        if($_SERVER["REQUEST_METHOD"] == "POST" ){


            if(!empty($_POST["username"]) && !empty($_POST["password"])){
            
                $userName = $_POST["username"];
                $this->passWord = $_POST["password"];
                 
                $username = mysqli_real_escape_string($this->dataBase() , $userName);  
                $password = mysqli_real_escape_string($this->dataBase() ,   $this->passWord);   

                if($this->connecting()){
                    
                    $query = "SELECT * FROM user where username='$username' AND password='$password'" ;
                    $result = mysqli_query( $this->dataBase() , $query );
                    $count = mysqli_num_rows($result);  

                    if($result){
                        
                        $id = mysqli_fetch_assoc($result);
                        $id = $id["id"];
        

                        if($count == 1){

                            $_SESSION["user_name"] = $username;  
                            $_SESSION["login"] = TRUE ;
                             

                            return header('Location: /../../game_alpha/pages/personalPage.php');

                             


                        }else{

                            return  "<h1> Login failed. Invalid username or password.</h1>";  

                        }


                    }else{

                        $_SESSION["login"] = FALSE ;
                        return die('Query faild!' . mysqli_error($this->dataBase()) );
                        

                    }
                }
            }
        }
    }
    
    public function personal_nav(){

        if(isset($_SESSION['user_name'])){
            return "<h2><a href='/../../game_alpha/pages/personalPage.php'>Personal page</a></h2";
        }
    }
    

    public function logout($logout){

        if($logout == "true"){
            unset($_SESSION['user_name'] , $_SESSION["login"]);
            session_destroy();

            return header('Location: /../../game_alpha/index.php');
        }
    }

    
    public function signUp(){

        if($_SERVER["REQUEST_METHOD"] == "POST" ){

            if(empty("username") && empty("password") ){
                return "write something";

            }else{

                self::$userName = $_POST["username"];
                $passWord = $_POST["password"];
                $email =  $_POST["email"];


                $userName = mysqli_escape_string($this->dataBase() ,self::$userName);
                $passWord = mysqli_escape_string($this->dataBase() , $passWord);
                $email = mysqli_escape_string($this->dataBase() , $email );



                if($this->connecting()){

                    $query = "SELECT * FROM user where username='$userName' AND email='$email'" ;

                    $result = mysqli_query( $this->dataBase() , $query );

                    $count = mysqli_num_rows($result);  

                    if($result){
                        
                        $id = mysqli_fetch_assoc($result);
                        $id = $id["id"];
                        
                        
                        if($count == 1 ){

                        echo "This informations already exist";
                        

                        }else{

                            $query = "INSERT INTO user(username , password , email) VALUES ('$userName' , '$passWord' , '$email')";

                            $result = mysqli_query($this->dataBase() ,    $query );

                            
                            $_SESSION["user_name"] = self::$userName; 
                            
                            if($result){

                                
                               return header('Location: /../../game_alpha/pages/personalPage.php');
                            }else{
 
                              return die('Query faild' .  mysqli_error($this->dataBase()));
                            }        

                        }

                
                    }else{
                        return die('Query faild' .  mysqli_error($this->dataBase()));
                    }
                }   
            }
        }
    }


    


}











?>