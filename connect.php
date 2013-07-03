<?php
$con = mysql_connect('localhost','root','1234567','test');
if (mysqli_connect_errno($con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
mysql_select_db("test",$con);
 }
?>
