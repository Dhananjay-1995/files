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
<title>remove_user</title>
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
<head><h1 align="center" style="font-family: Times New Roman;color: black; font-size: 30px;">REMOVE USERS<h1></head>
<body>
<form action="deluser.php" method="post"></br>

<table align="center" width="20%" border="1" style="margin-top:10px;">
<tr>
<th style="color: white">Users list:</th>
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
<tr style="background-color:#000;color:#fff;">
        <th>No:</th>
		<th>User:</th>
		<th>Password:</th>
		<th>Edit</th>
</tr>
<?php
if(isset($_POST['search'])){
	include('../dbcon.php');
	
	$sql="SELECT * FROM `user`";
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run) <1){
		
		echo "<tr><td colspan='5'>no record found</td></tr>";
		
	}
	
	else{
		$count=0;
		while($data=mysqli_fetch_assoc($run)){
			$count++;
			?>
			<tr style="background-color:#fff;color:#fff; font-family:=Times New Roman;font-size: 15px;">
			<th style="color:black;"><?php echo $count;?></th>
			<td style="color:blue;"><?php echo $data['username'];?></td>
			<td style="color:blue;"><?php echo $data['password'];?></td>
			<td align="center"><a href="removeuser.php?sid=<?php echo $data['id'];?>"><button>Remove</button></a></td>
             </tr>
			
			<?php
		}
	
	}

	
}
?>
</table>