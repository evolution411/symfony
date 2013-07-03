<?php
require_once 'connect.php';
 include_once 'functions.php';
if(isset($_POST['submit'])){
    
    $type = $_POST['pub_type'];
    $year = $_POST['pub_date'];
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $school = $_POST['school'];
    getinfo($type, $year,$fn,$ln,$school);
    
    //echo $result[1];
    
}

?>
