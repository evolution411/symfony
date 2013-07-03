<?php
$dir = "images/cards";
$image = array();
$image = randomimage($dir);
//echo $image;
$rad1=array();

//randomly select 21 cards from card deck.--function call
$rad=randomimage($dir);
shuffle($rad);


foreach($rad as $img){
 //echo "<td><img src='".$dir.'/'.$img."'>";
}
echo "<br>";
$seven = array();

//generate 7 cards function call.
$seven = selectcards($rad);
foreach($seven as $s){
 echo "<img src='".$dir.'/'.$s."'>";
}
echo "<br>";
echo "<img src='".$dir.'/'.$rad[19]."'>";
$neworder = array();
$neworder=groups($rad);
echo"<br>";
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

function getpart1($neworder,$dir){
for($i=0;$i<7;$i++){
    echo "<img src='".$dir.'/'.$neworder[$i]."'>";
}
echo "<input type='submit' name='btn1' value='Yes'/>";
//echo "<img src='".$dir.'/'.$neworder[10]."'>";
}

function getpart2($neworder,$dir){
    $submit= isset($_POST['submit']);
    if($submit){
        echo"group 2 is selected";
        
    }
for($i=7;$i<14;$i++){
    echo "<img src='".$dir.'/'.$neworder[$i]."'>";
}
echo "<input type='submit' name='btn2' value='Yes'/>";
//echo "<img src='".$dir.'/'.$neworder[10]."'>";
}
function getpart3($neworder,$dir){
for($i=14;$i<21;$i++){
    echo "<img src='".$dir.'/'.$neworder[$i]."'>";
}
echo "<input type='submit' name='btn3' value='Yes'/>";
//echo "<img src='".$dir.'/'.$neworder[10]."'>";
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
    </body>
    
</html>