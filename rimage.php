<?php
$dir = "images/cards";
$image = array();
$image = randomimage($dir);
$rad1=array();
$rad=randomimage($dir);
shuffle($rad);
foreach($rad as $r){
 echo "<img src='".$dir.'/'.$r."'>";
}
echo "<br>";
$seven = array();


//generate 7 cards function call.
$seven = selectcards($rad);
foreach($seven as $s){
 echo "<img src='".$dir.'/'.$s."'>";
}
echo "<br>";
echo "FIRST CARD: ";
echo "<img src='".$dir.'/'.$rad[0]."'>";

//divide into 3 groups and put them together
$neworder = array();
$neworder=groups($rad);
echo"<br>";/*
echo "PART 1 ";
echo"<br>";
getpart1($neworder,$dir);
echo"<br>";
echo "PART 2";
echo"<br>";
getpart2($neworder,$dir);
echo"<br>";
echo "PART 3";
echo"<br>";
getpart3($neworder,$dir);
echo"<br>";
*/

trickfn($neworder,$dir);
function trickfn($neworder,$dir){
    $btnpt1 = isset($_POST['btn1']);
    $btnpt2 = isset($_POST['btn2']);
    $btnpt3 = isset($_POST['btn3']);
    $newrand = array();
    $newrand = $neworder;
    $newgroup = array();
    $newpt1 = array();
    $newpt2 = array();
    $newpt3 = array();
    $count=0;
    if($count<3){
    if($btnpt1){
       $newpt1= getpart1($newrand);
       $newpt2= getpart2($newrand);
       $newpt3 = getpart3($newrand);
       $newrand = array_merge($newpt3,$newpt1,$newpt2);
       $newgroup = groups($newrand);
       foreach($newgroup as $nr){
 echo "<img src='".$dir.'/'.$nr."'>";
}
echo "<br>";
       $count++;    
    }   
    if($btnpt2){
       $newpt1= getpart1($newrand);
       $newpt2= getpart2($newrand);
       $newpt3 = getpart3($newrand);
       $newrand = array_merge($newpt1,$newpt2,$newpt3);
       $newgroup = groups($newrand);
       $count++;
    }
    if($btnpt3){
       $newpt1= getpart1($newrand);
       $newpt2= getpart2($newrand);
       $newpt3 = getpart3($newrand);
       $newrand = array_merge($newpt3,$newpt1,$newpt2);
       $newgroup = groups($newrand);
       $count++;
    }
    }   
}
function getmiddle(){
    
}
function getpart1($neworder){
    $pt1 = array();
for($i=0;$i<7;$i++){
   $pt1[]=$neworder[$i];
}
return $pt1;
}

function getpart2($neworder){
$pt2 = array();
for($i=7;$i<14;$i++){
    $pt2[]=$neworder[$i];
}
return $pt2;
}

function getpart3($neworder){
    $pt3 = array();
for($i=14;$i<21;$i++){
    $pt3[]=$neworder[$i];
}
return $pt3;
}

function groups($rad){
    $total = array();
    $part1= array($rad[0],$rad[3],$rad[6],$rad[9],$rad[12],$rad[15],$rad[18]);
    $part2= array($rad[1],$rad[4],$rad[7],$rad[10],$rad[13],$rad[16],$rad[19]);
    $part3= array($rad[2],$rad[5],$rad[8],$rad[11],$rad[14],$rad[17],$rad[20]);
    $total = array_merge($part1,$part2,$part3);    
    //echo "<img src='".$dir.'/'.$part2[3]."'>";
    return $total;
   //echo"<input type='submit' name='btn1 value='Select'/>";
}
//generate 7 cards 
function selectcards($cards){
    shuffle($cards);
    $selected = array();
        for($i=0;$i<7;$i++){
   $selected[] = $cards[$i];
}
return $selected;
}

//randomly select 21 cards - Function.
function randomimage($directory) {
	$total = 0;
	$imagelist = array();
 
	//Grab all files in directory for checking and process
	$dir = opendir ($directory);
	while (false !== ($file = readdir($dir))) {
		if (preg_match("/^.*\.(jpg|bmp|jpeg|png|gif)$/i", $file)) { //Use a regular expressions to get extention. Only process jpg/jpeg/bmp/png/gif files.
			$imagelist[] = $file;
		}
	}
      shuffle($imagelist);
        return array_slice($imagelist,0,21);
}      
?>

<html>
    <header>
        
    </header>
    <body>  
        <title>Magic World</title>
        <div>
            <p><b>Welcome to MagiCardLand</b></p>                   
        </div>
        <div id="magicmenu">
            <ul>
                <li><a href="">Into your mind</a></li>
                <li><a href="">Get rid off my eyes</a></li>
            </ul>
        </div>
        <div>
            <form method="post" action="">
            <input type="submit" name ="btn1" value="Part1">
             <input type="submit" name ="btn2" value="Part2">
              <input type="submit" name ="btn3" value="Part3">
            </form>
        </div>
    </body>
    
</html>