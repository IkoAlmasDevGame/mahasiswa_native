<?php

namespace controller;

use model\adminAuth;
use model\CreateMahasiswa;

class AuthLogin
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new adminAuth($konfig);
    }

    public function authentication()
    {
        $userInput = htmlspecialchars($_POST['userInput']);
        $passInput = md5(htmlspecialchars($_POST['password']), false);
        password_verify($passInput, PASSWORD_DEFAULT);
        $data = $this->konfig->loginAuth($userInput, $passInput);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}


class Mahasiswa
{
    protected $konfigs;
    public function __construct($konfigs)
    {
        $this->konfigs = new CreateMahasiswa($konfigs);
    }

    public function create()
    {
        $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : strip_tags($_POST['nama']);
        $tempat = htmlspecialchars($_POST['tempat_lahir']) ? htmlentities($_POST['tempat_lahir']) : strip_tags($_POST['tempat_lahir']);
        $tanggal = htmlspecialchars($_POST['tanggal_lahir']) ? htmlentities($_POST['tanggal_lahir']) : strip_tags($_POST['tanggal_lahir']);
        $fakultas = htmlspecialchars($_POST['fakultas']) ? htmlentities($_POST['fakultas']) : strip_tags($_POST['fakultas']);
        $jurusan = htmlspecialchars($_POST['jurusan']) ? htmlentities($_POST['jurusan']) : strip_tags($_POST['jurusan']);
        $telepon = htmlspecialchars($_POST['no_telepon']) ? htmlentities($_POST['no_telepon']) : strip_tags($_POST['no_telepon']);
        $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
        $data = $this->konfigs->tambah($nama, $tempat, $tanggal, $fakultas, $jurusan, $telepon, $alamat);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $id = htmlspecialchars($_POST['id']) ? htmlentities($_POST['id']) : strip_tags($_POST['id']);
        $nim = htmlspecialchars($_POST['nim']) ? htmlentities($_POST['nim']) : strip_tags($_POST['nim']);
        $password = md5($_POST['password'], false);
        $data = $this->konfigs->edit($id, $nim, $password);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $id = htmlspecialchars($_GET['id']) ? htmlentities($_GET['id']) : strip_tags($_GET['id']);
        $data = $this->konfigs->hapus($id);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}
