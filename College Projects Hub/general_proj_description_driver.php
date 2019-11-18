<?php
session_start();
$_SESSION['general_title'] = $_POST['general_title'];
header('Location:general_proj_description.php');
exit();
?>