<?php 
//require ('./database.php');
function logedin(){
	if(isset($_SESSION["username"])){
		return true;
	}else return false;
}
function login($user,$pass){
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
	$db_selected = mysqli_select_db($connection, DB_NAME);
	if (!$db_selected) {
	  die('Can\'t use ' . DB_NAME . ' : ' . mysqli_connect_error());
	}

	$error='';
	if (empty($user) || empty($pass)) {
		$error = "Username and password Can't be empty";
		return array(0,$error);
	} else {
		$username = stripslashes($user);
		$password = md5(stripslashes($pass));
		$sql = "SELECT * FROM `users` WHERE password='$password' AND email='$username'";
		$result = mysqli_query($connection, $sql);
		$rown = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if ($rown == 1) {
		  $_SESSION['username'] = $username;
		  $_SESSION['role'] = $row['role'];
		  $_SESSION['fname'] = $row['fname'];
		  $_SESSION['lname'] = $row['lname'];
		  return array(1,$error);
		} else {
		  $error = "Username or Password is invalid";
		  return array(0,$error);
		}
	}
}
function logout(){}
function register($user,$pass,$conf,$first,$last,$nid,$tel){}

//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$home =  $_SERVER['REQUEST_URI']=="/" || $_SERVER['REQUEST_URI']=="/index.php";
$type = "html";
if(isset($_GET['type']))
	$type = "json";
if(!logedin() && !$home && $type!= "json"){
 header("location: http://$_SERVER[HTTP_HOST]/index.php");
}
?>