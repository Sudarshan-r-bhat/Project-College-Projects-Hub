<?php
include_once("class.operations.php");
$obj0 = new operations();
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$email_id = $_POST['email_id'];
$address = $_POST['address'];
$college = $_POST['college'];
$reg_success = '';

$unique = $obj0->checkUsername($username);
if($unique)
    $reg_success = $obj0->registration($username, $password, $phone, $email_id, $address, $college);
if($reg_success)
{
    include('login_page.php');
    echo ''.$reg_success;
}
    
else
{
    include('register_page.php');
    echo ' there is a problem'.$reg_success.$unique;
}
?>