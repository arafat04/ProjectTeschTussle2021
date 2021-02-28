<?php
include_once "header.php";
include_once("studentValidation.php");
$st = new StudentValid();

?>
<div class="wrapper">
    <div id="formContent">
        <form class="form-control" action="" method="post">
            <h2 style="text-align:center">Reset password</h2>
            <div class="form-group">
                <label>Reset password</label>
                <input class="form-control type=" password" name="newPass">
            </div>
            <div class="form-group">
                <label>Confirm new password</label>
                <input class="form-control type=" password" name="newPassConfirm">
            </div>
            <div class="form-group">
                <label>Give token sent to your email</label>
                <input class="form-control type=" text" name="token">
            </div>
            <div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $reset = $st->resetPassword($_POST);
                    if ($reset) {
                        echo "<span style='color:red'>" . $reset . "</span>";
                    }
                }
                ?>
                <div class="form-group">
                    <button type="submit" name="new_password" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("incl/gfooter.php"); ?>