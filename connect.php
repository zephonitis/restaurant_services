<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','dbms');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("siss", $name, $phone, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Our representative will contact you soon";
		$stmt->close();
		$conn->close();
	}
?>