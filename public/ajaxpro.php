<?php

	$data = $_POST['image'];
	$userid = $_POST['userid'];
	$email = $_POST['email'];

	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);

	$data = base64_decode($data); 
	file_put_contents('uploadimage/'.$userid . '-'. $email . '-profile.png', $data);

	echo 'done';


?>
