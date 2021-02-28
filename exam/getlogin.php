<?php
include_once("studentValidation.php");
$st = new StudentValid();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $userlogin = $st->userLogin($email, $password);
}
