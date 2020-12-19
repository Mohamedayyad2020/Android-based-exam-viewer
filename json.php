 <?php

 //html pages
  $page="exam";
  $action="get";
  $session ="";
  if(isset($_POST['page']))
    $page = $_POST['page'];
  if(isset($_POST['action']))
    $action = $_POST['action'];
 if(isset($_POST['sessionid'])){
    $session = $_POST['sessionid'];
    session_id($session);
  }//4400bc08286d8c77065cc1511c6aebab
 session_start();

require("./database.php");
require("./security/user.php");
function getResult($w = 15,$c =5,$t = 20){
      $res  = array('correct' => $c,'wrong' => $w, 'final' => "$c/$t" );
      print_r( json_encode(array(1,"result"=>$res)));  
}
  //check if the current user is logged in
  if(logedin()){   
   $session =session_id();
    if($action=="answer"){
      $q = $_POST['answers'];
      //process answers
      //insert answer result into results
      //get result of this exam for that student
      //No of correct answers ,No of wrong answers,final result
      getResult(15,5,20);

    }else if($action=="result"){
       getResult(15,5,20);
    }else if($action=="questions"){
      $questions = array();
      $q = array();
      // Create connection
      $conn = getconnect();

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . mysqli_connect_error());
      } 
      $sql = "SELECT * FROM `questions` LIMIT 0,20";//0..9

      if ($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_array($result)){
          $questions[] = $row;
          //echo "<td>$row[code]</td><td>$row[name]</td><td>$row[year]</td>";
        }
        $t = 20;//time in minutes
        print_r( json_encode(array(1,"error"=>"",'examtime'=>$t,"questions"=>$questions))); 
      } else {
           print_r( json_encode(array(0,"error"=>"Error: ". $sql. mysqli_error($conn))));
      }    

    }else
        print_r( json_encode(array(1,"error"=>"","sessionid"=>$session,"username"=>$_SESSION['username']))); 
  }else{
    if($action=="login"){
      //login
      $email ="";
      $password = "";
      if(isset($_POST['email']) && isset($_POST['password'])){
        $result = login($_POST['email'],$_POST['password']);
        $session =session_id();
        if($result[0]==1) 
           print_r( json_encode(array(1,"error"=>"","sessionid"=>$session,"username"=> $_SESSION['fname']))); 
        else
          print_r( json_encode(array(0,"error"=>"Incorrect Username or Password."))); 
      }else
          print_r( json_encode(array(0,"error"=>"Incorrect Username or Password.")));      
    }else if($action=="forget_password"){
      //forget_password(email){

        if(true)//forget_password(email)
           print_r( json_encode(array(1,"error"=>"check your  email inbox to get your  pssword")));  
        else if(false)
           print_r( json_encode(array(0,"error"=>"Incorrect Username or Password.")));  

    }else
      print_r( json_encode(array(0,"error"=>"Please login first."))); 
  }
/*
1-login 

login(email,password){

if(failed) 
   return (0,error message);

else if(success)
    return(1,user name);
}

============================================================
2-forget password

forget_password(email){

if(failed)
   return(error message);

else if(success)
     return(message:check your  email inbox to get your  pssword);
}

============================================================
3-questions

questions()

{

  return(array{question,answer1,answer2,answer3,answer4,answer5})
}

=======================================================
4-answers

answers(array of answers ID){

return(message: data sent successfuly);

}

==============================================================
5-result

result()
{
 return(array{No of correct answers ,No of wrong answers,final result);
}

===============================================================
*/

 /*
    // Get Post Data
 if(!isset($_POST["name"]))
     $_POST['name'] = "dsfsd";
 //data
    $data = urldecode($_POST['name']);
       
    $jsonData      = array();
    $jsonTempData  = array();
      
     for($i=1;$i<4; $i++)
       {

          $jsonTempData = array();
          $jsonTempData['name']         = $data.$i;
          $jsonTempData['number']       = $data.$i;
          $jsonTempData['date_added']   = $data.$i;
           
          $jsonData[] = $jsonTempData;
       }
       foreach ($_POST as $key => $value) { 
        $jsonTempData = array();
          $jsonTempData['name']         = $key." ".$value;
          $jsonTempData['number']       = $key." ".$value;
          $jsonTempData['date_added']   = $key." ".$value;
       $jsonData[] = $jsonTempData;
       }
      
     
     $outputArr = array();
     $outputArr['Android'] = $jsonData;
      
     // Encode Array To JSON Data
     print_r( json_encode($outputArr));
     */
?>