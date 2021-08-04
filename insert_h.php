<html>
<head>
<title>FOOD DELIVERY</title>
</head>
<style>
body{
  background-image: url('img1.jpg');
}
</style>
<body>
<form id="insert_item" action="insert_h.php" method="post">
ID:<input type="text" name="id"><br><br>
Item Name:<input type="text" name="Item_name"><br><br>
Quantity:<input type="text" name="Quantity"><br><br>
Price:<input type="text" name="Price"><br><br>
<input type="submit">
</form>
<br>
<?php
if(isset($_POST['id'])&&isset($_POST['Item_name'])&&isset($_POST['Quantity'])&&isset($_POST['Price'])){
$id=$_POST['id'];
$i_name=$_POST['Item_name'];
$quan=$_POST['Quantity'];
$price=$_POST['Price'];
$file=fopen("Menu.txt","a+");

function hash_fun($i){
$t=(((ord($i[3])-48)*100)+((ord($i[4])-48)*10)+ord($i[5]))%9;
return $t*142;
}

$rec=$id."|".$i_name."|".$quan."|".$price;

while(strlen($rec)<46){
$rec=$rec."_";
}

$pos=hash_fun($id);
echo"$pos";

fseek($file,$pos);
$te=ftell($file);
fwrite($file,$rec);
fwrite($file,"\n");
fclose($file);
}
?>

</body>
</html>





