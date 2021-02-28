<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/inc/header.php';
include_once "../classes/Exam.php";
$exm = new exam();
?>



<!-- Admin Question list view starts here -->
<!-- Delete question perform for Admin starts here -->
<?php

if (isset($_GET['delque'])) {
    $QuestionNo = (int) $_GET['delque'];
    $delQue = $exm->delQuestion($QuestionNo);
}
?>
<div class="container">
    <h1 align="center">Admin's Questions View</h1>
    <?php
    if (isset($delQue)) {
        echo $delQue;
    }
    ?>
    <div class="quelist" align="center">
        <table class="table table-striped">
            <tr>
                <th>NO</th>
                <th>Questions</th>
                <th>Delete</th>
            </tr>
            <!-- this block of php will get all the questions entered so far by admin -->
            <?php
            $getData = $exm->getQueByOrder();
            if ($getData) {
                $i = 0;
                while ($value = $getData->fetch_assoc()) {
                    $i++;

            ?>
                    <tr>
                        <td><?php echo $i; ?></td>

                        <td><?php echo $value['ques'] ?></td>
                        <td>
                            <a onclick="return confirm('The question will be deleted!!!')" href="?delque=<?php echo $value['quesNo']; ?>">Remove</a>
                        </td>
                    </tr>
            <?php }
            } ?>
        </table>

    </div>
</div>
<div class="content-wrapper main-container" style="min-height:680px">

</div>
<?php include 'inc/footer.php'; ?>
<!-- Admin Question list view and delete option ends here -->