<?php
session_start();
$rad = $_SESSION['random'];
$dir = "images/cards";
//$arr = $_GET['vals'];
foreach($rad as $r){
    echo "<img src='".$dir.'/'.$r."'>";
}
echo "<br>";

$picked = isset($_POST['btnpicked']);
require_once 'magicfun.php';
if($picked){
$seven = array();
//generate 7 cards function call.
$seven = selectcards($rad);
foreach($seven as $s){
 echo "<img src='".$dir.'/'.$s."'>";
}
echo "<br>";   

 echo"<a href = 'gamestart.php'>Lets Begin</a>";
}
?>
<html>
    <head></head>
    <body>
        <form action="" method="post">
        <input type="submit" value="Pick 7" name="btnpicked">
        </form>
        </body>
</html>
