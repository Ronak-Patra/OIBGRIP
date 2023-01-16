<?php
include('smtp/PHPMailerAutoload.php');
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];
$number= $_POST['number'];
$txt ="Name = ". $name . "\r\n <br> Email = " . $email .  "\r\n<br> number =" . $number ."\r\n<br> Message =" . $message;
// $html='hi';
echo smtp_mailer('ronvpatra999@gmail.com','Form Response from AWebb.com',$txt);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "Awebb8222@gmail.com";
	$mail->Password = "WEAREWEBBERS@*@@@";
	$mail->SetFrom("Awebb8222@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
header("Location:index.html");
?>