<?php
include('../dbcon.php');
    $username = $_POST['user'];
	$password = $_POST['passcode'];
	$id=$_POST['sid'];
	$sql="UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `id` = '$id';";
$run=mysqli_query($con,$sql);
	if($run== true){
		?>
		<script>
		alert('Data update successfull.');
		window.open('update.php','_self')
		</script>
		<?php
	}
	

?>