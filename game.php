<?php
session_start();
$submit = isset($_POST['submit']);
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$email = $_POST['email'];
if($submit){
    $ck = checkinput($fn,$ln,$email);   
    if($ck==true){
        saveinfo($fn,$ln,$email);
        $_SESSION['name']=$fn;
        $_SESSION['email']=$email;
        header('location:testme.php');
    }
}
function checkinput($fn,$ln,$email){
    if($fn==''||$ln==''||$email==''){
        echo"Please Fill up <b>All</b> Fields";
    }
    else{
       if(!(ctype_alpha($fn)&& ctype_alpha($ln))){
           echo "Your name must be all Aphabetic Characters!";
       }
       else {
           $foo=false;
          $foo = checkemail($email);
          return $foo;
       }
    }
       }
function checkemail($email){
    $foo = false;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $foo=true;
}
else{
   echo "Invalid email.";
}
return $foo;
}
function saveinfo($fn,$ln,$email){
    require_once 'connect.php';
    $query = "insert into user (firstname,lastname,email) values('$fn','$ln','$email')";
    mysql_query($query);
}
?>
