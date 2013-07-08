<?php
session_start();
$rad = $_SESSION['random'];
$dir = "images/cards";
require_once 'magicfun.php';
$neworder = array();
$neworder=groups($rad);
$part1 = array();
$part2 = array();
$part3 = array();
$part1 = getpart1($neworder);
$part2 = getpart2($neworder);
$part3 = getpart3($neworder);
echo"Part 1:";
foreach($part1 as $p1){
    echo "<img src='".$dir.'/'.$p1."'>";
}
echo "<br>";
echo"Part 2:";
foreach($part2 as $p2){
    echo "<img src='".$dir.'/'.$p2."'>";
}
echo "<br>";
echo"Part 3:";
foreach($part3 as $p3){
    echo "<img src='".$dir.'/'.$p3."'>";
}
echo "<br>";
$submit = isset($_POST['btnpart']);

$newrand = array();
if($submit){
    
    if($_POST['part']=='pt1'){
        $newrand = array_merge($part3,$part1,$part2);
       
    }
    elseif($_POST['part']=='pt2'){
        $newrand = array_merge($part3,$part2,$part1);
        
    }
    else{
        $newrand = array_merge($part1,$part3,$part2);
        
    }
    $_SESSION['newrand1'] = $newrand;
    header("Location:gamesecond.php");
}
?>
<form method='post' action=''>
    <select name='part'>
        <option value='pt1'>Part 1</option>
        <option value='pt2'>Part 2</option>
        <option value='pt3'>Part 3</option>
    </select>
    <input type='submit' value='Select' name='btnpart'>
    
</form>