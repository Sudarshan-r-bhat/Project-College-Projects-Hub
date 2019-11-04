<?php 
session_start();
include_once('class.operations.php');
$obj = new operations();

if(isset($_POST['newSkill']))
    $obj->addSkill($_SESSION['username'], $_POST['skill']); 
header('Location:Main_Page.php');
?>