<?php 
	$conn = mysqli_connect('localhost','root','52890611.');
	if(mysqli_errno($conn)){
		echo mysqli_errno($conn);
		exit;
	}
	mysqli_select_db($conn,'usr');
	mysqli_set_charset($conn,'utf8');



 ?>