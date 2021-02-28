<?php
include 'header.php';
Session::checkLogin();
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="" method="post">
            <p class="h1">
            <h2>Online Exam System - User Login</h2>
            </p>
            <input class="fadeIn second" name="email" id="email" type="text" placeholder="Email">
            <input class="fadeIn third" name="password" id="password" type="password" placeholder="Password">
            <input class="fadeIn fourth" type="submit" id="loginsubmit" value="Login">
            <div class="toggle-form">
                <span class="text">New User? </span>
                <a class="form-toggle btn btn-light" href="register.php">Signup</a> Here
            </div>
            <p><a class="form-toggle btn btn-light" href="enter_email.php">Forgot your password?</a></p>

            <!-- the div below will show all the validation messages while logging. -->
            <div class="empty alert alert-danger" role="alert" style="display:none ">
                <p>Field must Not be Empty!!!</p>
            </div>
            <div class="error alert alert-danger" role="alert" style="display:none ">
                <p>Email or Password not matched!!!</p>
            </div>
            <div class="disable alert alert-danger" role="alert" style="display:none ">
                <p>You can not login. Your account has been disabled!!!</p>
            </div>
        </form>
    </div>
</div>
<?php include 'incl/gfooter.php'; ?>