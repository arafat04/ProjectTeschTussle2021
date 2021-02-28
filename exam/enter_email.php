<?php
include 'header.php';
include_once("studentValidation.php");
$st = new StudentValid();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkEmail = $st->checkEmail($_POST);
    if ($checkEmail) {
        $email = $checkEmail->fetch_assoc();
        $_SESSION['forgotemail'] = $email['email'];
        $email = $email['email'];
        $confirm = $st->sendEmailToResetPassword($email);
    }
}
?>
<div class="wrapper">
    <div id="formContent">
        <form class="login-form" action="enter_email.php" method="post">
            <h2 class="form-title">Reset password</h2>
            <div class="form-group form-control-lg">
                <label>Your email address</label>
                <input type="email" name="email">
            </div>
            <div class="form-group form-control-lg">
                <button class="btn btn-primary" type="submit" name="reset-password" class="login-btn">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once("incl/gfooter.php");
?>