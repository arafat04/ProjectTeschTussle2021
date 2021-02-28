<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/loginheader.php';
include_once "../classes/Admin.php";
$ad = new Admin();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminData = $ad->getAdminData($_POST);
}
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <form action="" method="post">
            <p class="h1">
            <h2>Admin Login</h2>
            </p>
            <input class="fadeIn second" type="text" name="adminUser" required placeholder="Username" />
            <input class="fadeIn third" type="password" name="adminPass" required placeholder="Password" />
            <input class="fadeIn fourth" type="submit" name="login" value="Login" />
            <div>
                <?php
                if (isset($adminData)) {
                    echo $adminData;
                }
                ?>
            </div>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>