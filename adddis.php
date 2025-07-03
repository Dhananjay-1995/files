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
<title>add_dispenser</title>
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
<head><h1 align="center" style= "font-family: Times New Roman;color: black; font-size: 30px;">ADD NEW DISPENSER<h1></head>
<body>
<br>
<form action="adddis.php" method="post">
<table align="center">
<tr align="left" style="color: white">
<th>Dispenser ID:</th>
<td><input type="text" name="disid" required ></td>
</tr>
<tr align="left" style="color: white">
<th>SR No:</th>
<td><input type="text" name="srno" placeholder="Last 4 digits only" required></td>
</tr>
<tr>
<td colspan=2 align="center">
<br>
<input <input type="submit" name="submit" value="Add Data" ></td>
</tr>
</table>
</form>
<br>
<br>
<br><br>
<br><br><br>
<footer class="footer">
		<center>
			<h5 style="font-family:=Courier New;font-size: 16px;float:center;color: black;">&copy; Dhananjay Chauhan (2025) </h5>
		</center>
	</footer>
</body>
</html>

<?php

 if(isset($_POST['submit'])){
	$user =$_POST['disid'];
	$passcode =$_POST['srno'];
	$name=$user.$passcode;
	
	   include('../dbcon.php');
	   
	   	// Check if table already exists
		$stmt =$con->query("SHOW TABLES LIKE '$name';");
		if($stmt->num_rows > 0){		
		?>
		<script>
		alert('Dispenser already exist.');
		window.open('adddis.php','_self')
		</script>
		<?php
		}
	   
		$sql="CREATE TABLE IF NOT EXISTS `id5523467_userlogin`.`$name` (`Sno` INT UNSIGNED NOT NULL AUTO_INCREMENT , `timestamp` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `side` INT UNSIGNED NOT NULL , `rate` FLOAT UNSIGNED NOT NULL , `kg` FLOAT UNSIGNED NOT NULL , `rs` FLOAT UNSIGNED NOT NULL , `electtot` DOUBLE UNSIGNED NOT NULL , `fmtot` DOUBLE UNSIGNED NOT NULL , `error` INT UNSIGNED NOT NULL , PRIMARY KEY (`Sno`)) ENGINE = MyISAM;";
		$run=mysqli_query($con,$sql);
		
		if($run== true){
		?>
		<script>
		alert('Data created successfull.');
		window.open('adddis.php','_self')
		</script>
		<?php
		}
				else
		{
			echo"<script>alert('Error!');window.open('adddis.php','_self');</script>";
		}
	
	}
?>