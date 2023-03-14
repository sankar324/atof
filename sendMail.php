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
	$email_from = "marketing@atof.in"; //Sender: Please replace email ID for from mail address
    $password = "atof@654321"; //Sender: Please replace for from email ID password.
	$name_from = "ATOF.in Marketing";
	$email_to = "sathish.swprof@gmail.com"; //Please replace it


	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "bom1plzcpnl498923.prod.bom1.secureserver.net"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = $email_from; // GMAIL username
	$mail->Password = $password; // GMAIL password
	

    $subject = "";
    $message = "";
	if($_POST['form_type'] == 'service_request'){
		$subject = "Marketing Enquiry!!!";
		$message .= " Full name: ".$_POST['name'] . "\n\n";
		$message .= "Contact No.: " . $_POST['phone']."\n\n"; 
		$message .= "Email ID: ". $_POST['email']. " \n\n";
		$message .= "Company Name: ". $_POST['Company']."\n\n";
		$message .= "Industry Type: ".$_POST['Industry']." \n\n";
		$message .= "Marketing Resource: ".$_POST['marketing_resource']." \n\n";
		$service_required = "";
		if(isset($_POST['sellist'])){
			$service_required = $_POST['sellist'];
		}else{
			$service_required = $_POST['request_free_demo'];
		}
		$message .= "Services Required: ".$service_required." \n\n";
	}

	if($_POST['form_type'] == 'contact_request'){
		$subject = "Requesting for contact!!!";
		$message .= "Full name: ".$_POST['Name'] . "\n\n";
		$message .= "Contact No.: " . $_POST['phone']."\n\n"; 
		$message .= "Email ID: ". $_POST['Email']. " \n\n";
		$message .= "Message: ". $_POST['message']. " \n\n";
		$message .= "Time Slots: ". implode(', ',$_POST['timeslots']). " \n\n";
	}
	$message .= "\n Thanks,\n ATOF";

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