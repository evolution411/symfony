<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
 
                       
function getrandom($rad){
    $random=array();
    for($i=0;$i<count($rad);$i++)
    {
        
        $random[]=$rad[$i];
    }
    return $random;
}

function selectcards($cards){
    shuffle($cards);
    $selected = array();
        for($i=0;$i<7;$i++){
   $selected[] = $cards[$i];
}
return $selected;
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
?>
