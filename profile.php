<?php

$connection = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db( $connection,"login_form");
session_start();

$user_check=$_SESSION['login_user'];
$sql = sprintf("select username from first_table where username='$user_check'", $connection);
	$result=mysqli_query( $connection, $sql );
$row = mysqli_num_rows( $result );
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); 
header('Location: index.php'); 
}
?>