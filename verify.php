<?php 
$email=$_POST['email']??"";
$otp=$_POST['otp']??"";
if($email!=="" ||$otp!==""){
    // echo $otp."  ......   ",$email;
    // echo "<br>";
$server="localhost";
$username="id18097675_root";
$password="NXeqSw*Y)i)y6L[#";
$database="id18097675_verify";
$con = mysqli_connect($server,$username,$password,$database);

if(!$con){
    die("connection to this database failed due to error".mysqli_connect_error());
}
else{
    // echo "connected to db <br><br>";
}
$sql="SELECT `otp` FROM `verify` WHERE `email`like '$email'";
$result = $con->query($sql);
$check_otp = $result->fetch_assoc();
if((int)$check_otp['otp']==$otp){
    // echo "match";
    $sql="DELETE FROM `verify` WHERE `email`LIKE '$email'";
    if(mysqli_query($con,$sql)){
        // echo "deleted";
    }
    mysqli_close($con);

    $con2 = mysqli_connect($server,$username,$password,$database);
    $sql2="INSERT INTO `subs`(`sub`) VALUES ('$email')";
    mysqli_query($con2,$sql2);
    mysqli_close($con2);
    header("location: thanks.html");
    exit;
}
else{
    echo "Please check the credentials.";
}

}
else{
    // echo "Enter input";
}
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
  <button><a href="index.php">HOME</a></button>
  <div class="clear"></div>
</div>
  <div class="container">
    <p>Enter correct information form validation process.</p>

    <form action="verify.php" method="post">
      
      <div class="col-1">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" value="" required>
        <br>
        <label for="otp">otp:</label>
        <input type="text" name="otp" id="otp" value="" required>
      </div>
      <input type="submit" value="Activate" id="btn">
      
    </form>
  </div>
</body>
</html>