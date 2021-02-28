<?php include 'header.php'; ?>

<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h6 style="text-align:center">
            We sent an email to <b><?php echo $_SESSION['forgotemail'] ?></b> to help you recover your account.
        </h6>
        <h6 style="text-align:center">Please login into your email account and click on the link we sent to reset your
            password</h6>
        <h6 style="text-align:center"><a href="new_pass.php">Reset your password</a></h6>
    </div>
</div>

<div class="content-wrapper main-container" style="min-height:800px"> </div>
<?php include_once 'incl/gfooter.php'; ?>