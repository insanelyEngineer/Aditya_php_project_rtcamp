<?php
 $email = $_POST['email']??"";
 if($email!=null){
        
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 echo "Entered email is invalid";
 }
 else{
$otp=rand(100000,999999);
$server="localhost";
$username="id18097675_root";
$password="NXeqSw*Y)i)y6L[#";
$database="id18097675_verify";
$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die("connection to this database failed due to error".mysqli_connect_error());
}
$sql="DELETE FROM `verify` WHERE `email` LIKE '$email';";

if(!mysqli_query($con,$sql)){
 echo "error".mysqli_error($con);
  }
$sql="INSERT INTO `verify` (`email`, `otp`) VALUES ('$email', '$otp')";

if(!mysqli_query($con,$sql)){
        echo "error".mysqli_error($con);
    }
    mysqli_close($con);
    header("location:otp_mail.php");
    exit;
      }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XKCD Comics</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="header"><img src="https://xkcd.com/s/0b7742.png" width="140" height="50">
  <button><a href="verify.php">VERIFY</a></button>
  <div class="clear"></div>
</div>
  <div class="container">
    <p>Enter correct information form validation process.</p>

    <form action="index.php" method="post">
      
      <div class="col-1">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" value="" required>
      </div>
      
      <input type="submit" value="Activate" id="btn">
      
    </form>
    <div class="feedback">
    </div>
  </div>
  <div class="clear"></div>
  <div class="permit" style="margin-top:30%;"><a href="#" style="text-decoration: none; color: black;">*Click me to run server*</a>
    </div>
    <script>
    const server=document.querySelector(".permit");
    server.addEventListener('click',function(){
        window.open('http://www.adityachaudhary7.me/waiting.html');
    })
    </script>

</body>
</html>