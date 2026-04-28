<?php
	error_reporting(E_ALL & ~E_NOTICE); 
	
	header('Content-Type: application/json');

	$data = json_decode(file_get_contents("php://input"), true);

	if (!isset($data['message'])) 
	{
		echo json_encode(['success' => false]);
		exit;
	}

	$message = $data['message'];

	$to = "office@example.com";
	$subject = "New Order - Simple Cart";
	$headers = "From: office@example.com";
	$headers .= "\r\nMime-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable";

	try
	{
		$sent = mail($to, $subject, $message, $headers);
	}
	catch(e)
	{
		$sent = false;
	}

	echo json_encode(['success' => $sent]);
?>
