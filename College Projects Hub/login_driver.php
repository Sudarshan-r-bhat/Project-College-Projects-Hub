<?php
session_start();
// session variables are username(main page), searchResults(search_driver), title(proj_description_driver).
// general_title(general proj description driver)

$_SESSION['searchResults'] = array('go ahead and search!');
include_once('class.operations.php');

$obj0 = new operations();
$username = $_POST['username'];
$password = $_POST['password'];
$valid = $obj0->validate($username, $password);


if($valid)
{  
    $_SESSION['username'] = $username;
    header("Location:Main_page.php");
}
else
{
    session_destroy();
    include("login_page.php");//if the credentials are wrong you are directed back to the same page.
}

?>