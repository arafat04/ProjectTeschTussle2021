<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/header.php';
include_once("../classes/Admin.php");
$ad = new Admin();
?>
<div class="wrapper">
    <div id="formContent">
        <form action="" method="post">
            <p class="h1">
            <h1>Add a new Admin</h1>
            </p>
            <input class="form-control form-control-lg" name="adminUser" type="text" required placeholder="Admin User Name">

            <input class="form-control form-control-lg" name="admin_Email" type="text" required placeholder="Email">
            <input class="form-control form-control-lg" name="adminPass" type="password" required placeholder="Password">

            <input class="btn btn-primary" type="submit" id="addAdmin" value="Add a new Admin">
            <div>
                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $addAdmin = $ad->addAdmin($_POST);
                }
                ?>
            </div>
        </form>

    </div>
</div>
<?php include 'inc/footer.php'; ?>