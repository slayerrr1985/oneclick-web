<?php

//recipient
$to = 'paula.rubiera@oneclick.es';

//sender
$from = 'paula.rubiera@oneclick.es';
$fromName = 'Paula';

//email subject
$subject = 'PHP Email with Attachment'; 

//attachment file path

foreach ($_FILES as $file)

$file = "archivo.pdf";

//email body content
$htmlContent = '<h1>PHP Email with Attachment</h1>
    <p>This email has sent from PHP script with attachment.</p>';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary={$mime_boundary}\n"; 

//multipart boundary 
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=UTF-8\n" .
"Content-Transfer-Encoding: 7bit\n" . $htmlContent . "\n"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=" . basename($file) ."\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=".basename($file)."; size=".filesize($file).";\n" . 
        "Content-Transfer-Encoding: base64\n" . $data . "\n";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;





/*send email
$mail = @mail($to, $subject, $message, $headers, $returnpath); 

//email sending status
echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";

*/







require('phpmailer/class.phpmailer.php');
$mail = new PHPMailer();
$subject = "Test Mail using PHP mailer";
$content = "<b>This is a test mail using PHP mailer class.</b>";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "paula.rubiera@oneclick.es";
$mail->Password = "prg70071630z";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("paula.rubiera@oneclick.es", "Paula");
$mail->AddReplyTo("paula.rubiera@oneclick.es", "Paula");
$mail->AddAddress("prubiera1985@gmail.com");
$mail->Subject = $subject;
$mail->WordWrap   = 80;
$mail->MsgHTML($message);
$mail->IsHTML(true);

if(!$mail->Send()) 
	echo "Problem on sending mail";
else 
echo "Mail sent";






?>