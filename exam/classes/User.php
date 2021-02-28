<?php

include_once "../lib/Database.php";
include_once "../helpers/Format.php";

class User
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

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
    public function getAllUser()
    {
        $query = "SELECT * FROM tbl_user";
        $result = $this->db->select($query);
        return $result;
    }
    public function DisableUser($userid)
    {
        $query = "UPDATE tbl_user SET status ='1' WHERE userid='$userid'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
            $msg = "<span class='success'>User Disabled!!! </span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not Disabled!!! </span>";
            return $msg;
        }
    }
    public function EnableUser($userid)
    {
        $query = "UPDATE tbl_user SET status ='0' WHERE userid='$userid'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
            $msg = "<span class='success'>User Enabled!!! </span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not Enabled!!! </span>";
            return $msg;
        }
    }
    public function DeleteUser($userid)
    {
        $query = "DELETE FROM tbl_user WHERE userid='$userid'";
        $updated_row = $this->db->delete($query);
        if ($updated_row) {
            $msg = "<span class='success'>User Deleted!!! </span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not Deleted!!! </span>";
            return $msg;
        }
    }
}
