<?php
session_start();
include_once('class.operations.php');

$obj3 = new operations();
$title = $_POST['title'];
$description = $_POST['description'];
$projectId = $_SESSION['username'].rand(10, 100);   
// below function will add the new project.
$added = $obj3->addNewProject($_SESSION['username'], $title, $description, $projectId);
// this is to redirect to main page.
if($added)
    header('Location:Main_Page.php');

?>