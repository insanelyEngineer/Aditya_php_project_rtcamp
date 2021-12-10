<?php
$email=$_POST['email']??"";
if($email!==""){
    $otp=rand(100000,999999);
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
    $sql="SELECT `sub` FROM `subs` WHERE `sub` LIKE '$email'";
    $result = $con->query($sql);
    $chk = $result->fetch_assoc();
    if($chk['sub']==$email){
        $sql="DELETE FROM `subs` WHERE `sub` LIKE '$email'";
        mysqli_query($con,$sql);
        mysqli_close($con);
        echo $email." has unsubscribed";
        exit;
    }
    echo "check credentials";
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
    <p>Enter your email id from unsubscribing.</p>

    <form action="unsubscribe.php" method="post">
      
      <div class="col-1">
        <label for="email">email:</label>
        <input type="text" name="email" id="email" value="" required>
      </div>
      
      <input type="submit" value="Unsubscribe" id="btn">
      
    </form>
  </div>
</body>
</html>