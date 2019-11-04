<?php
include_once('class.operations.php');
session_start();
$obj6 = new operations();

$title = $_POST['title'];
$college = $_POST['college'];
$skills = array();

if(isset($_POST['java']))
    array_push($skills, 'java');

if(isset($_POST['c']))
    array_push($skills, 'c');

if(isset($_POST['js']))
    array_push($skills, 'javascript');

if(isset($_POST['nodejs']))
    array_push($skills, 'noidejs');

if(isset($_POST['reactjs']))
    array_push($skills, 'reactjs');

if(isset($_POST['ml']))
    array_push($skills, 'ml');

if(isset($_POST['php']))
    array_push($skills, 'php');

if(isset($_POST['sql']))
    array_push($skills, 'sql');

if(isset($_POST['regex']))
    array_push($skills, 'regex');
    
if(isset($_POST['swift']))
    array_push($skills, 'swift');

if(isset($_POST['android']))
    array_push($skills, 'android');

if(isset($_POST['ios']))
    array_push($skills, 'ios');

$_SESSION['searchResults'] =  $obj6->searchResults($title, $college, $skills);
header('Location:Dashboard.php');
?>