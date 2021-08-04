
<style>
body{
  background-image: url('123.jpg');
color:white;
}
</style>
<form action="delete.php" method="get">
         Name:<br> <input type="text" name="name">
         <br>
		 <input type="submit">
      </form>

<?php
$handle=fopen("Menu.txt","a+");
if(isset($_GET['name'])) {
   while (!feof($handle) ) {
       $line = fgets($handle);
       $a = explode('|', $line); 
	if(isset($a[1])){
       if($_GET['name'] != $a[1]) { // add lines to result if they don't contain
            $results[] = $line;
       }
}
   }
file_put_contents("Menu.txt", $results);
}


?>


	
