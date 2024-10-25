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
        $tberr = "";
        $tbsus = "";
        if (isset($_POST["Login"])) {
            if ($_POST["username"] == "" || $_POST["password"] == "") {
                $tberr = "Email, password Đang trống phải không?";
            }
            if ($tberr == "") {
                $data = $this->swuser->Login($_POST["username"]);
                if (($_POST["username"] ==  $data->username) && ($_POST["password"] == $data->password)) {
                    $tbsus = "Đăng Nhập thành công";
                    $_SESSION["username"] = $_POST["username"];
                    header("locaion: ?wh=home");
                } else {
                    $tberr = "Thông tin tài khoản mật khẩu không chính sác!";
                }
                // echo $data->username;
                // echo $data->password;

                // var_dump($data->username);
            }
            // var_dump($_POST);
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
