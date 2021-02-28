<?php
// this file will validate the given informations provided for login for the admins.
include_once "../lib/Session.php";
include_once "../lib/Database.php";
include_once "../helpers/Format.php";

class Admin
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    // verify admin login
    public function getAdminData($data)
    {
        $adminUser = $this->fm->validation($data['adminUser']);
        $adminPass = $this->fm->validation($data['adminPass']);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
        $query = "select * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass' ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::init();
            Session::set("adminLogin", true);
            Session::set("adminUser", $value['adminUser']);
            Session::set("adminId", $value['adminId']);
            header("Location:index.php");
        } else {
            $msg = "<span>Username or Password not matched!!!</span>";
            return $msg;
        }
    }

    // for adding a new admin
    public function addAdmin($data)
    {
        $adminUser = $this->fm->validation($data['adminUser']);
        $adminEmail = $this->fm->validation($data['admin_Email']);
        $adminPass = $this->fm->validation($data['adminPass']);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
        $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));
        $query = "INSERT into tbl_admin(adminUser,admin_Email,adminPass) VALUES ('$adminUser','$adminEmail','$adminPass')";
        $insert_row = $this->db->insert($query);
        if ($insert_row) {
            echo "New admin added Successfully";
        } else {
            echo "Can not add a new Admin";
        }
    }
}
