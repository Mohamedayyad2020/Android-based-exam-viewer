<?php
session_start();
require("../database.php");
require("../security/user.php");
require("../header.php");
require("../menu.php");


	// Create connection
	$conn = getconnect();

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . mysqli_connect_error());
	} 

	$page = 1;
	if(isset($_GET['page'])) $page = $_GET['page'];
	$page = ($page-1)*2;

	$sql = "SELECT COUNT(*) FROM `subjects` ";
	$n = 1;

	if ($result = mysqli_query($conn, $sql)) {
		$ar = mysqli_fetch_array($result);
		if(isset($ar[0]))
			$n = ceil($ar[0]/2);


	}else{ echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

	$sql = "SELECT * FROM `subjects` LIMIT $page,2";//0..9

	if ($result = mysqli_query($conn, $sql)) {
		echo '<table class="table table-bordered table-hover">';
		echo "<tr>";
		echo "<th>code</th><th>name</th><th>year</th><th>EDIT</th><th>DELETE</th>";

		echo "</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>$row[code]</td><td>$row[name]</td><td>$row[year]</td>";
			echo"<td><a href='subjects/edit.php?page=$row[code]'>Edit</a></td>";
            echo"<td><a href='subjects/delete.php?page=$row[code]' onclick='myFunction()'>Delete</a></td>";

			echo "</tr>";
		}
	    echo "</table>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);



for ($i=1; $i <= $n; $i++) { 
	echo '<a href="subjects/index.php?page='.$i.'">'.$i.'.</a>';
}
?>

<br>
<a href="subjects/add.php">Add Subject</a>

<?php
require("../footer.php");
?>