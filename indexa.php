  <!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['uid'])){
	echo "";
}
else{
	header('location:index.php');
}
?>

<html>
<title>log_print</title>
<link rel="icon" href="favicon2.png" type="image/png">
<style>
    body {
    background-image: url("view-woman-with-car-gas-station.jpg");
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
<br><br>
<head><h1 align="center" style="font-family: Times New Roman;color: black; font-size: 30px;">DISPENSERS DATA LOG<h1></head>
<body>
<form action="indexa.php" method="post">
<table align="center"; width="30%"; border="1"; style="margin-top:10px;background-color:#000;color:#fff; font-family:=Courier New;font-size: 15px;">
<tr><h1><td colspan="2" align="center" style="font-family: Helvetica;color: white;"><b>Search Dispenser Data:</b></td></h1></tr>
<tr>
<td style="color: white;">Dispenser id:</td>
<td><input type="text" name="id" required ></td>
</tr>
<tr>
<td style="color: white;">Sr No:</td>
<td><input type="text" name="srno" placeholder="Last 4 digits only" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Search" ></td>
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

<table align="center" width="100%" border="1" style="margin-top:10px;">
<tr style="background-color:#000;color:#fff; font-family:=Courier New;font-size: 15px;">
        <th>SNo:</th>
		<th>Date & Time:</th>
		<th>Side:</th>
		<th>Rate (₹/kg):</th>
		<th>Sell (kg):</th>
		<th>Sell (₹):</th>
		<th>Electronic TOT (kg):</th>
		<th>Flowmeter TOT (kg):</th>
		<th>Error:</th>
</tr>
<?php
if(isset($_POST['submit'])){
	$id =$_POST['id'];
	$srn =$_POST['srno'];
	$db=$id.$srn;
	include('dbcon.php');
	
	$sql="SELECT * FROM `$db`ORDER BY `Sno` DESC";
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run) <1){
		
		echo "<tr><td colspan='5'>No record found!</td></tr>";
		
	}
	
	else{
		$count=0;
		while($data=mysqli_fetch_assoc($run)){
			$count++;
			?>
			<tr style="background-color:#fff;color:#fff; font-family:=Times New Roman;font-size: 15px;">
			<th style="color:black;"><?php setlocale(LC_MONETARY,"en_US");echo $count;?></th>
			<td style="color:blue;"><?php echo $data['timestamp'];?></td>
			<td style="color:blue;"><?php echo $data['side'];?></td>
			<td style="color:blue;"><?php echo $data['rate'];echo " (₹/kg)";?></td>
			<td style="color:blue;"><?php echo $data['kg'];echo " (kg)";?></td>
			<td style="color:blue;"><?php echo $data['rs'];echo " (₹)";?></td>
			<td style="color:blue;"><?php echo $data['electtot'];echo " (kg)";?></td>
			<td style="color:blue;"><?php echo $data['fmtot'];echo " (kg)";?></td>
			<td style="color:blue;"><?php echo $data['error'];?></td>
             </tr>
			
			<?php
		}
	
	}

	
}
?>
</table>
</html>