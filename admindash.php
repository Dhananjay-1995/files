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
<title>welcome_admin</title>
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
<h3><a href="logout.php" style="float:right;color: white; margin-right:0; text-decoration: underline;">Logout</a></h3></br>
<br>
<br>
<br>
<head><h1 align="center"style="font-family: Times New Roman;color: black; font-size: 30px;">ADMIN DASHBOARD<h1></head>
<body>
</br>
</br>



<div class="dashboard">
<table align="center" width="40%" border="1" style="margin-top:10px;background-color:#000;color:#fff; font-family:=Courier New;font-size: 15px;">
<tr>
<td align="left" style="color: white">Update Users:</td><td align="center"><button><a href="update.php"style="color: blue;text-decoration: underline;">Update Here</a></button>
</td></tr>
<tr>
<td align="left" style="color: white">Remove Users:</td><td align="center"><button><a href="deluser.php"style="color: blue;text-decoration: underline;">Remove Here</a></button>
</td></tr>
<tr>
<td align="left" style="color: white">Add Users:</td><td align="center"><button><a href="adduser.php"style="color: blue;text-decoration: underline;">Add Here</a></button>
</td></tr>
<tr>
<td align="left" style="color: white">Remove Dispenser:</td><td align="center"><button><a href="deldis.php"style="color: blue;text-decoration: underline;">Remove Here</a></button>
</td></tr>
<td align="left" style="color: white">Add Dispenser:</td><td align="center"><button><a href="adddis.php"style="color: blue;text-decoration: underline;">Add Here</a></button>
</td></tr>
</table>
</div><br>
<br>
<br>
<br><br>
<br><footer class="footer">
		<center>
			<h5 style="font-family:=Courier New;font-size: 16px;float:center;color: black;">&copy; Dhananjay Chauhan (2025) </h5>
		</center>
	</footer>
</body>
</html>
