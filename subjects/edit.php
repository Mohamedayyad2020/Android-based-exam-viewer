<?php
session_start();
require("../database.php");
require("../security/user.php");
require("../header.php");
require("../menu.php");

//add subject
//1-php mysql insert
//2-html form

/*
steps to create this page
1-crate html form
2-get the data from the form and print it on the page 
3-validate data 
4-insert the data into database
5-return success or failure message
*/
//GET requests are used in search form 
//post are used in insert or secured data forms 
$code = "";
$name = "";
$year = "";
if(isset($_POST['code']))
	$code =$_POST['code'];
if(isset($_POST['name']))
	$name = $_POST['name'];
if(isset($_POST['year']))
	$year = $_POST['year'];

if($code != "" && $name != "" && $year !=""){
	// Create connection
	$conn = getconnect();

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . mysqli_connect_error());
	} 

	$sql = "INSERT INTO `subjects` (`code`, `name`, `year`)
	 VALUES ('$code', '$name', '$year')";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}
?>
<a href="subject/index.php">back to list</a><br>

<form action="add.php" method="POST">
	<input type="text" name="code" placeholder="code" value="<?php echo $code ?>">
	<br>
	<input type="text" name="name" placeholder="name" value="<?php echo $name ?>">
	<br>
	<input type="text" name="year" placeholder="year" value="<?php echo $year ?>">
	<br>
<input type="submit" value="Add">
</form>
<?php
require("../footer.php");
?>