<?php
include 'header.php';
include_once("studentValidation.php");
$st = new StudentValid();
?>

<div class="wrapper">
    <div id="formContent">
        <h3>Answers</h3>
        <?php
        $getData = $st->getQueByRandom();
        if ($getData) {
            $i = 0;
            while ($value = $getData->fetch_assoc()) {
                $i++;

        ?>
                <tr>
                    <td><?php echo $i; ?>.</td>
                    <td><?php echo $value['ques'] ?></td>
                    <br>
                    <!-- this php block will catch all the options for a individual random question. -->
                    <?php
                    $number = $value['quesNo'];
                    $answer = $st->getAnswer($number);
                    if ($answer) {
                        while ($result = $answer->fetch_assoc()) {

                    ?>
                <tr>
                    <td>
                        <input type="radio" name="ans" />
                        <?php
                            if ($result['rightAns'] == '1') {
                                echo "<span style = 'color:red'> " . $result['ans'] . "</span>";
                            } else {
                                echo " " . $result['ans'];
                            }
                        ?>
                    </td>
                    <br>
                </tr>
        <?php }
                    } ?>

        <br>
        </tr>
<?php }
        } ?>
    </div>
</div>

<?php include 'incl/gfooter.php'; ?>