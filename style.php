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


/* update email page style */


.updateEmailBox{
    display: block;
    width: 30%;
    height: 28vw;
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

.updateEmailTextInput{
    
    display: block;
    float: left;
    width: 100%;
    height: 5vw;

    padding-left: 1vw;
    font-size: 1.8vw;
    

    border-radius: 20px 20px;
    border: 0.2vw solid purple;
    margin-top: 2.5vw;
    

}

.updateEmailButton{
    display: block;
    float: left;
   
    width: 60%;
    height: 5vw;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 3vw;
    margin-right: 0vw;
    margin-left: 5vw;

  
    
 
    
}

.updateEmailButton:hover{
    background-color: purple;
    color: white;
}


/* update password page style */


.updatePassBox{
    display: block;
    width: 30%;
    height: 28vw;
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

.updatePassTextInput{
    
    display: block;
    float: left;
    width: 100%;
    height: 5vw;

    padding-left: 1vw;
    font-size: 1.8vw;
    

    border-radius: 20px 20px;
    border: 0.2vw solid purple;
    margin-top: 2.5vw;
    

}

.updatePassButton{
    display: block;
    float: left;
   
    width: 60%;
    height: 5vw;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 3vw;
    margin-right: 0vw;
    margin-left: 5vw;

  
    
 
    
}

.updatePassButton:hover{
    background-color: purple;
    color: white;
}


/* Reserveen page style */

.selectGameBox{
    display: block;
    height: 15vw;
    width: 80%;
    margin-right: auto;
    margin-left: auto;
    background-color: white;
    border: 0.5vw solid purple;
    border-radius: 100px 100px;
    margin-top: 3vw;
    margin-bottom: 9vw;
}


.selectGame{
    display: block;
    height: 3.4vw;
    width: 80%;
    margin-right: auto;
    margin-left: auto;
    border: 1px solid purple;
    border-radius: 20px 20px;
    font-size: 1.2vw;
    padding-left: 1vw;
    margin-top: 3vw;
 }


 .reserverenButton{
    display: block;
   
   
    width: 15vw;
    height: 4vw;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 2vw;
    margin-right: auto;
    margin-left: auto;

  
    
 
    
}

.reserverenButton:hover{
    background-color:  #AF0891;
    border-color:  #AF0891;
    color: white;
}

/* Game details style */

.gameDetailsBox{ 
    display: block;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    background-color: #AF0891;
    color: black;
    border: 2px solid white;
    border-radius: 40px 40px;
    padding: 2vw;
    box-shadow: 2px 2px 5px black;
    
}

.gameDetailsBox h2{
    font-size: 4vw;
    text-align: center;
    margin-bottom: 2vw;
    text-shadow: 2px 2px 5px black;
    color: white;
}


.divImageDescription{

    display:   inline-block;
    width: 100%;
    height: 50%;
    margin-bottom: 3vw;
    

}
.gameDetailsImage {
    float: left;
    display: inline block;
    width: 20%;
    height: 90%;
}

.imageGame {
    height: auto;
    width: 80%;
}
.gameDetailsDescription{
    float: left;
    display: inline block;
    width: 80%;
    margin-top: 2vw;
    font-size: 1.3vw;
    height: 90%;
    background-color: white;
    border: #AF0891 solid 1px;
    border-radius: 20px 20px;
    padding: 1vw;
    box-shadow: 2px 2px 5px black;

}

.gameRulesYoutube{
    width: 100%;
    display: inline-block;
    height: 50%;
}

.youtubeBox{

    float: left;
    width: 70%;
    
 }

.youtubeFrame{
    height: auto;
    width: 80%;

 }
 
.gameDetailsRules{
    float: left;
    width: 30%;
    margin-top: 1vw;
    background-color: white;
    border: #AF0891 solid 1px;
    border-radius: 20px 20px;
    padding: 1vw;
    box-shadow: 2px 2px 5px black;
    font-size: 1.3vw;
 }


 /* Game details reservern forms style */


.reservernFormsBox{
    display: block;
    width: 90%;
    margin-top: 10vw;
    margin-left: auto;
    margin-right: auto;
    background-color: #AF0891;
    color: black;
    border: 2px solid white;
    border-radius: 40px 40px;
    padding: 2vw;
    box-shadow: 2px 2px 5px black;
}


.reservernFormsBox h1{
    font-size: 4vw;
    text-align: center;
    margin-bottom: 2vw;
    text-shadow: 2px 2px 4px black;
    color: white;
}


.inputBox{
    display: block;
    width: 60%;
    height: 28vw;
    margin-left: auto;
    margin-right: auto;
    margin-top: 2vw;
    margin-bottom: 2vw;
     
}

.inputStyle{
    display: block;
    background-color: white;
    width: 60%;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1vw;
    border: 0.2vw solid purple;
    border-radius: 100px 100px;
    box-shadow: 1px 1px 3px black;
    padding: 1vw;

}

.inputStyle input{
    border: 0.1vw solid purple;
    border-radius: 100px 100px;
    width: 60%;
    padding: 1vw;
    font-size: 1.3vw;

}

.inputStyle label{
    font-size: 1.5vw;
}

.reserveButton{
    display: block;
   
   
    width: 20%;
    height: 5vw;
    border: 0.2vw solid purple;
    border-radius: 40px 40px;
     
     
    background-color: white;
    font-size: 1.5vw;

    margin-top: 3vw;
    margin-right: auto;
    margin-left: auto;
    box-shadow: 1px 1px 2px black;
    color: purple;
  
    
 
    
}

.reserveButton:hover{
    background-color: #AF0891 ;
    color: white;
    border: 0.2vw solid  #AF0891;
}

/* game details informatie over het plan */


.planInfoBox{
    display: inline-block;
    width: 90%;
    margin-top: 10vw;
    margin-left: 5vw;
    margin-right: auto;
    background-color: white;
    color: black;
    border: 2px solid white;
    border-radius: 40px 40px;
    padding: 2vw;
    box-shadow: 2px 2px 5px black;
    font-size: 1.2vw;
    

}

.planInfoBox h1{
    color: #AF0891;
    font-size: 3vw;
    text-align: center;
    text-shadow: 1px 1px 1px black;
}

.planInfo {

    padding: 1vw;

}

.planInfo h2 {
    color: #AF0891;
}


.zelfToevogenButton {

    display: inline-block;
  
    width: 100%;
    margin-left: 28vw;
    margin-right: auto;
    
}


.zelfToevogenButton input{
    float: left;
    width: 30%;
   
   
    text-align: center;
    color: white;
    background-color: purple;
    font-size: 2vw;
   
    border: 1px solid purple;
    border-radius: 10px 10px;
     
    padding: 1vw;
}


.zelfToevogenButton input:hover{
    background-color: #AF0891 ;


}
/* plannen tonen in index pagina style */


.plansBox{
    display: inline-block;
    width: 80%;
     
    margin-left: 10vw;
    margin-right: auto;

    margin-bottom: 2vw;

    border: 2px solid purple;
    background-color:  #AF0891 ;
    padding: 1vw;

    border-radius: 2vw;

}

.plansBox h1{
    color: white;
    font-size: 3vw;
    text-align: center;
    text-shadow: 2px 2px 4px black;
    margin-bottom: 5vw;
}

.plansBox h1 a{
    color: white;
    
}
.plansBox h1 a:hover{
    color: #F707CC ;
}

.plansBoxImage{

   
    float: left;
    padding: 1vw;
    width: 20%;
    height: auto;
    margin-bottom: 2vw;

    

}

.plansBox p {
    float: left;
    width: 35%;
    margin: 4vw 2vw 2vw 2vw;
    background-color: white;
    border: #AF0891 solid 1px;
    border-radius: 20px 20px;
    padding: 1vw;
    box-shadow: 2px 2px 5px black;
    font-size: 1.3vw;
}
 
.playersTabel{
    
    float: left;
    width: 30%;
    
    margin: 4vw 2vw 2vw 2vw;
    background-color: white;
    border: #AF0891 solid 1px;
    border-radius: 20px 20px;
    padding: 1vw; 
    box-shadow: 2px 2px 5px black;
    font-size: 1.3vw;
}


.playersTabel h2{

    padding-bottom: 1vw;
    border-bottom: 2px solid purple;
    font-size: 2.5vw;
    color: purple;
    text-align: center;

}

/* Plannen Bwerken style */

.adminButtonsBox{

    display: block;
    width: 90%;
    height: 3vw;
    padding: 1vw;
    margin-left: auto;
    margin-right: auto;
   

}

.adminButtonUpdate{
    float: left;
    width: 40%;
    height: 2vw;
    text-align: center;
    color: white;
    background-color: purple;
    font-size: 1.2vw;
    padding-top: 0.3vw;
    border: 1px solid purple;
    border-radius: 10px 10px;
    
}


.adminButtonDelete{
    float: left;
    width: 40%;
    height: 2vw;
    text-align: center;
    color: white;
    background-color: purple;
    border: 0px;
    font-size: 1.2vw;
    margin-left: 1vw;
    border: 1px solid purple;
    border-radius: 10px 10px;
}

.adminButtonUpdate:hover , .adminButtonDelete:hover{

    background-color: #CA0CA8 ;
     
}
 

.adminPlanBox{
    float: left;
    width: 32%;
    
    margin: 4vw 2vw 2vw 2vw;
    background-color: white;
    border: #AF0891 solid 1px;
    border-radius: 20px 20px;
    padding: 1vw; 
    box-shadow: 2px 2px 5px black;
    font-size: 1.3vw;
}


.adminPlanBox h2{

    margin-top: 1vw;
    margin-bottom: 2vw;
    text-align: center;
    color: purple;
    padding-bottom: 1vw;
    border-bottom: 2px solid purple;
    font-size: 2.5vw;

}


.adminPlanBox a , .adminPlanBox input  {
     
    display: block;
    float: left;
    width: 100%;
    height: 2vw;
    text-align: center;
    color: white;
    background-color: purple;
    font-size: 1.2vw;
    padding-top: 0.3vw;
    border: 1px solid purple;
    border-radius: 10px 10px;
    margin-bottom: 1vw;
}

.adminPlanBox a:hover , .adminPlanBox input:hover  {

    background-color: #CA0CA8 ;
    
}

/* Toegvoegd planen style */


.deletBox {

    display: inline-block;

    width: 100%;
    
}


.deletBox input{
    float: left;
    width: 30%;


    margin-left: 26vw;
    margin-right: auto;


    text-align: center;
    color: white;
    background-color: purple;
    font-size: 2vw;

    border: 1px solid purple;
    border-radius: 10px 10px;
    
    padding: 1vw;
}


.deletBox input:hover{
    background-color: #CA0CA8 ;


}

</style>

 

