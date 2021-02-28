<?php
include 'header.php';
Session::checkSession();
include_once("studentValidation.php");
$st = new StudentValid();
$question = $st->getQueByRandom();
?>
<div class="container">
	<p class="h1" style="text-align:center">Give an Exam</p>
	<div class="position-absolute top-50 start-50 translate-middle">
		<button type="button" class="btn btn-primary btn-sm ">
			<!-- For getting from which question no the exam is starting -->
			<?php
			if ($question) {
				$value = $question->fetch_assoc();
			}
			?>
			<a class="text-white" class="" href="starttest.php?q=<?php echo $value['quesNo'] ?>">Start Now</a>
		</button>
	</div>
</div>
<div class="content-wrapper main-container" style="min-height:680px"></div>
<?php include 'incl/gfooter.php'; ?>