<?php
session_start();
require_once 'magicfun.php';
$dir = "images/cards";

    $rad=randomimage($dir);
    $rand = array();
    $rand=getrandom($rad);
    
    shuffle($rad);/*
    foreach($rand as $r){
    echo "<img src='".$dir.'/'.$r."'>";
}*/


$_SESSION['random']=$rand;
$generate = isset($_POST['btnorigin']);

if($generate){
    foreach($rand as $r){
    echo "<img src='".$dir.'/'.$r."'>";
}
   echo"<a href = '7cards.php'>Next</a>";

}
?>
<html>
    <head></head>
    <body>
        <form action="" method="post">
        <input type="submit" name="btnorigin" value="Generate"> 
        </form>
    </body>
</html>