
<?php
include('../dbcon.php');
$sid= $_GET['sid'];
	$sql="DROP TABLE `$sid`;";
	
$run=mysqli_query($con,$sql);
	if($run== true){
		?>
		<script>
		alert('Data removed successfull.');
		window.open('deldis.php','_self')
		</script>
		<?php
	}
	

?>