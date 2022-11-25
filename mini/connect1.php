<?php
	$firstName = $_POST['firstname'];
    $middlename = $_POST['middlename'];
	$lastName = $_POST['lastname'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
	
	
	$conn = new mysqli('localhost','root','','mini1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(firstName, middlename,lastName,phone,email,address, gender) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssisss", $firstName,$middlename, $lastName,$phone, $email, $address, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>