<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <?php
    if ($_SESSION['user_level'] == "admin") {
        require_once("../ui/header.php");
        require_once("../../../database/koneksi.php");
        if (isset($_GET['id_mahasiswa'])) {
            $id = htmlspecialchars($_GET['id_mahasiswa']);
            $SQL = "SELECT * FROM tbl_mahasiswa WHERE id = '$id'";
            $mahasiswa = $koneksi->query($SQL);
            $base = mysqli_fetch_array($mahasiswa);
            extract($base);
        }
    } else {
        echo "<script>document.location.href = '../ui/header.php?hal=beranda';</script>";
        die;
        exit(0);
    }
    ?>
</head>

<body>
    <?php require_once("../ui/sidebar.php") ?>
    <section onload="location.href = '../ui/header.php?hal=edit-mahasiswa&id_mahasiswa=<?= $id ?>'">
        <div class="panel panel-default bg-body-tertiary container-fluid">
            <div class="panel-body rounded-2 border border-1 py-4 p-auto">
                <div class="panel-heading p-1">
                    <h4 class="panel-title display-4 fs-4">Mahasiswa <?php echo $nama_universitas ?></h4>
                    <div class="breadcrumb d-flex justify-content-end align-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?hal=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?hal=siswa" aria-current="page"
                                class="text-decoration-none text-primary">Mahasiswa</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?hal=edit-mahasiswa&id_mahasiswa=<?= $base['id'] ?>" aria-current="page"
                                class="text-decoration-none active">Edit
                                Mahasiswa</a>
                        </li>
                    </div>
                </div>
                <div class="p-auto p-3">
                    <div class="card shadow mb-4 m-auto">
                        <div class="card-header">
                            <h4 class="card-title display-4 fs-3 font-timesnew 
                            fw-normal fst-normal">Edit Data Mahasiswa
                            </h4>
                        </div>
                        <div class="container-fluid">
                            <div class="card-body my-2">
                                <div class="table-responsive">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="col-sm-8 col-md-8">
                                            <div class="card shadow">
                                                <div class="card-body my-2">
                                                    <div class="form-inline row justify-content-end 
                                                                align-items-center flex-wrap">
                                                        <div class="col-sm-4 col-md-4 fs-5 btn-block disabled">
                                                            <?php error_reporting(0); ?>
                                                            <?php $ambil = $koneksi->query("SELECT * FROM tbl_mahasiswa ORDER BY nim DESC LIMIT 1") ?>
                                                            <?php $pecah = $ambil->fetch_array(); ?>
                                                            <label for="">Data
                                                                Terakhir :</label>
                                                        </div>
                                                        <div class="col-sm-4 col-md-4">
                                                            <input type="text" value="<?php echo $pecah['nim'] ?>"
                                                                placeholder="nim mahasiswa sebelumnya ..." readonly
                                                                class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <form action="?aksi=edit-mahasiswa"
                                                        enctype="multipart/form-data" method="post">
                                                        <input type="hidden" name="id" value="<?= $base['id'] ?>">
                                                        <div class="form-group-lg my-4">
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Nim
                                                                        Mahasiswa</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" name="nim"
                                                                        value="<?php echo $nim ?>"
                                                                        aria-required="TRUE" maxlength="16"
                                                                        minlength="0" inputmode="numeric"
                                                                        class="form-control" id="nim">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Nama
                                                                        Mahasiswa</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" name="nama"
                                                                        value="<?php echo $nama ?>"
                                                                        aria-required="TRUE" maxlength="100"
                                                                        class="form-control" readonly id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Tempat
                                                                        Lahir</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" name="tempat_lahir"
                                                                        value="<?php echo $tempat_lahir ?>"
                                                                        aria-required="TRUE" readonly
                                                                        maxlength="100" class="form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Tanggal
                                                                        Lahir</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="date"
                                                                        value="<?php echo $tanggal_lahir ?>"
                                                                        name="tanggal_lahir" readonly
                                                                        aria-required="TRUE"
                                                                        class="date-formate form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Fakultas
                                                                        Universitas</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" readonly name="fakultas"
                                                                        value="<?php echo $fakultas ?>"
                                                                        aria-required="TRUE" maxlength="100"
                                                                        class="date-formate form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Jurusan
                                                                        Universitas</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" readonly name="jurusan"
                                                                        value="<?php echo $jurusan ?>"
                                                                        aria-required="TRUE" maxlength="100"
                                                                        class="date-formate form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Nomor
                                                                        Telepon</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="text" readonly inputmode="numeric"
                                                                        name="no_telepon"
                                                                        value="<?php echo $no_telepon ?>"
                                                                        aria-required="TRUE" maxlength="32"
                                                                        class=" form-control" id="">
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Alamat
                                                                        Rumah</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <textarea name="alamat" rows="3"
                                                                        aria-required="TRUE" readonly
                                                                        class="form-control" id=""
                                                                        maxlength="255"><?php echo $alamat ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="my-1">
                                                                <div class="form-inline row justify-content-start 
                                                                    align-items-start flex-wrap">
                                                                    <div class="form-label col-sm-4 col-md-4">
                                                                        <label for=""
                                                                            class="label label-default display-5 fs-5">
                                                                            Foto Mahasiswa
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6">
                                                                        <div class="img-responsive my-1 py-1">
                                                                            <img src="<?= baseurl('assets/gambar/') ?><?= $foto ?>"
                                                                                id="preview"
                                                                                class="col-sm-4 col-md-4 border border-1 rounded-1"
                                                                                alt="">
                                                                        </div>
                                                                        <input type="file" name="foto"
                                                                            accept="image/*"
                                                                            onchange="previewImage(this)"
                                                                            class="form-control form-control-file"
                                                                            id="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Email
                                                                        Mahasiswa</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="email" name="email"
                                                                        aria-required="TRUE" class=" form-control"
                                                                        id="emailId" value="<?= $email; ?>"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="my-1"></div>
                                                            <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                                <div class="col-sm-4 col-md-4 fs-5">
                                                                    <label for=""
                                                                        class="form-label label label-default">Password
                                                                        Mahasiswa</label>
                                                                </div>
                                                                <div class="col-sm-7 col-md-7">
                                                                    <input type="date" name="password"
                                                                        aria-required="TRUE" readonly
                                                                        class=" form-control" id=""
                                                                        value="<?= $tanggal_lahir ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    data</button>
                                                                <a href="?hal=siswa" aria-current="page"
                                                                    class="btn btn-default btn-outline-dark">Kembali</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once("../ui/footer.php") ?>