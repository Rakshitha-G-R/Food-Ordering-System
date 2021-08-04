<html>
<head>
</head>
<body>
<form action="modify_customer.php" method="get">
Name:<input type="text" name="cust_nm">
<br><br>
Field:<input type="text" name="fd">
<br><br>
Value:<input type="text" name="val">
<br><br>
<input type="submit">
</form>
<?php
if(isset($_GET['cust_nm'])&&isset($_GET['fd'])&&isset($_GET['val'])){
$rec=$_GET['cust_nm'];
$field=$_GET['fd'];
$nval=$_GET['val'];
$file=fopen("Orders.txt","a+");
while (!feof($file) ) {
$line = fgets($file);
$a = explode('|', $line);
if($a[0]==$rec){
if($field=="item_name"){
$a[1]=$nval;
}
elseif($field=="location"){
$a[2]=$nval;
}
else{
$a[3]=$nval;
$line=$a[0]."|".$a[1]."|".$a[2]."|".$a[3];
}
$result[]=$line;
}
file_put_contents("Customer1.txt", $result);
}
?>
</body>