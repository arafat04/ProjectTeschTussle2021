<?php
include 'header.php';
Session::checkSession();
include_once("studentValidation.php");
$st = new StudentValid();
$question = $st->getQueByRandom();
?>
<div class="wrapper">
    <div id="formContent">
        <h3 style="text-align:center">Your Score: <?php
                                                    if (isset($_SESSION['score'])) {
                                                        echo $_SESSION['score'];
                                                        unset($_SESSION['score']);
                                                    }
                                                    ?></h3>
        <h4 style="text-align:center"><a href="viewans.php">View Answer of your Exam</a></h4>
        <h4 style="text-align:center"><a href="exam.php">Start Again</a></h4>
    </div>

</div>
<?php include 'incl/gfooter.php'; ?>