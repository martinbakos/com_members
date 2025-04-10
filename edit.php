<?php
require "../../includes/db.inc.admin.php";
if(isset($_POST["id"]))
{
	$id = $_POST["id"];
	$text = $_POST["text"];
	$column_name = $_POST["column_name"];
	if ($column_name == "password" )
	{
		$pwd = $text;
		$text =  password_hash($pwd, PASSWORD_DEFAULT);
	}
	$sql = "UPDATE members SET ".$column_name."='".$text."' WHERE id='".$id."'";
	if(mysqli_query($conn, $sql))
	{
		echo 'Data Updated';
	}
	else {
			 echo 'Data not Updated';
	}


}
 ?>
