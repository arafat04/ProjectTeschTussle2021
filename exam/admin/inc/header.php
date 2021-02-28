<?php
include_once "../lib/Session.php";
Session::checkAdminSession();
include_once "../lib/Database.php";
include_once "../helpers/Format.php";

$db = new Database();
$fm = new Format();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../gcss/login.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Admin</title>
</head>

<body>
    <div>

        <?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
    header("Location:login.php");
    exit();
}
?>
    </div>


    <header>
        <nav class="navbar navbar-expand-lg smart-scroll navbar-light bg-primary w-100 p-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="users.php">Manage user</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link text-white" href="quesadd.php">Add Ques</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="queslist.php">Ques List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="?action=logout">Logout</a>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>

    </header>
    <script src="jquery.js"></script>
    <script src="main.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>