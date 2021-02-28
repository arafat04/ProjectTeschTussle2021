<?php
include 'header.php';
Session::checkSession();
include_once("studentValidation.php");
include_once("Process.php");
$st = new StudentValid();
$pro = new Process();
if (isset($_GET['q'])) {
    $number = (int)$_GET['q'];
} else {
    header("Location:exam.php");
}
include_once("studentValidation.php");
$st = new StudentValid();
//getting the qustion by question id
$question = $st->getQuesByNumber($number);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $process = $pro->processData($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=submit] {
            background-color: #56baed;
            color: white;
            padding: 12px 20px;
            font-size: 13px;
            border: none;

            margin: auto;
            cursor: pointer;
            -webkit-appearance: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form method="post" action="">
                <table>
                    <tr>
                        <td>
                            <h4><?php echo $question['quesNo'] . ". " ?><?php echo $question['ques'] ?></h4>
                        </td>
                    </tr>
                    <!-- for showing the options for individual question -->
                    <?php
                    $answer = $st->getAnswer($number);
                    if ($answer) {
                        while ($result = $answer->fetch_assoc()) {
                    ?>
                            <tr>
                                <td>
                                    <input type="radio" name="ans" value="<?php echo $result['id']; ?>">
                                    <?php echo $result['ans']; ?>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                    <br>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Next Question" />
                            <input type="hidden" name="number" value="<?php echo $number; ?>" />
                        </td>
                    </tr>
                </table>
        </div>
    </div>
    <div class="content-wrapper main-container" style="min-height:780px">
    </div>
</body>

</html>
<?php include 'incl/gfooter.php'; ?>