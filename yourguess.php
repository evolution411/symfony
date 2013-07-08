<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$rand = $_SESSION['newrand3'];
$dir = "images/cards";
require_once 'magicfun.php';
//$neworder = array();
//$neworder=groups($rand);

 echo "<img src='".$dir.'/'.$rand[10]."'>";
 echo "<a href='magicfront.php'>Play Again</a>";
?>
