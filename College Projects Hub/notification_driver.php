<?php
include_once('class.operations.php');
$obj7 = new operations();
if(isset($_POST['accept']))
{
    $obj7->accepted($_POST['fromUser']);
}
    
else if(isset($_POST['reject']))
{
    $obj7->rejected($_POST['fromUser']);
}
    


header('Location:notifications.php');
exit;
?>