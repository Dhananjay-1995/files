<?php
session_start();
if(isset($_SESSION['uid'])){
	header('location:indexa.php');
}
?>

<html>
<title>gasorex_login</title>
<link rel="icon" href="favicon.png" type="image/png">
<style>
    body {
    background-image: url("abstract-blur-fuel-gas-station");
	margin: 0;
    padding: 0;
	background-position: center;
	background-repeat: no-repeat;
	background-size:100%;
	background-size: cover;
    background-attachment: fixed; /* Makes it static */
	
}


</style>
<h3 ><a href="login.php" style="float:right;color: black; margin-right:0; text-decoration: underline;">Admin Login</a></h3>
<br>
<head><b><h1 align="center"><img src="Gasorex-logo.png" width="170" height="105" ><h1></b></head>
<head><b><h1 align="center"style="font-family: Times New Roman;color: black; font-size: 30px;" >GASOREX SR ENRGY PVT. LTD.<h1></b></head>
<body>
<form  action="index.php" method="post">
<table align="center" width="30%" border="1" style="margin-top:10px;">
<tr><h1><td colspan="2" align="center" style="font-family: Helvetica;color: black;"><b>User Login:</b></td></h1></tr>
<tr>
<td align="left"style="color: black">User:</td>
<td align="left"><input type="user" name="user" required ></td>
</td>
</tr>
<tr>
<td align="left" style="color: black">Password:</td>
<td align="left"><input type="password" name="pass1" required ></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" ></td>
</tr>

</table>
</form>

</body>
</br>
</br>
<footer class="footer" style="font-family:=Courier New;font-size: 16px;float:center;color: black;">
		<center>
			<h4 >&copy; Dhananjay Chauhan (2025) </h4>
		</center>
	</footer>
</html>
<?php

 if(isset($_POST['submit'])){
	$user =$_POST['user'];
	$passcode =$_POST['pass1'];
	
	   include('dbcon.php');
		$sql="SELECT * FROM `user` WHERE `password`='$passcode' AND `username`='$user'";
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)>0)
		{
			$data=mysqli_fetch_assoc($run);
		    $id=$data['id'];
		
		
		$_SESSION['uid']=$id;
			header('location:indexa.php');
		}
		else
		{
			echo"<script>alert('Invalid Password or Username!');window.open('index.php','_self');</script>";
		}
	
	}
?>