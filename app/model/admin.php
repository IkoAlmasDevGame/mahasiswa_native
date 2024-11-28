<?php

namespace model;

class adminAuth
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginAuth($userInput, $passInput)
    {
        session_start();
        $userInput = htmlspecialchars($_POST['userInput']);
        $passInput = md5(htmlspecialchars($_POST['password']), false);
        password_verify($passInput, PASSWORD_DEFAULT);

        if ($userInput == "" || $passInput == "") {
            echo "<script>document.location.href = '../ux/index.php';</script>";
            exit(0);
            die;
        }

        $table = "tbl_admin";
        $SQL = "SELECT * FROM $table WHERE username = '$userInput' and password = '$passInput' || email = '$userInput' and password = '$passInput'";
        $data = $this->db->query($SQL);
        $cek = $data->num_rows;

        $hasil = $_POST['angka1'] + $_POST['angka2'];

        if ($cek > 0) {
            $response = array($userInput, $passInput);
            $response['tbl_admin'] = array($userInput, $passInput);
            if ($row = $data->fetch_assoc()) {
                if ($row['user_level'] == "admin") {
                    $_SESSION['status'] = true;
                    $_SESSION['admin'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_level'] = "admin";
                    if ($_POST['hasil'] == $hasil) {
                        echo "<script>location.href = '../admin/ui/header.php?hal=beranda'; alert('Anda berhasil login.');</script>";
                        exit(0);
                    } else {
                        echo "<script>location.href = '../ux/index.php'; alert('Capthca yang anda kerjakan salah.');</script>";
                        exit(0);
                    }
                }
                $_SERVER['HTTPS'] = "on";
                $_COOKIE['cookies'] = $userInput;
                setcookie($response[$table], $row, time() + (86400 * 30), "/");
                array_push($response['tbl_admin'], $row);
                die;
            }
        } else {
            unset($_POST['hasil']);
            $_SESSION['status'] = false;
            $_SERVER['HTTPS'] = "off";
            echo "<script lang='javascript'>document.location.href = '../ux/index.php'; alert('login anda gagal ...');</script>";
            die;
        }
    }
}
