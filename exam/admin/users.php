<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/header.php';
include_once $filepath . '/../classes/User.php';
$usr = new User();
?>

<?php
//this php block will provide disable,enable and delete users for an admin
if (isset($_GET['dis'])) {
    $dblid = (int) $_GET['dis'];
    $dblUser = $usr->DisableUser($dblid);
}
if (isset($_GET['ena'])) {
    $eblid = (int) $_GET['ena'];
    $eblUser = $usr->EnableUser($eblid);
}
if (isset($_GET['del'])) {
    $delid = (int) $_GET['del'];
    $delUser = $usr->DeleteUser($delid);
}
?>

<div class="container">

    <?php
    if (isset($dblUser)) {
        echo $dblUser;
    }
    if (isset($eblUser)) {
        echo $eblUser;
    }
    if (isset($delUser)) {
        echo $delUser;
    }
    ?>

    <div class="container">
        <h1>Admin Panel - Manage User</h1>
        <table class="table table-striped table-hover">
            <tr>
                <th scope="row">No</th>
                <th scope="row">Name</th>

                <th scope="row">Email</th>
                <th scope="row">Action</th>
            </tr>
            <?php
            $userData = $usr->getAllUser();
            if ($userData) {
                $i = 0;
                while ($result = $userData->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td>
                            <?php
                            if ($result['status'] == '1') {
                                echo "<span class='error'>" . $i . "</span>";
                            } else {
                                echo $i;
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($result['status'] == '1') {
                                echo "<span class='error'>" . $result['name'] . "</span>";
                            } else {
                                echo $result['name'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($result['status'] == '1') {
                                echo "<span class='error'>" . $result['email'] . "</span>";
                            } else {
                                echo $result['email'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($result['status'] == '0') { ?>
                                <a onclick="return confirm('Disable User?')" href="?dis=<?php echo $result['userid']; ?>">Disable</a>
                            <?php } else { ?>
                                <a onclick="return confirm('Enable User?')" href="?ena=<?php echo $result['userid']; ?>">Enable</a>
                            <?php } ?>
                            ||
                            <a onclick="return confirm('Remove User?')" href="?del=<?php echo $result['userid']; ?>">Remove</a>
                        </td>
                    </tr>
            <?php }
            } ?>
        </table>
    </div>
</div>
<div class="content-wrapper main-container" style="min-height:780px">

</div>
<?php include 'inc/footer.php'; ?>