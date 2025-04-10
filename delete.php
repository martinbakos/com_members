<?php
require "../../includes/db.inc.admin.php";
if(isset($_POST["id"]))
{
	$id = $_POST["id"];
 	$sql = "UPDATE members SET disabled ='1' WHERE id='".$id."'";
	if(mysqli_query($conn, $sql))
	{
		echo 'DATA BLOCK';
	}
}
 ?>
