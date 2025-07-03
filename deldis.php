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
<title>remove_dispenser</title>
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
<head><h1 align="center" style="font-family: Times New Roman;color: black; font-size: 30px;">REMOVE DISPENSER DATA<h1></head>
<body>
<form action="deldis.php" method="post"></br>

<table align="center" width="20%" border="1" style="margin-top:10px;">
<tr>
<th style="color: white">Dispensers list:</th>
<th colspan=2 align="center"><input type="submit" name="search" value="Search all" ></th>
</tr>

</table>
</form><br>

</body>
<br>
<br>

<footer class="footer">
		<center>
			<h5 style="font-family:=Courier New;font-size: 16px;float:center;color: black;">&copy; Dhananjay Chauhan (2025) </h5>
		</center>
	</footer>
</html>
<table align="center" width="80%" border="1" style="margin-top:10px;">
<tr style="background-color:#000;color:#fff; font-family:=Courier New;font-size: 15px;">
        <th>No:</th>
		<th>Dispenser:</th>
		<th>Edit</th>
</tr>
<?php
if(isset($_POST['search'])){
	include('../dbcon.php');
	
	$sql="SHOW TABLES FROM `id5523467_userlogin`;";
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run) <1){
		
		echo "<tr><td colspan='5'>no record found</td></tr>";
		
	}
	
	else{
		$count=0;
		while($data=mysqli_fetch_row($run)){
			if($data[0]!="user"&& $data[0]!="adminid" ){
			$count++;
			
			?>
			<tr style="background-color:#fff;color:#fff; font-family:=Times New Roman;font-size: 15px;">
			<th style="color:black;"><?php echo $count;?></th>
			<td style="color:blue;"><?php echo $data[0];?></td>
			<td align="center"><a href="removedis.php?sid=<?php echo $data[0];?>"><button>Remove</button></a></td>
             </tr>
			
			<?php
			}
			
		}
	
	}

	
}
?>
</table>