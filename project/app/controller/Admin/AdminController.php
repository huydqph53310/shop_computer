<?php

class AdminController
{
    public $connect;
    public $swuser;

    public function __construct()
    {
        $this->connect = new ConnectDatabase();
        $this->swuser = new SwitchQuery();
    }

    public function __destruct() {}

    public function Trangchu()
    {
        include "project/app/view/Home.php";
    }

    public function Login()
    {
        if (isset($_POST["Login"])) {
            var_dump($_POST);
        }
        include "project/app/view/LoginScr/LoginScr.php";
    }

    public function Regsiter()
    {
        $tberr = "";
        $tbsus = "";
        $createUser = new users();
        if (isset($_POST["regsiter"])) {
            $createUser = new users(
                null,
                $_POST["name"],
                $_POST["username"],
                $_POST["password"],
                $_POST["email"],
                phone: $_POST["phone"]
            );
            if ($createUser->name == "" || $createUser->username == "" || $createUser->password == "" || $createUser->email == "" || $createUser->phone == "") {
                $tberr = "Các trường này là bắt buộc";
            }
            if ($tberr == "") {
                $tbsus = "Đăng Ký tài khoản thành công";
                $this->swuser->ActionQuery("INSERT", "createuser", $createUser);
            }
            echo "<h6 style='color:red'>";
            var_dump($createUser);
            echo "</h6>";
        }
        include "project/app/view/LoginScr/RegsiterScr.php";
    }

    public function GETURL()
    {
        $wh = "";
        if (isset($_GET["wh"])) {
            $wh = $_GET["wh"];
            return $wh;
        }
    }
}
