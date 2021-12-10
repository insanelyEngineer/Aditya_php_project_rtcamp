<?php
$otp=rand(100000,999999);
$server="localhost";
$username="id18097675_root";
$password="NXeqSw*Y)i)y6L[#";
$database="id18097675_verify";
$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die("connection to this database failed due to error".mysqli_connect_error());
}
$sql="SELECT `sub` FROM `subs`;";
$result = $con->query($sql);
$array_email=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($chk = $result->fetch_assoc()) {
    //   echo "id:".$chk["sub"]."<br>";
    //   $html .= $chk["sub"].",";
    array_push($array_email,$chk["sub"]);
    }}
// print_r ($array_email);

include('smtp/PHPMailerAutoload.php');
		$url_lim = "https://xkcd.com/info.0.json";
		$json_lim = file_get_contents($url_lim);
		$json_data_lim = json_decode($json_lim, true);
		// $num=$json_data_lim["num"];
		// echo $num;
		// echo rand(1,$json_data_lim["num"]);

		$url = 'https://xkcd.com/'.rand(1,$json_data_lim["num"]).'/info.0.json';
		$json = file_get_contents($url);
		$json_data = json_decode($json, true);

		$email=$array_email;
		

		$html = '<html><body>';
		$html .= '<img src="https://xkcd.com/s/0b7742.png" width="60" height="20"><br>';
		$html .= '<img src="'.$json_data["img"].'"><br>';
		$html .= '<a href="http://www.adityachaudhary7.me/unsubscribe.php" style="text-decoration: none; color:black">unsubscribe</a>';
		$html .= '</body></html>';
  
		echo smtp_mailer($email,'Comic from XKCD: '.$json_data["safe_title"],$html);
		
		function smtp_mailer($to,$subject, $msg){
		  $mail = new PHPMailer(); 
		//   $mail->SMTPDebug  = 3;
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
		
		  if (!empty($to)) {                          
            foreach ($to AS $eachAddress) {
                $mail->addBCC($eachAddress);
            }
        }

		  $mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		  ));
		  if(!$mail->Send()){
			echo $mail->ErrorInfo;
		  }else{
			  
			  echo "sent mail to all users.";
		  }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
</head>
<body>
    <script> location.replace("waiting.html"); </script>
</body>
</html>