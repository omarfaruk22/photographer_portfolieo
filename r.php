<?php  


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['message'])) {
	include 'reg.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);
	$address = validate($_POST['address']);
	$message = validate($_POST['message']);

	if (empty($message) || empty($name) || empty($email) || empty($phone) || empty($address)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO nilay(name, email, phone, address, message) VALUES('$name', '$email', '$phone', '$address', '$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: index.html");
}