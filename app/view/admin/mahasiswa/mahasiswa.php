<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <?php
    if ($_SESSION['user_level'] == "admin") {
        require_once("../ui/header.php");
        require_once("../../../database/koneksi.php");
        function status($status)
        {
            if ($status == 1) {
                echo "Sudah Aktif";
            } else {
                echo "Belum Aktif";
            }
        }

        if (isset($_POST['status'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];
            $koneksi->query("UPDATE tbl_mahasiswa SET status = '$status' WHERE id = '$id'");
            echo "<script>document.location.href = '../ui/header.php?hal=siswa';</script>";
            die;
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
    <section onload="location.href = '../ui/header.php?hal=siswa'">
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
                                class="text-decoration-none active">Mahasiswa</a>
                        </li>
                    </div>
                </div>
                <div class="p-auto p-3">
                    <div class="card shadow mb-4 m-auto">
                        <div class="card-header">
                            <h4 class="card-title display-4 fs-3 font-timesnew 
                            fw-normal fst-normal">Data Mahasiswa
                            </h4>
                        </div>
                        <div class="container-fluid">
                            <div class="card-body my-2">
                                <div class="table-responsive">
                                    <div class="d-table" style="min-width: 100%; width: 970px;">
                                        <table class="table table-striped table-striped-columns" id="datatable2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center fs-6 fw-normal">No</th>
                                                    <th class="text-center fs-6 fw-normal">Nim Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal">Nama Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal">Fakultas Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal">Jurusan Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal">Status Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal"
                                                        style="width: 120px; min-width: 100%;">
                                                        Foto Mahasiswa</th>
                                                    <th class="text-center fs-6 fw-normal">Optional</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $SQL = "SELECT * FROM tbl_mahasiswa order by nim asc";
                                                $ambil = $koneksi->query($SQL);
                                                while ($pecah = $ambil->fetch_array()) {
                                                    extract($pecah);
                                                ?>
                                                    <tr>
                                                        <td class="text-center fs-6 fw-normal"><?= $no; ?></td>
                                                        <td class="text-center fs-6 fw-normal"><?= $nim ?></td>
                                                        <td class="text-center fs-6 fw-normal"><?= $nama ?></td>
                                                        <td class="text-center fs-6 fw-normal"><?= $fakultas ?></td>
                                                        <td class="text-center fs-6 fw-normal"><?= $jurusan ?></td>
                                                        <?php if ($pecah['status'] == 0): ?>
                                                            <td class="text-center">
                                                                <form action="?hal=siswa" method="post">
                                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                                    <select name="status" class="form-select"
                                                                        onchange="this.form.submit()" id="">
                                                                        <option value="0"
                                                                            <?php if ($pecah['status'] == "0") { ?> selected
                                                                            <?php } ?>> Belum Aktif
                                                                        </option>
                                                                        <option value="1"
                                                                            <?php if ($pecah['status'] == "1") { ?> selected
                                                                            <?php } ?>> Sudah Aktif
                                                                        </option>
                                                                    </select>
                                                                </form>
                                                            </td>
                                                        <?php else: ?>
                                                            <td class="text-center fs-6 fw-normal">
                                                                <?php echo status($pecah['status']) ?>
                                                            </td>
                                                        <?php endif; ?>
                                                        <td class="text-center">
                                                            <div class="img-thumbnail bg-body-secondary">
                                                                <img src="<?= baseurl('assets/gambar/') ?><?= $foto ?>"
                                                                    class="img-responsive col-sm-4"
                                                                    alt="<?= $pecah['nama'] ?>">
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="?hal=edit-mahasiswa&id_mahasiswa=<?= $id ?>"
                                                                aria-current="page" class="btn btn-warning">
                                                                <i class="fa fa-edit fa-1x"></i>
                                                            </a>
                                                            <a href="?aksi=hapus-mahasiswa&id=<?= $id ?>"
                                                                aria-current="page"
                                                                onclick="return confirm('apakah ingin menghapus data mahasiswa ini.')"
                                                                class="btn btn-danger">
                                                                <i class="fa fa-trash-alt fa-1x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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