<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './PHPMailer/PHPMailer/src/Exception.php';
require_once './PHPMailer/PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/PHPMailer/src/SMTP.php';

// Below are test purpose
// $_POST['name'] = "Sathish";
// $_POST['email'] = "sathish@gamicl.com";
// $_POST['phone'] = "7702385589";
// $_POST['Company'] = "Test";
// $_POST['Industry'] = "IT";

$mail = new PHPMailer(true);
try{
	$email_from = "sathish.swprof@gmail.com"; //Sender: Please replace email ID for from mail address
    $password = "qyfthqpvsifxvzod"; //Sender: Please replace for from email ID password.
	$name_from = "ServiceDesk-Service Request Mail !!";
	$email_to = "sathish.swprof@gmail.com"; //Please replace it


	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = $email_from; // GMAIL username
	$mail->Password = $password; // GMAIL password
	

	$email = $_POST['email']; // this is the sender's Email address
    $fullName = $_POST['name'];
    $subject = "Service Request Form submission";
    $message = "Full name: ".$fullName . "\n\n Contact No.: " . $_POST['phone']."\n\n Email ID: ". $_POST['email']. " \n\n Company Name: ". $_POST['Company']."\n\n Industry Type: ".$_POST['Industry']." \n\n\n Thanks,\n ATOF";

	//Typical mail data
	$mail->AddAddress($email_to, $name_from);
	$mail->SetFrom($email_from, $name_from);
	$mail->Subject = $subject;
	$mail->Body = $message;
	
	
		$mail->Send();
		echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

?>