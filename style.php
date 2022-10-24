<style> 

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body{

    background-color: #f1f1f1;
    position: relative;
    padding-bottom: 90px;
    min-height: 100vh;
}


 
article{
  
    
    padding: 30px 20px;
    
}


footer{

    box-shadow: 2px 2px 5px black;
    padding: 20px;
    background-color: purple;
    color: white;
    position: absolute;
    text-align: center;
    bottom: 0;
    width: 100%;
     


}



/* Header style */

header {

    width: 100%;
    height: 9vw;
    background-color: purple;
    box-shadow: 2px 2px 5px black;
    
 }



.headerTitle{

    display: inline-block;
    height: 100%;
    color: white;
    text-decoration: none;
    font-size: 4vw;
    font-weight: bold;
    font-style: italic;
    width: 25%;
    margin-top: 1vw;
    margin-left: 2vw;
     
    
}


header nav{
    display: inline-block;
    width: 60%;
    height: 100%;
    margin: 0px;
    margin-left: 3vw;
    padding-top: 3.5vw;
    padding-bottom: 4vw;
}

a{

    text-decoration: none;
}

nav a{
    color: white;
    margin:   1vw;
    height: 2vw;
    
    
}

nav ul li {
    display: inline;
    padding: 1vw;
}



.headerNav   {
    display: inline-block;
    color: white;
    text-decoration: none;
    font-size: 1.5vw;
}


 

 

nav li:hover {
    background-color: #AF0891 ;
    border-radius: 10px 10px;
}
    

nav ul li {
    position: relative;
    display: inline-block;
}

 
 




/* Filter style (Home page) */
 
.filter{

    margin-top: 7vw;
    margin-bottom: 90px;
    width: 100%;

}


.filterform{
    background-color: white;
    width: 80%;
    height: 15vh;
    margin-left: auto;
    margin-right: auto;
    border: 0.5vw solid purple;
    border-radius: 100px 100px;

}

.filterContent{
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    padding-top: 3.4vh;
    padding-left: 10%;
    padding-right: 10%;
   
}


.filterSelect{

    float: left;
    width: 60%;
    height: 6vh;
    font-size: 3vh;
    line-height: 100%;
    padding: 0% 0px 0% 2%;
    text-align: left;
     
    border: 1px solid purple;
    border-radius: 40px 40px;
    margin-right: auto;
     
    
    
  
    
}

.filterButtons{
    float: left;
    width: 18%;
    height:  6vh;
    border: 1px solid purple;
    border-radius: 40px 40px;
     
    margin-left: 2%;
    background-color: white;
    font-size: 3vh;
    
}

.filterButtons:hover{
    background-color: purple;
    color: white;
}


/* Login style */


.loginbox{
    display: block;
    width: 25%;
    height: 45vh;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5vw;
    margin-bottom: 5vw;
    border: 0.5vw solid purple ;
    border-radius: 20px 20px;
    background-color: white;
    padding: 1vw;
    box-shadow: 2px 2px 5px black;

}


.loginInputText{
    
    display: block;
    float: left;
    width: 100%;
    height: 7vh;

    padding-left: 1vw;
    font-size: 1.4vw;

    border-radius: 20px 20px;
    border: 0.2vw solid purple;
    margin-top: 5vh;
    

}

.loginButton{
    display: block;
    float: left;
    width: 80%;
    height: 7vh;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 5vh;
    margin-right: 0vw;
    margin-left: 2.2vw;
 
    
}

.loginButton:hover{
    background-color: purple;
    color: white;
}
 


/* SIgn up styling */
 
.signUpBox{
    display: block;
    width: 30%;
    height: 55vh;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5vw;
    margin-bottom: 5vw;
    border: 0.5vw solid purple ;
    border-radius: 20px 20px;
    background-color: white;
    padding: 1vw;
    box-shadow: 2px 2px 5px black;

}

.SignUpInputText{
    
    display: block;
    float: left;
    width: 100%;
    height: 7vh;

    padding-left: 1vw;
    font-size: 1.8vw;
    

    border-radius: 20px 20px;
    border: 0.2vw solid purple;
    margin-top: 5vh;
    

}

.signUpButton{
    display: block;
    float: left;
   
    width: 70%;
    height: 7vh;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 5vh;
    margin-right: 0vw;
    margin-left: 3.8vw;

  
    
 
    
}

.signUpButton:hover{
    background-color: purple;
    color: white;
}
 

/* Update user info page style */

.anchorBox{

    display: block;
    width: 60%;
    height: 25vh;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5vw;
    margin-bottom: 5vw;
   
    border-radius: 40px 40px;
    background-color: white;
    padding: 0vw;
    box-shadow: 2px 2px 5px black;

}

.pageButtons  {
    float: left;
    width: 40%;
    height:  10vh;
    border: 1px solid purple;
    border-radius: 40px 40px;
     

    margin-top: 7vh;
    margin-left: 4vw;
    background-color: purple;
    color: white;
    font-size: 3vh;
    text-align: center;
    padding-top: 3vh;
    
    
    
}

 

 
.pageButtons:hover{
    background-color: #AF0891 ;
     
}


/* personal page style */


.personalPageHeader{
    display: block;
    width: 70vw;
    height: 20vw;
    margin-right: auto;
    margin-left: auto;
    margin-top: 15vh;
    margin-bottom: 15vh;
    text-align: center;
    background-color: white;
    border: 1px solid purple;
    border-radius: 40px 40px;
    box-shadow: 2px 2px 2px black;
    padding-top: 2vw;
}

.personalPageHeaderH1{
    font-size: 4vw;
    color: purple;
    margin-bottom: 1vw;
}

.personalPageHeaderP{
    font-size: 2vw;
     
 }

.personalPageHeaderButton{

     
    width: 30%;
    height:  5vw;
    border: 1px solid purple;
    border-radius: 40px 40px;
     

    margin-top: 3vw;
    background-color: purple;
    color: white;
    font-size: 2vw;
    text-align: center;
   
    
    
    
}

 

 
.personalPageHeaderButton:hover{
    background-color: #AF0891 ;
     
}

</style>

 

