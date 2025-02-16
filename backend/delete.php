<?php 
	session_start();
    include("conn.php");
	
	if (!isset($_SESSION["ID"])) {
		header("Location:../frontend/views/login.php");
	}
    


	$ID = $_GET ['ID'];

	$query = "DELETE from staff WHERE Item_Number =".$ID;

	if (!mysqli_query($conn,$query)) {
		echo "Data not deleted!";
	} else {
		header("Location:../frontend/views/admin/dashboard.php");
	}
?>