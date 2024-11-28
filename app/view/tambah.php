<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Universitas Jaya Prediksi</title>
    <link rel="stylesheet" crossorigin="anonymous"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" crossorigin="anonymous"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="all">
    <link rel="stylesheet" href="../../dist/css/style.css" media="all">
    <link href="../../dist/vendor/bootstrap-icons/bootstrap-icons.css" crossorigin="anonymous" media="all"
        rel="stylesheet">
    <link href="../../dist/vendor/boxicons/css/boxicons.min.css" crossorigin="anonymous" media="all"
        rel="stylesheet">
    <link href="../../dist/vendor/quill/quill.snow.css" crossorigin="anonymous" media="all" rel="stylesheet">
    <link href="../../dist/vendor/quill/quill.bubble.css" crossorigin="anonymous" media="all" rel="stylesheet">
    <link href="../../dist/vendor/remixicon/remixicon.css" crossorigin="anonymous" media="all" rel="stylesheet">
</head>

<body class="bg-body-secondary">
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-5 fst-normal fw-semibold">
                Dashboard Universitas Jaya Prediksi
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
    </header>
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a href="./index.php" aria-current="page" class="nav-link collapsed">
                    <i class="fa fa-home fa-1x"></i>
                    <span class="fs-5 text-start fw-normal text-dark">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="./tambah.php" aria-current="page" class="nav-link collapsed">
                    <i class="fa fa-registered fa-1x"></i>
                    <span class="fs-5 text-start fw-normal text-dark">Daftar Mahasiswa Baru</span>
                </a>
            </li>
        </ul>
        <div class="footer">
            <footer class="position-absolute bottom-0">
                <div class="border border-top mt-1 mb-1 border-light"></div>
                <div class="ms-4 me-3">
                    By IkoAlmasDevGame
                </div>
                <div class="border border-top mt-1 mb-1 border-light"></div>
            </footer>
        </div>
    </aside>
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row col-lg-12">
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    <!-- Left side columns -->
                    <div class="col-sm-8 col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <h4 class="card-title fs-3 text-center fw-semibold display-4">
                                    Tambah Mahasiwsa Baru
                                </h4>
                            </div>
                            <div class="card-body my-2">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        require_once("../database/koneksi.php");
                                        require_once("../model/mahasiswa.php");
                                        require_once("../controller/controller.php");
                                        $mahasiswa = new model\CreateMahasiswa($koneksi);
                                        $siswa = new controller\Mahasiswa($koneksi);
                                        if (!isset($_GET['aksi'])) {
                                        } else {
                                            switch ($_GET['aksi']) {
                                                case 'simpan':
                                                    $siswa->create();
                                                    break;

                                                default:
                                                    # code...
                                                    break;
                                            }
                                        }
                                        ?>
                                        <form action="?aksi=simpan" enctype="multipart/form-data" method="post">
                                            <div class="form-group-lg my-4">
                                                <div class="form-inline row justify-content-start 
                                                align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Nama
                                                            Mahasiswa</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <input type="text" name="nama"
                                                            placeholder="masukkan nama lengkap anda ..."
                                                            aria-required="TRUE" maxlength="100"
                                                            class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start 
                                                                align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Tempat
                                                            Lahir</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <input type="text" name="tempat_lahir"
                                                            placeholder="dimana tempat lahir anda ..."
                                                            aria-required="TRUE" maxlength="100"
                                                            class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Tanggal
                                                            Lahir</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <input type="date" name="tanggal_lahir" aria-required="TRUE"
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
                                                        <input type="text" name="fakultas"
                                                            placeholder="ketikkan satu fakultas yang anda inginkan ..."
                                                            aria-required="TRUE" maxlength="100"
                                                            class="date-formate form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Jurusan
                                                            Universitas</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <input type="text" name="jurusan"
                                                            placeholder="ketikkan satu jurusan yang anda inginkan ..."
                                                            aria-required="TRUE" maxlength="100"
                                                            class="date-formate form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start 
                                                align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Nomor
                                                            Telepon</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <input type="text"
                                                            placeholder="masukkan nomer telepon anda ..."
                                                            inputmode="numeric" name="no_telepon"
                                                            aria-required="TRUE" maxlength="32"
                                                            class=" form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="col-sm-4 col-md-4 fs-5">
                                                        <label for="" class="form-label label label-default">Alamat
                                                            Rumah</label>
                                                    </div>
                                                    <div class="col-sm-7 col-md-7">
                                                        <textarea name="alamat"
                                                            placeholder="masukkan alamat rumah anda ..." rows="3"
                                                            aria-required="TRUE" class="form-control" id=""
                                                            maxlength="255"></textarea>
                                                    </div>
                                                </div>
                                                <div class="my-1"></div>
                                                <div class="form-inline row justify-content-start
                                                 align-items-start flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="label label-default display-5 fs-5">
                                                            Foto Mahasiswa
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="img-responsive my-1 py-1">
                                                            <img src="https://th.bing.com/th/id/OIP.NwiZS9yjjNjb6lCfIz889AHaGo?w=229&h=204&c=7&r=0&o=5&pid=1.7"
                                                                id="preview"
                                                                class="col-sm-4 col-md-4 border border-1 rounded-1"
                                                                alt="">
                                                        </div>
                                                        <input type="file" name="foto" accept="image/*"
                                                            onchange="previewImage(this)"
                                                            class="form-control form-control-file" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        data</button>
                                                    <button type="reset" class="btn btn-danger">Hapus
                                                        data</button>
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
        </section>
        <!-- ======= Sidebar ======= -->

        <!-- ======= Script JS ======= -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="../../dist/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../../dist/vendor/chart.js/chart.umd.js"></script>
        <script src="../../dist/vendor/echarts/echarts.min.js"></script>
        <script src="../../dist/vendor/quill/quill.js"></script>
        <script src="../../dist/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../../dist/vendor/tinymce/tinymce.min.js"></script>
        <script src="../../dist/vendor/php-email-form/validate.js"></script>
        <script src="../../dist/js/main.js"></script>
        <!-- ======= Script JS ======= -->
        <script>
            function previewImage(input) {
                const file = input.files[0];
                if (file) {
                    const preview = document.getElementById('preview');
                    preview.src = URL.createObjectURL(file);
                    preview.onload = function() {
                        URL.revokeObjectURL(preview.src); // Free memory
                    };
                }
            }
        </script>
</body>

</html>