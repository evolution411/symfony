<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$duixiang = $_SESSION['duixiang'];
$know = $_GET["know"];
if($know=='yes'){
    echo"Your message is delivered to".$duixiang;
}
else{
    echo $duixiang." will never know your secrete.";
}
?>
