<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/header.php';
include_once "../classes/exam.php";
$exm = new exam();

?>

    <!-- This is the page where admin will add qustions,options and right answer in the form -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Question_No = $_POST['quesNo'];

    $Questions = $_POST['ques'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];

    $Right_Options = $_POST['rightAns'];
    if ($exm->AddQuestions($_POST)) {
    }
}
//Get Total questions entered so far
$total = $exm->getTotalRows();
$next = $total + 1;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Questions</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>
    <div class="wrapper">
        <br>
        <div id="formContent">
            <form action="" method="post" class="form-control">
                <h2>Add Question</h2>
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <h5>Question Number:</h5>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="number" value="<?php if (isset($next)) {
                                                            echo $next;
                                                        }
                                                        ?>" name="quesNo" class="form-control" class="custom-select" required="1" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ques" placeholder="Enter Question..." class="form-control" required="1" /></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="ans1" placeholder="Enter Option 1..." class="form-control" required="1" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ans2" placeholder="Enter Option 2..." class="form-control" required="1" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ans3" placeholder="Enter Option 3..." class="form-control" required="1" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="ans4" placeholder="Enter Option 4..." class="form-control" required="1" /></td>
                    </tr>
                    </tr>
                    <tr>
                        <td><input type="number" name="rightAns" placeholder="Give Right Option No" class="form-control" required="1" /></td>
                    </tr>

                </table>
                <input class="btn btn-primary" type="submit" value="Add a Question" required="">
            </form>
        </div>
    </div>
</body>
<?php include 'inc/footer.php'; ?>

</html>