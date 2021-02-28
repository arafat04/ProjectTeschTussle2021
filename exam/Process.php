<?php
// this file will validate the given informations provided for login for the students.

$filepath = realpath(dirname(__FILE__));
include_once("lib/Session.php");
// Session:: init();
include_once("db.php");
include_once("helpers/Format.php");

class Process
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // for validating the answers when user will give an exam
    public function processData($data)
    {
        $selectedAns = $this->fm->validation($data['ans']);
        $number = $this->fm->validation($data['number']);
        $selectedAns = mysqli_real_escape_string($this->db->link, $data['ans']);
        $number = mysqli_real_escape_string($this->db->link, $data['number']);
        $next = $number + 1;
        if (!isset($_SESSION['score'])) {
            $_SESSION['score'] = '0';
        }
        $total = $this->getTotal();
        $right = $this->rightAns($number);
        if ($right == $selectedAns) {
            $_SESSION['score']++;
        }
        if ($number == $total) {
            header("Location: final.php");
            exit();
        } else {
            header("Location: starttest.php?q=" . $next);
        }
    }

    // function for how many question in the database
    public function getTotal()
    {
        $query = "SELECT * FROM tbl_ques";
        $totalRows = $this->db->select($query);
        $total = $totalRows->num_rows;
        return $total;
    }

    // function for checking right choice for an individual question
    private function rightAns($number)
    {
        $query = "SELECT * FROM tbl_ans where quesNo='$number' AND  rightAns = '1' ";
        $res = $this->db->select($query)->fetch_assoc();
        $result = $res['id'];
        return $result;
    }
}
