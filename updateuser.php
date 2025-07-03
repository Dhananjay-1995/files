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
<title>update_user</title>
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
<head><h1 align="center" style= "font-family: Times New Roman;color: black; font-size: 30px;">USER DATA UPDATE<h1></head>
<?php include('../dbcon.php');
$sid= $_GET['sid'];
$sql="SELECT * FROM `user` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);

$data=mysqli_fetch_assoc($run);

?>
<body>
<br>
<form action="changedata.php" method="post">
<table align="center">
<tr align="left" style="color: white">
<th>Change Username:</th>
<td><input type="text" name="user" required value=<?php echo $data['username'];?> / ></td>
</tr>
<tr align="left" style="color: white">
<th>Change Password:</th>
<td><input type="text" name="passcode" required value=<?php echo $data['password'];?> / ></td>
</tr>
<tr>
<td colspan=2 align="center">
<br>
<input <input type="hidden" name="sid" value="<?php echo $data['id'];?>" />
<input <input type="submit" name="change" value="Change" ></td>
</tr>
</table>
</form>
<br>
<br>
<br><br>
<br><br><br><br>
<footer class="footer">
		<center>
			<h5 style="font-family:=Courier New;font-size: 16px;float:center;color: black;">&copy; Dhananjay Chauhan (2025) </h5>
		</center>
	</footer>
</body>
</html>