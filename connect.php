<?php
    $fullname = $_POST['fullname']
    $email = $_POST['email']
    $message = $_POST['message']

    //Database Connection
    $conn = new mysqli('localhost','root','','testing');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fullname, email, message) values(?, ?, ?)");
		$stmt->bind_param("sss", $fullname, $email, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Message sent successflly! Thank you!";
		$stmt->close();
		$conn->close();
	}
?>