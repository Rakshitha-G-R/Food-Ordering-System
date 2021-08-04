
<!doctype html>
<?php session_start(); ?>
<html>
<title>user_signup</title>  
<style>
body{
  background-image: url('img1.jpg');
}
</style>
<body>  
     <div class="container">
         <div class="main">
    <h2>User SignUp</h2>
    <h3>Sign-up Form</h3>
<form action="insert.php" method="get">
Name:<input type="text" name="user_name"><br><br>
Password:<input type="text" name="Password"><br><br>
Phone Number:<input type="text" name="PhNo"><br><br>
<input type="submit">
</form>
<br>

<?php
//$myuid=uniqid();
if(isset($_GET['user_name'])&&isset($_GET['Password'])&&isset($_GET['Location'])){
$name=$_GET['user_name'];
$pass=$_GET['Password'];
$phNum=$_GET['PhNo'];
$file1=fopen("Customer.txt","a")
or die("Unable to open file!");
fwrite($file1,'|');
fwrite($file1,$name,);
fwrite($file1,'|');
fwrite($file1,$phNum);
fwrite($file1,'|');
fwrite($file1,$pass);
fwrite($file1,'|');
fwrite($file1,"\n");
}
?>
</body>
</html>