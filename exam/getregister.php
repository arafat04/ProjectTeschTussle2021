<?php
include_once("studentValidation.php");
$st = new StudentValid();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
  
    $userregi  = $st->userRegistration($name, $email, $password);
}
