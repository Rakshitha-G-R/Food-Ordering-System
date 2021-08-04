<style>
body{
  background-image: url('123.jpg');
color:white;
}
</style>
<form action="delete_c.php" method="get">
         Name:<br> <input type="text" name="name">
         <br>
		 <input type="submit">
      </form>

<?php
$handle=fopen("Customer.txt","a+");
if(isset($_GET['name'])) {
   while (!feof($handle) ) {
       $line = fgets($handle);
       $a = explode('|', $line); 

       if($_GET['name'] != $a[0]) { // add lines to result if they don't contain
            $results[] = $line;
       }
   }
file_put_contents("Customer.txt", $results);
}


?>
