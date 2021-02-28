<?php
include_once "lib/Session.php";
Session::init();
include_once "db.php";
include_once "helpers/Format.php";
$db = new Database();
$fm = new Format();

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="gcss/main.css">
    <link rel="stylesheet" href="gcss/login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <!-- user logout -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        Session::destroy();
        header("Location:index.php");
        exit();
    }
    ?>
    <title>Online Exam System</title>
    <header>
        <nav class="navbar navbar-expand-lg smart-scroll navbar-light bg-primary w-100 p-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        $login = Session::get("login");
                        if ($login) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="exam.php">Exam</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="?action=logout">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="index.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="register.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admin/login.php">Admin?</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php
            $login = Session::get("login");
            if ($login) {
            ?>
                <button type="button" class="btn btn-dark">
                    <?php echo Session::get("name"); ?>
                </button>
            <?php } ?>
        </nav>
    </header>
    <script src="jquery.js"></script>
    <script src="main.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>