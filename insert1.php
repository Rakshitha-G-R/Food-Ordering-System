
<form action="insert1.php" method="get">
Name:<input type="text" name="item_name"><br><br>
Quantity:<input type="text" name="quantity"><br><br>
Cost:<input type="text" name="cost"><br><br>
<input type="submit">
</form>
<br>
<?php
if(isset($_GET['item_name'])&&isset($_GET['quantity'])&&isset($_GET['cost'])){
$Name=$_GET['item_name'];
$quan=$_GET['quantity'];
$Cost=$_GET['cost'];
$file1=fopen("Menu.txt","a")
or die("Unable to open file!");
fwrite($file1,'|');
fwrite($file1,$Name);
fwrite($file1,'|');
fwrite($file1,$quan);
fwrite($file1,'|');
fwrite($file1,$Cost);
fwrite($file1,"\n");
}
?>