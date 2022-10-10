<?php



require 'C:\Program Files\ammps2\Ampps\www\meesterproef\classes\plansInsert.class.php';


class PlansView extends PlansInsert {

   #This fuctions will display the game plans for users

    public function show_plans($results , $type_user , $type_display ){


            if($results){
                
                $game =  mysqli_fetch_assoc($results);
                $start_time = $game['startTime'];
                $name_of_the_game = $game['name'];
                $name_of_the_orgnaiser = $game['makerName'];

                $id =  $game['id'];
 


                $query_image_time = "SELECT image , play_minutes , explain_minutes  FROM games WHERE name='$name_of_the_game' ";

                $result_image_time = mysqli_query($this->dataBase() , $query_image_time );

                if($result_image_time){

                    $image_time =  mysqli_fetch_assoc($result_image_time);
                    $image = $image_time['image'];
                    $time = $image_time['play_minutes'] + $image_time['explain_minutes'];

                }
                
              

                $html_code = " ";

                $html_code .= "<br> <h2> Start time : $start_time   </h2> <br> ";

                if($type_display == "read_plans"){

                    $html_code .= "<a href='/../../meesterproef/pages/detailsPage.php?game=$name_of_the_game&id=$id'> <img  src='/../../meesterproef/afbeeldingen/$image'   alt='$name_of_the_game'>  </a>  ";
                    $html_code .= "<br>  <p> Game : <a href='/../../meesterproef/pages/detailsPage.php?game=$name_of_the_game&id=$id'> $name_of_the_game  </a>  <br> ";  
                }

                $html_code .= "<p> The orgnaiser :$name_of_the_orgnaiser    <br> " ;
                $html_code .= "Time :  $time   <br> " ;
                $html_code .= "Players :  ";


              
                
                $results = $this->select_players($id);

                while($row = mysqli_fetch_assoc($results)){
                    $name =  $row['name'];
                    $html_code .= " <br>  $name ";
                }
 
                
              

                $html_code .= "</p>  ";
                
                $update_delete = new PlansControl();


                if($type_user == "admin"){  

                    
                    $html_code .= $update_delete->plans_update_delete($id);
                     
                    
                }
                

                return  $html_code;
            
            }else{

                return die('Query failed!' . mysqli_error($this->dataBase()));

            }

    }

    public function readplans($user , $type)
    {   

        if($this->check_connection()){

            
           

            if($user == "personal"){

                if(isset($_SESSION["user_name"])){
                    
                    $username = $_SESSION["user_name"];

                    $query = "SELECT id FROM planning";
                

                    $results = mysqli_query($this->dataBase() , $query );

                    $plans_list = [];
                
                    while($row = mysqli_fetch_assoc($results)){

                        $id = $row['id'];

                        if($results){

                            $query_2 = "SELECT * FROM planning WHERE id='$id'";
                            
                            $results_2 = mysqli_query($this->dataBase() , $query_2 );

                            $row_name = mysqli_fetch_assoc($results_2);

                            $username_row = $row_name['userID'];
                            $user_id = $this->select_user_id();

                            if( $results_2){

                                if($username_row == $user_id){

                                    $query_3 = "SELECT * FROM planning WHERE id='$id' AND userID='$user_id'";

                                    $results_3 = mysqli_query($this->dataBase() , $query_3 );
            
                                    if($results_3){
            
                                        array_push($plans_list , $this->show_plans( $results_3 , $type  , "read_plans" ));
            
                                    }else{
            
                                        return die('Query failed!' . mysqli_error($this->dataBase()));
                                    }

                                }
                            
                            }else{

                                return  die('Query failed!' . mysqli_error($this->dataBase()));
                            } 


                            $id++;

                            
            
                        }



                    }

                    return $plans_list ;
                }
   
            }else{

                $query = "SELECT id FROM planning";
            

                $results = mysqli_query($this->dataBase() , $query );

                $plans_list = [];

                if($results){

                    while($row = mysqli_fetch_assoc($results)){

                        $id = $row['id'];
                        
                        $query_2 = "SELECT * FROM planning WHERE id='$id'";
                        $results_2 = mysqli_query($this->dataBase() , $query_2 );
            
                        if($results_2){
                            array_push($plans_list , $this->show_plans($results_2 ,  $id , "read_plans"));
                        }else{

                            return  die('Query failed!' . mysqli_error($this->dataBase()));

                        }
                       

                        $id++;
 
                    }
                    
                    return  $plans_list; 
        

                }else{

                    return  die('Query failed!' . mysqli_error($this->dataBase()));
                } 

            }

        }else{

            return $this->check_connection();
        }
    }

    

}


?>