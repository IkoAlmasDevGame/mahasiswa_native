<?php

namespace model;

class CreateMahasiswa
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function tambah($nama, $tempat, $tanggal, $fakultas, $jurusan, $telepon, $alamat)
    {
        if (
            empty($_POST['nama']) || empty($_POST['tempat_lahir']) || empty($_POST['tanggal_lahir']) || empty($_POST['fakultas']) ||
            empty($_POST['jurusan']) || empty($_POST['no_telepon']) || empty($_POST['alamat'])
        ) {
            echo "<script>document.location.href = '../view/tambah.php'; alert('ada beberapa kolom form input belum ter-isi.');</script>";
            die;
        } else {
            $nama = htmlspecialchars($_POST['nama']) ? htmlentities($_POST['nama']) : strip_tags($_POST['nama']);
            $tempat = htmlspecialchars($_POST['tempat_lahir']) ? htmlentities($_POST['tempat_lahir']) : strip_tags($_POST['tempat_lahir']);
            $tanggal = htmlspecialchars($_POST['tanggal_lahir']) ? htmlentities($_POST['tanggal_lahir']) : strip_tags($_POST['tanggal_lahir']);
            $fakultas = htmlspecialchars($_POST['fakultas']) ? htmlentities($_POST['fakultas']) : strip_tags($_POST['fakultas']);
            $jurusan = htmlspecialchars($_POST['jurusan']) ? htmlentities($_POST['jurusan']) : strip_tags($_POST['jurusan']);
            $telepon = htmlspecialchars($_POST['no_telepon']) ? htmlentities($_POST['no_telepon']) : strip_tags($_POST['no_telepon']);
            $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
            $status = "0";
            /*/ Input File Foto /*/
            # Input File Foto
            $ekstensi_diperbolehkan_gambar = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
            $gambar = htmlentities($_FILES['foto']['name']) ? htmlspecialchars($_FILES['foto']['name']) : $_FILES['foto']['name'];
            $x_gambar = explode('.', $gambar);
            $ekstensi_gambar = strtolower(end($x_gambar));
            $ukuran_gambar = $_FILES['foto']['size'];
            $file_tmp_gambar = $_FILES['foto']['tmp_name'];

            if (in_array($ekstensi_gambar, $ekstensi_diperbolehkan_gambar) === true) {
                if ($ukuran_gambar < 10440070) {
                    move_uploaded_file($file_tmp_gambar, "../../assets/gambar/" . $gambar);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit;
                }
            } else {
                echo "Tidak Dapat Ter - Upload Gambar";
                exit;
            }
            # Input File Foto
            /*/ Input File Foto /*/

            # Code Input Database or Code Create
            $table = "tbl_mahasiswa";
            $sql = "SELECT * FROM $table WHERE nama = '$nama' order by nama desc";
            $select = $this->db->query($sql);
            $cek = mysqli_num_rows($select);

            if ($cek) {
                echo "<script>document.location.href = '../view/tambah.php'; alert('nama yang anda ketikan sudah ada.');</script>";
                die;
            } else {
                $SQInsert = "INSERT INTO $table SET nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tanggal', fakultas='$fakultas', jurusan='$jurusan', 
                no_telepon='$telepon', alamat='$alamat', status='$status', foto='$gambar'";
                $data = $this->db->query($SQInsert);
                if ($data != "") {
                    if ($data) {
                        echo "<script>document.location.href = '../view/tambah.php'; alert('anda sudah berhasil mendaftar di tempat kuliah ini.');</script>";
                        die;
                    }
                } else {
                    echo "<script>document.location.href = '../view/tambah.php'; alert('anda gagal mendaftar di tempat kuliah ini.');</script>";
                    die;
                }
            }
        }
    }
    public function edit($id, $nim, $password)
    {
        $id = htmlspecialchars($_POST['id']) ? htmlentities($_POST['id']) : strip_tags($_POST['id']);
        $nim = htmlspecialchars($_POST['nim']) ? htmlentities($_POST['nim']) : strip_tags($_POST['nim']);
        $password = md5($_POST['password'], false);

        $SQUpdate = "UPDATE tbl_mahasiswa SET nim = '$nim', email = '$nim@prediksi.com', password = '$password' WHERE id = '$id'";
        $Update = $this->db->query($SQUpdate);
        if ($Update != "") {
            if ($Update) {
                echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
                die;
            }
        } else {
            echo "<script>document.location.href = '../ui/header.php?hal=edit-mahasiswa&id_mahasiswa=$id';</script>";
            die;
        }
    }
    public function hapus($id)
    {
        $id = htmlspecialchars($_GET['id']) ? htmlentities($_GET['id']) : strip_tags($_GET['id']);
        $table = "tbl_mahasiswa";
        $select = $this->db->query("SELECT * FROM $table WHERE id = '$id'");
        $array = mysqli_fetch_array($select);
        $foto = $array["foto"];

        if ($array["foto"] == "") {
            $delete = "DELETE FROM $table WHERE id = '$id'";
            $data = $this->db->query($delete);
            if ($data != null) {
                if ($data) {
                    echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
                die;
            }
        } else {
            unlink("../../../../assets/gambar/$foto");
            $data = $this->db->query("DELETE FROM $table WHERE id = '$id'");
            if ($data != null) {
                if ($data) {
                    echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
                    die;
                }
            } else {
                echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
                die;
            }
        }
    }
}
