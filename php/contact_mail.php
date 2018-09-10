<?php
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465;  
$mail->Username = "prubiera1985@gmail.es";
$mail->Password = "70071630z";
$mail->Host     = "smtp.gmail.es";
$mail->Mailer   = "smtp";
$mail->SetFrom($_POST["userEmail"], $_POST["userName"]);
$mail->AddReplyTo($_POST["userEmail"], $_POST["userName"]);
$mail->AddAddress("paula.rubiera@oneclick.es");	
$mail->Subject = $_POST["subject"];
$mail->WordWrap   = 80;
$mail->MsgHTML($_POST["content"]);

if(is_array($_FILES)) {
$mail->AddAttachment($_FILES['attachmentFile']['tmp_name'],$_FILES['attachmentFile']['name']); 
}

$mail->IsHTML(true);

if(!$mail->Send()) {
	echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
	echo "<p class='success'>Contact Mail Sent.</p>";
}	
?>


