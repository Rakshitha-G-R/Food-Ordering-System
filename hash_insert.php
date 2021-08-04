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
<form id="insert_item" action="hash_insert.php" method="post">
ID:<input type="number" name="id"><br><br>
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
$file_h1=fopen("Hash_tab1.txt","a+");
$file_h2=fopen("Hash_tab2.txt","a+");
$file_h3=fopen("Hash_tab3.txt","a+");
function hash_fun($i){
$t=$i%2;
return $t;
}

$rec=$i_name."|".$quan."|".$price;

while(strlen($rec)<42){
$rec=$rec."_";
}

$pos=hash_fun($id);
$count1=0;
$count2=0;

while (!feof($file_h1) ) {
       $line = fgets($file_h1);
       $count1++;
   }
while (!feof($file_h2) ) {
       $line = fgets($file_h2);
       $count2++;
   }
$f1=0;
$f2=0;

if($pos==0){
if($count1<=5){
$f1=1;
fwrite($file_h1,$id);
fwrite($file_h1,"|");
fwrite($file_h1,"\n");
echo "Inserted in bucket 1";
}

else{
echo "BUCKET 1 OVERFLOW<br>";
fwrite($file_h3,$id);
fwrite($file_h3,"|");
fwrite($file_h3,"\n");
echo "Inserted in bucket 3";
}
}

else
{
if($count2<=5){
$f2=1;
fwrite($file_h2,$id);
fwrite($file_h2,"|");
fwrite($file_h2,"\n");
echo "Inserted in bucket 2";
}
else{
echo "BUCKET 2 OVERFLOW<br>";
fwrite($file_h3,$id);
fwrite($file_h3,"|");
fwrite($file_h3,"\n");
echo "Inserted in bucket 3";
}
}
$idin="xxx00".$id;

$te=ftell($file);
fwrite($file,$idin);
fwrite($file,"|");
fwrite($file,$rec);
fwrite($file,"\n");
fclose($file);

}
?>

</body>
</html>