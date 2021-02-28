<?php

include_once "../lib/Database.php";
include_once "../helpers/Format.php";

// This is the main class for performing all the CRUD operations and connecting via Database object for performing all the
// CRUD operations.

class exam
{

	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	//Add Questions starts here
	public function AddQuestions($data)
	{
		$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques = mysqli_real_escape_string($this->db->link, $data['ques']);
		$ans = array();
		$ans[1] = $data['ans1'];
		$ans[2] = $data['ans2'];
		$ans[3] = $data['ans3'];
		$ans[4] = $data['ans4'];
		$rightAns = $data['rightAns'];

		$query = "INSERT into tbl_ques(quesNo,ques) values ('$quesNo','$ques')";
		$insert_row = $this->db->insert($query);

		if ($insert_row) {
			foreach ($ans as $key => $Options) {
				if ($Options != '') {
					if ($rightAns == $key) {
						$rquery = "insert into tbl_ans(quesNo,rightAns,ans) values ('$quesNo','1','$Options')";
					} else {
						$rquery = "insert into tbl_ans(quesNo,rightAns,ans) values ('$quesNo','0','$Options')";
					}
					$insertrow = $this->db->insert($rquery);
					if ($insertrow) {
						continue;
					} else {
						die('Error...');
					}
				}
			}

			//after foreach loop
			$msg = "<span class='success'>Question Added Successfully</span>";
			return $msg;
		}
	}

	//Add Questions ends here
	public function getQueByOrder()
	{
		$query = "SELECT * from  tbl_ques ";
		$result = $this->db->select($query);

		return $result;
	}
	// Showing All questions for Admin ends here

	//This function will return all the answers from Q_All_Options starts here.
	public function getAnswer($number)
	{
		$query = "Select * FROM Q_All_Options where Question_No='$number'";
		$result = $this->db->select($query);

		return $result;
	}

	//This function will return all the answers from Q_All_Options ends here

	// Showing quetions to students starts here
	public function getQueByRandom()
	{
		header("refresh:");
		$query = "Select * FROM tbl_ques  order by RAND() limit 5";
		$result = $this->db->select($query);

		return $result;
	}
	// Showing  quetions to students ends here

	//Admin delete question by individual Question_No starts here

	public function delQuestion($Question_No)
	{
		$tables = array("tbl_ques", "tbl_ans");
		foreach ($tables as $table) {
			$delquery = "Delete FROM $table WHERE quesNo='$Question_No'";
			$deldata = $this->db->delete($delquery);
		}
		if ($deldata) {
			$msg = "<span >Question Deleted Successfully</span>";
			return $msg;
		} else {
			$msg = "<span >Question Not Deleted</span>";
			return $msg;
		}
	}
	//Admin delete question by individual Question_No ends here

	//When Admin will add question, he will see how many rows entered so far starts here..

	public function getTotalRows()
	{
		$query = "Select * FROM tbl_ques";
		$totalRows = $this->db->select($query);
		$total = $totalRows->num_rows;
		return $total;
	}
	//When Admin will add question, he will see how many rows entered so far ends here..

}
