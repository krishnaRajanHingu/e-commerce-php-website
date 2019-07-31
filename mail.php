<?php
session_start();
if(isset($_POST['email'])){
	$to = $_POST['email'];
	
	$from = "13123029@student.uts.edu.au";
	$headers = "From: $from";
	$subject = "Thanks for Shopping..";
	$message = 'Thank you for shopping with us. Your purchased items will be delivered in short time. Enjoy!!';

	mail($to,$subject,$message,$headers);
	unset($_SESSION['cart']);
	echo "<h1>Thank you for shopping with us!</h1>"; // html markup
	echo "Your purchased items will be delivered in short time. Enjoy!!<br>";
}
?>