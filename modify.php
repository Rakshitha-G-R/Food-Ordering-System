<html>
<head>
<style>
body{
  background-image: url('123.jpg');
color:white;
}
</style>
</head>
<body>
<form action="modify.php" method="post">
Name:<input type="text" name="it_nm">
<br><br>
Field:<input type="text" name="fd">
<br><br>
Value:<input type="text" name="val">
<br><br>
<input type="submit">
</form>
<?php
if(isset($_POST['it_nm'])&&isset($_POST['fd'])&&isset($_POST['val'])){
$rec=$_POST['it_nm'];
$field=$_POST['fd'];
$nval=$_POST['val'];
$file=fopen("Menu.txt","a+");

fseek($file,0);

while (!feof($file) ) {
$line = fgets($file);
$a = explode('|', $line);
if(isset($a[1])){
if($a[1]==$rec){
if($field=="id"){
$a[0]=$nval;
}
elseif($field=="name"){
$a[1]=$nval;
}
elseif($field=="quantity"){
$a[2]=$nval;
}
else{
$a[3]=$nval;
}
$line=$a[0]."|".$a[1]."|".$a[2]."|".$a[3];
}
}

$result[]=$line;
}
file_put_contents("Menu.txt", $result);


}
?>
</body>
	  

	
