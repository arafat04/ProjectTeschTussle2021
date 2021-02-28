<?php include_once "header.php"; ?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="" method="post">
            <p class="h1">
            <h2>User Registration</h2>
            </p>
            <input type="text" name="name" id="name" placeholder="Your Name">
            <input type="text" name="email" id="email" placeholder="Your Email">
            <input type="password" name="password" id="password" placeholder="Give Password">
            <input class="fadeIn fourth" type="submit" id="regSubmit" value="Signup">
            <div class="toggle-form">
                <span class="text">Already Registered?</span>
            </div>
            <a class="form-toggle btn btn-light" href="index.php">Login</a>
            <!-- these divs below will show all the validation messages while registering. -->
            <div class="empty alert alert-danger" role="alert" style="display:none ">
                <p>Field must Not be Empty!!!</p>
            </div>
            <div class="validemail alert alert-danger" role="alert" style="display:none ">
                <p>Give a valid Email ID!!!!</p>
            </div>
            <div class="passNotMatch alert alert-danger" role="alert" style="display:none ">
                <p>Password Not Matched!!!!</p>
            </div>
            <div class="exists alert alert-danger" role="alert" style="display:none ">
                <p>Email already Exists!!!</p>
            </div>
            <div class="success alert alert-success" role="alert" style="display:none ">
                <p>Registration Successfull!!!</p>
            </div>
            <div class="failed alert alert-danger" role="alert" style="display:none ">
                <p>Registration Failed!!!</p>
            </div>

        </form>
    </div>
</div>
<?php include 'incl/gfooter.php'; ?>