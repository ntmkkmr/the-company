<?php

include '../classes/User.php';

session_start();

$user_id = $_SESSION['user_id'];
$filename = $_FILES['photo']['name']; //['photo']はinput type のname。actual filenmae
$temp_name = $_FILES['photo']['tmp_name'];//temporary destination of an uploaded file
                                        //temporary folder of xampp(server)
$user = new User;
$user->uploadPhoto($user_id, $filename, $temp_name);0


?>