<?php
include 'header.php';
Session::checkSession();
$userid = Session::get("userid");

include_once "studentValidation.php";
$st = new StudentValid();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updateUser = $st->updateUser($userid, $_POST);
}
?>

<div class="wrapper">
    <div id="formContent">
        <!-- this will show who's profile is being showed -->
        <span class="h2" style="text-align:center"><?php
                                                    $login = Session::get("login");
                                                    if ($login) {
                                                    ?>
                <h2><?php echo Session::get("name") . "'s Profile:"; ?> </h2>
            <?php } ?>
        </span>

        <form action="" method="post">
            <!-- For getting Profile info -->
            <?php
            $getData = $st->getUserData($userid);
            if ($getData) {
                $result = $getData->fetch_assoc();
            ?>

                <input type="text" name="name" value="<?php echo $result['name'] ?>">


                <input type="text" name="email" value="<?php echo $result['email'] ?>">

                <input type="submit" name="update" value="Update Profile " />


            <?php } ?>
            <div>
                <?php
                if (isset($updateUser)) {
                    echo  $updateUser;
                }
                ?>
            </div>
        </form>
    </div>
</div>

<?php include 'incl/gfooter.php'; ?>