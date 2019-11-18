<?php
include_once('class.operations.php');
$obj = new operations();
$username = $_POST['username'];
$message = $_POST['message'];
// i will send the message and inReturn i should be getting the entire message inbox from
//the database.
$messageHistory = $obj->postChat($username, $message);
$result = explode('--', $messageHistory);
echo '<br>';
foreach($result as $r)
{
    echo $r.'<br>';
}

//the echo statement will be fetched by the jquery.
?>