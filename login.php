<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $name=$_POST['user_name'];
$pwd=$_POST['password'];
$file=fopen("Customer.txt","r");
$flag=0;
while (!feof($file) ) {
$line = fgets($file);
$a = explode('|', $line);
if(($a[0]==$name)&&($a[3]==$pwd)){
$_SESSION['Username']=$name;
$_SESSION['Pass']=$pwd;
$flag=1;
}
}
if($flag==0){
$message="Invalid username or password";
}
}
    if(isset($_SESSION["Username"])) {
    header("Location:index.php");
    }

?>
<html>
<head>
<title>User Login</title>
<style>
body{
  background-image: url('img1.jpg');
}
</style>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="user_name">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>