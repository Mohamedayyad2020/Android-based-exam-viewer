<?php
session_start();
require("database.php");

 //exams/index.php?page=home&action=index&type=json
 //exams/index.php?page=exam&action=get&type=json&sesid=123&
//$mysql_host = 'localhost';
// MySQL username
//$mysql_username = 'root';
// MySQL password
//$mysql_password = '';
//$mysql_database = 'exams';
$con=getconnect();//mysqli_connect($mysql_host, $mysql_username, $mysql_password);
if (mysqli_select_db($con,DB_NAME)) {


$requestType = "html";//json
if(isset($_GET['type'])) $requestType = $_GET['type'];



require("security/user.php");


if ($requestType =="json"){
	include("json.php");
}else{
	if(isset($_POST['username']) && isset($_POST['password'])){
		$result = login($_POST['username'],$_POST['password']);
		if($result[0]==0) echo $result[1];
		else header("location: index.php");
	}
	//html pages
	$page="home";
	$action="none";
		
	if(logedin()){
		//if teacher
		header("location: exams/index.php");
		//if admin
		//redirectt to users
		//if student 
		//redirect to results
/*
		require("views/header.php");
		require("views/menu.php");
		if(isset($_POST['page']))
				$page = $_POST['page'];
		if(isset($_POST['action']))
			$action = $_POST['action'];
		if($page == "student"){
			include("controllers/student.php");
		}else if($page == "admin"){
			include("controllers/student.php");
		}else if($page == "professor"){
			include("controllers/student.php");
		}else if($page == "users"){
			include("controllers/student.php");
		}else{
			include("views/dashboard.php");
		}
		require("views/footer.php");
		*/
	}else{
		require("views/header.php");
		require('security/login.php');
		require("views/footer.php");
	}
	
}}else{
require_once("sql.php");
session_start();
$requestType = "html";//json
if(isset($_GET['type'])) $requestType = $_GET['type'];


require("database.php");

require("security/user.php");


if ($requestType =="json"){
	include("json.php");
}else{
	if(isset($_POST['username']) && isset($_POST['password'])){
		$result = login($_POST['username'],$_POST['password']);
		if($result[0]==0) echo $result[1];
		else header("location: index.php");
	}
	//html pages
	$page="home";
	$action="none";
		
	if(logedin()){
		//if teacher
		header("location: exams/index.php");
		//if admin
		//redirectt to users
		//if student 
		//redirect to results
/*
		require("views/header.php");
		require("views/menu.php");
		if(isset($_POST['page']))
				$page = $_POST['page'];
		if(isset($_POST['action']))
			$action = $_POST['action'];
		if($page == "student"){
			include("controllers/student.php");
		}else if($page == "admin"){
			include("controllers/student.php");
		}else if($page == "professor"){
			include("controllers/student.php");
		}else if($page == "users"){
			include("controllers/student.php");
		}else{
			include("views/dashboard.php");
		}
		require("views/footer.php");
		*/
	}else{
		require("views/header.php");
		require('security/login.php');
		require("views/footer.php");
	}
	
}}
?>