<?php
session_start();
if(isset($_SESSION['uid'])){
	echo "";
}
else{
	header('location:../login.php');
}
?>
<html>
<title>add_user</title>
<link rel="icon" href="favicon.png" type="image/png">
<style>
    body {
    background-image: url("car-charger-electric-vehicle-charging-station_107420-94928.jpg");
	margin: 0;
    padding: 0;
	background-position: center;
	background-repeat: no-repeat;
	background-size:100%;
	background-size: cover;
    background-attachment: fixed; /* Makes it static */
	
}


</style>
<h3><a href="admindash.php" style="float:left;color: white; margin-right:0; text-decoration: underline;">Back to Dashboard</a></h3>
<h3><a href="logout.php" style="float:right;color: white; margin-right:0; text-decoration: underline;">Logout</a></h3></br>
<br>
<br>
<br>
<head><h1 align="center" style= "font-family: Times New Roman;color: black; font-size: 30px;">ADD USER DATA<h1></head>
<body>
<form  action="adduser.php" method="post">
<table align="center" width="30%" border="1" style="margin-top:10px;">
<tr><h1><td colspan="2" align="center" style="font-family: Helvetica;color: black;"><b>Add User:</b></td></h1></tr>
<tr>
<td align="left"style="color: white">New User ID:</td>
<td align="left"><input type="user" name="user" required ></td>
</td>
</tr>
<tr>
<td align="left" style="color: white">New Password:</td>
<td align="left"><input type="text" name="pass1" required ></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" ></td>
</tr>

</table>
</form>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer">
		<center>
			<h5 style="font-family:=Courier New;font-size: 16px;float:center;color: black;">&copy; Dhananjay Chauhan (2025) </h5>
		</center>
	</footer>
</body>
</html>
<?php

 if(isset($_POST['submit'])){
	$username =$_POST['user'];
	$password =$_POST['pass1'];
	
	  include('../dbcon.php');
	  
	  // Check if user already exists
		$stmt =$con->query("SELECT `username` FROM `user` WHERE `username` = '$username'");
		if($stmt->num_rows > 0){		
		?>
		<script>
		alert('User already exist.');
		window.open('adduser.php','_self')
		</script>
		<?php
		}
		
	$sql="INSERT INTO `user`(`username`, `password`)
			SELECT '$username','$password'
			WHERE NOT EXISTS (SELECT `username` FROM `user` WHERE `username` = '$username');";
	$run=mysqli_query($con,$sql);
	if($run== true){
		?>
		<script>
		alert('Data added successfull.');
		window.open('adduser.php','_self')
		</script>
		<?php
	}
 }
	

?>