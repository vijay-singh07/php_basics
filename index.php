<?php
include("connection.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $un = mysqli_real_escape_string($db,$_POST['Username']);
      $ps = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT * from first_table WHERE Username = '$un' and Password = '$ps'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $un and $ps, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $un;
         
         header("location: home.html");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>



<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<div id="main">
		<h1>SIMPLE LOGIN</h1>
		<form method="POST">
			Username<input type="text" name="Username" class="text" autocomplete="off" required>
			Password<input type="Password" name="Password" class="text" required>
			<input type="Submit" name="Submit" id="Sub">
</body>
</html>