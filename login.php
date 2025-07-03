<?php
session_start();
if(isset($_SESSION['uid'])){
	header('location:adminid/admindash.php');
}
?>

<html>
<title>admin_login</title>
<link rel="icon" href="favicon3.png" type="image/png">
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
<h3><a href="index.php" style="float:left;color: white; margin-right:0; text-decoration: underline;">Back</a></h3>
<br>
<br>
<br>
<head><h1 align="center"style="font-family: Times New Roman;color: black; font-size: 30px;">ADMIN LOGIN<h1></head>

<body>
<h3 align="right">
<form action="login.php" method="post"></br>
</br>
</br>
<table align="center" width="30%" border="1" style="margin-top:10px;">
<tr>
<td style="color: white;">Userid:</td>
<td><input type="text" name="user" required ></td>
</tr>
<tr>
<td style="color: white;">Password:</td>
<td><input type="password" name="pass" required></td>
</tr>
<tr>
<td colspan=2 align="center"><input type="submit" name="login" value="Login" ></td>
</tr>

</table>
</form>
</body><br>
<br>
<br>
<br>
<br>
<br>
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
</html>
<?php
include('dbcon.php');

 if(isset($_POST['login'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$qry ="SELECT * FROM `adminid` WHERE `username`='$username' AND `password`='$password'";
	$run=mysqli_query($con,$qry);
	$row =mysqli_num_rows($run);
	if($row <1){
		?>
		<script>
		alert('Username or Password not match!!');
		window.open('login.php','_self')
		</script>
		<?php
	}
	
	else{
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		
		
		$_SESSION['uid']=$id;
		header('location:adminid/admindash.php');
	}

  }
?>