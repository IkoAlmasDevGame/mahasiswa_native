<?php
require_once("../../../database/koneksi.php");
# Files Model
require_once("../../../model/admin.php");
$admins = new model\adminAuth($koneksi);
require_once("../../../model/mahasiswa.php");
$mahasiswas = new model\CreateMahasiswa($koneksi);
# Files Controller
require_once("../../../controller/controller.php");
$mahasiswa = new controller\Mahasiswa($koneksi);
$admin = new controller\AuthLogin($koneksi);

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "beranda") {
        require_once("../dashboard/index.php");
    } elseif ($_GET['hal'] == "siswa") {
        require_once("../mahasiswa/mahasiswa.php");
    } elseif ($_GET['hal'] == "edit-profile") {
        require_once("../profile/edit.php");
    } elseif ($_GET['hal'] == "edit-universitas") {
        require_once("../profile/universitas.php");
    } elseif ($_GET['hal'] == "edit-mahasiswa") {
        require_once("../mahasiswa/edit.php");
    } elseif ($_GET['hal'] == "logout") {
        if (isset($_SESSION['status'])) {
            unset($_SESSION['status']);
            session_unset();
            session_destroy();
            $_SESSION = array();
        }
        echo "<script>document.location.href = '../../ux/index.php';</script>";
        die;
        exit(0);
    }
}

if (!isset($_GET['aksi'])) {
} else {
    switch ($_GET['aksi']) {
        case 'edit-mahasiswa':
            $mahasiswa->update();
            break;
        case 'hapus-mahasiswa':
            $mahasiswa->delete();
            break;

        default:
            # code...
            break;
    }
}
