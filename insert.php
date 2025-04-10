<?php
require "../../includes/db.inc.admin.php";
if(isset($_POST["name"], $_POST["username"]))
{

$datetime = date('Y-m-d H:i');
$pwd = $_POST["password"];
$hashedPwd =  password_hash($pwd, PASSWORD_DEFAULT);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);

$user_check_query = "SELECT * FROM members WHERE username='$username' LIMIT 1";
 $result = mysqli_query($conn, $user_check_query);
 $user = mysqli_fetch_assoc($result);

 if ($user) { // if user exists
   if ($user['username'] === $username) {
          echo 'Username already exists';
   }
 }
 else {
   $sql = "INSERT INTO members(name, username, password, town, email, phone, funkcia, createDate) VALUES('".$name."', '".$username."', '".$hashedPwd."', '".$_POST["town"]."', '".$_POST["email"]."', '".$_POST["phone"]."', '".$_POST["funkcia"]."', '".$datetime."')";
   if(mysqli_query($conn, $sql))
   {
        echo 'Data Inserted';
   }
 }

}
 ?>
