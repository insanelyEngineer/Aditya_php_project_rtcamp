<?php
    $server="localhost";
    $username="id18097675_root";
    $password="NXeqSw*Y)i)y6L[#";
    $database="id18097675_verify";
	$con = mysqli_connect($server,$username,$password,$database);
	
	if(!$con){
		die("connection to this database failed due to error".mysqli_connect_error());
	}
	$sql="SELECT `email` FROM `verify` ORDER BY `time` DESC LIMIT 1;";
    $result = $con->query($sql);
    $chk = $result->fetch_assoc();
	// echo $chk['email'];
	$email=$chk['email'];

	$sql="SELECT * FROM `verify` ORDER BY `time` DESC LIMIT 1;";
    $result = $con->query($sql);
    $chk = $result->fetch_assoc();
	// echo $chk['otp'];
	$otp=$chk['otp'];


	include('smtp/PHPMailerAutoload.php');

	  $html='This is to verify your XKCD comic subscription. Your otp is '.$otp.'.';

	  echo smtp_mailer($email,'OTP VERIFY',$html);

	  function smtp_mailer($to,$subject, $msg){
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; 
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Username = "email";//sender email here
		$mail->Password = "";//password here
		$mail->SetFrom("email");//sender email here
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
			echo "sent";
		}
	  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Document</title>
  </head>
  <body>
	  <script> location.replace("verify.php"); </script>
  </body>
  </html>