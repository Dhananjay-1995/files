
<?php
include('../dbcon.php');
$sid= $_GET['sid'];
//$sql="SELECT * FROM `user` WHERE `id`='$sid'";
//$run=mysqli_query($con,$sql);
//$data=mysqli_fetch_assoc($run);
	//$id=$_POST['sid'];
$sql="DELETE FROM `user` WHERE `id`='$sid';";
	
$run=mysqli_query($con,$sql);
	if($run== true){
		?>
		<script>
		alert('Data removed successfull.');
		window.open('deluser.php','_self')
		</script>
		<?php
	}
	

?>