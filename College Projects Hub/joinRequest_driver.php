<?php
    include_once('class.operations.php');
    $obj8 = new operations();
    $username = $_POST['username'];
    $title = $_POST['title'];
    $obj8->MakeJoinRequest($username, $title);
    echo 'Requested successfully!, you will be notified if youre request is accepted.';

?>