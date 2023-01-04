<form action="connect.php" method="post" class="myForm">
            <input type="text" class="myInput" name="name" placeholder="Enter your name">
            <input type="phone" class="myInput" name="phone" placeholder="Enter your phone">
            <input type="email" class="myInput" name="email" placeholder="Enter your email">
            <input type="text" class="myInput" name="address" placeholder="Enter your address">
            <input type="text" class="myInput" name="concern" placeholder="Enter your concern">
            <button id="btn">Submit</button>
        </form>
<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$concern = $_POST['concern'];

	// Database connection
	$conn = new mysqli('localhost','root','','connect');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, phone, email, address, concern) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $name, $phone, $email, $address, $concern);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>