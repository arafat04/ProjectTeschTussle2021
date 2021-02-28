<?php
include_once "lib/Session.php";
include_once "db.php";
include_once "helpers/Format.php";
class StudentValid
{
    public $exam_name;
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function userRegistration($name, $email, $password)
    {
        $name = $this->fm->validation($name);
        $email = $this->fm->validation($email);
        $password = $this->fm->validation($password);
        // $cpassword =$this->fm->validation($cpassword);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $email = mysqli_real_escape_string($this->db->link, $email);
        if ($name == "" || $email == "" || $password == "") {
            echo "empty";
            exit();
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "validemail";
            exit();
        } else {
            $chkquery = "SELECT * FROM tbl_user  WHERE email = '$email'";
            $chkresult = $this->db->select($chkquery);
            if ($chkresult != false) {
                echo "exists";
                exit();
            } else {
                $password = mysqli_real_escape_string($this->db->link, md5($password));
                $query = "INSERT INTO tbl_user(name,password,email) VALUES ('$name','$password','$email')";
                $insert_row = $this->db->insert($query);
                if ($insert_row) {
                    echo "success";
                    exit();
                } else {
                    echo "failed";
                    exit();
                }
            }
        }
    }
    public function userLogin($email, $password)
    {
        $email = $this->fm->validation($email);
        $password = $this->fm->validation($password);
        $email = mysqli_real_escape_string($this->db->link, $email);

        if ($email == "" || $password == "") {
            echo "empty";
            // echo "<span class = 'error'>Fields must not empty</span>";
            exit();
        } else {
            $password = mysqli_real_escape_string($this->db->link, md5($password));
            $query = "SELECT * FROM tbl_user  WHERE email = '$email' AND password ='$password'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                if ($value['status'] == '1') {
                    echo "disable";
                    exit();
                } else {
                    Session::init();
                    Session::set("login", true);
                    Session::set("userid", $value['userid']);
                    Session::set("name", $value['name']);
                }
            } else {
                echo "error";
                exit();
            }
        }
    }


    // Forgot Password Functionalities Starts HERE

    public function checkEmail($data)
    {
        $email = $this->fm->validation($data['email']);
        $query = "SELECT * FROM tbl_user  WHERE email = '$email'";
        $result = $this->db->select($query);
        return $result;
    }
    //For sending email for resetting password
    public function sendEmailToResetPassword($email)
    {
        $email = $this->fm->validation($email);
        $token = bin2hex(random_bytes(50));
        $query = "INSERT INTO password_resets(email,token) VALUES ('$email','$token')";
        $insert_row = $this->db->insert($query);
        if ($insert_row) {
            $to = $email;
            $subject = "Reset your password on Online Examination System";
            $msg = "Hi there, use this token to reset your password: " . $token . "";

            $headers = "From: arafatrahman04@gmail.com";
            if (mail($to, $subject, $msg, $headers)) {
                header('location: pending.php?email=' . $email);
            } else {
                echo "Email sending failed";
            }
        }
    }
    //function that will reset password for individual user
    public function resetPassword($data)
    {
        $newPass = $this->fm->validation($data['newPass']);
        $newPassConfirm = $this->fm->validation($data['newPassConfirm']);
        $token = $this->fm->validation($data['token']);
        if ($newPass === $newPassConfirm && $newPass != "") {
            $user = $_SESSION['forgotemail'];
            $newPass = mysqli_real_escape_string($this->db->link, md5($newPass));
            $sql = "SELECT * from password_resets WHERE email = '$user'";
            $result = $this->db->select($sql)->fetch_assoc();

            if ($result['token'] === $token) {
                $del = "DELETE FROM password_resets WHERE token = '$token' ";
                $query = "UPDATE tbl_user SET password ='$newPass' WHERE email = '$user'";
                $insert_row = $this->db->insert($query);
                if ($insert_row) {
                    echo "Your Password has been updated!!!";
                    $_SESSION['forgotemail'] = "";
                } else {
                    echo "password reset failed";
                }
            } else {
                echo "token not matched";
            }
        } else {
            echo "Give exact same password.";
        }
    }
    // Forgot Password Functionalities ends HERE

    //function for profile file to show individual student's profile
    public function getUserData($userid)
    {
        $query = "SELECT * FROM tbl_user  WHERE userid = '$userid'";
        $result = $this->db->select($query);
        return $result;
    }
    //function for user data update
    public function updateUser($userid, $data)
    {
        $name = $this->fm->validation($data['name']);
        $email = $this->fm->validation($data['email']);
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $query = "UPDATE tbl_user SET name ='$name', email = '$email' WHERE userid='$userid'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
            $msg = "<span class='success'>Profile Updated!!! </span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Profile Not Updated!!! </span>";
            return $msg;
        }
    }


    // From here Exam functionalities for Students begin

    // Showing quetions to students starts here
    public function getQueByRandom()
    {
        $value = $this->exam_name;
        $query = "SELECT * FROM tbl_ques";
        $result = $this->db->select($query);
        return $result;
    }

    //function for getQuesByNumber($number)
    public function getQuesByNumber($number)
    {
        $query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
        $res = $this->db->select($query);
        $result = $res->fetch_assoc();
        return $result;
    }
    //function for showing options for individual question
    public function getAnswer($number)
    {
        $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
        $result = $this->db->select($query);
        return $result;
    }
}
