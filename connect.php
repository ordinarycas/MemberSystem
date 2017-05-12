<?php
	$connection = mysqli_connect('localhost','root','root');
	if (!$connection){die("Failed". mysqli_error($connection));}
	$select_db = mysqli_select_db($connection,'membersystem');
	if (!$select_db){die("Failed". mysqli_error($connection));}
	mysqli_query($connection,"SET CHARACTER SET UTF8");
	date_default_timezone_set('Asia/Taipei');
?>