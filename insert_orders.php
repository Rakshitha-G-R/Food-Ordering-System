<html>
<head>
<title>FOOD DELIVERY</title>
</head>
<body>
<form  id="insert_orders" action="insert_orders.php" method="post">
<label for="cust_nm">Customer Name:</label>
<select id="cust_nm" name="cust_name">
<?php
$file1=fopen("Customer1.txt","r");
$contents=fread($file1,filesize("Customer1.txt"));
$rec=explode("\n",$contents);
for($i=0;$i<3;$i++){
$field=explode("|",$rec[$i]);
echo "<option value=".$field[0].">".$field[0]."</option>";
}
?>
</select><br><br>
<label for="it_nm">Item Name:</label>
<select id="it_nm" name="it_name">
<?php
$file1=fopen("Menu.txt","r");
$contents=fread($file1,filesize("Menu.txt"));
$rec=explode("\n",$contents);
for($i=0;$i<3;$i++){
$field=explode("|",$rec[$i]);
echo "<option value=".$field[0].">".$field[0]."</option>";
}
?>
</select><br><br>
<input type="submit" name="submit1"/>
</form>
<?php
if(isset($_POST['cust_name'])&&isset($_POST['it_name']))
{
$option=$_POST['cust_name'];
$option2=$_POST['it_name'];
$file1=fopen("Customer1.txt","r");
$file2=fopen("Menu.txt","r");
$file3=fopen("Orders.txt","a");
$contents=fread($file1,filesize("Customer1.txt"));
$contents2=fread($file2,filesize("Menu.txt"));
$rec=explode("\n",$contents);
$rec2=explode("\n",$contents2);
fwrite($file3,$option);
fwrite($file3,"|");
fwrite($file3,$option2);
fwrite($file3,"|");
for($i=0;$i<3;$i++){
$field=explode("|",$rec[$i]);
if($field[0]==$option)
fwrite($file3,$field[1]);
}
fwrite($file3,"|");
for($i=0;$i<3;$i++){
$field2=explode("|",$rec2[$i]);
if($field2[0]==$option2)
fwrite($file3,$field2[2]);
}
fwrite($file3,"\n");
}
?>
</body>
</html>