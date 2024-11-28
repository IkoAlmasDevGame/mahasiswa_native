<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Universitas</title>
        <?php
    if ($_SESSION['user_level'] == "admin") {
        require_once("../ui/header.php");
        require_once("../../../database/koneksi.php");
        # universitas settings
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);
            $SQL = "SELECT * FROM tbl_settings WHERE id = '$id'";
            $data = $koneksi->query($SQL);
            $ambil = mysqli_fetch_array($data);
        }
        # code update settings universitas
        if (isset($_POST['update'])) {
            $id = htmlspecialchars($_POST['id']);
            $nama = htmlspecialchars($_POST['nama_universitas']);
            $akreditas = htmlspecialchars($_POST['universitas']);
            $status = htmlspecialchars($_POST['status']);
            $SQUpdate = "UPDATE tbl_settings SET nama_universitas = '$nama', universitas='$akreditas', status='$status' WHERE id = '$id'";
            $koneksi->query($SQUpdate);
            echo "<script>document.location.href = '../ui/header.php?hal=edit-universitas&id=$id';</script>";
            die;
        }
    } else {
        echo "<script>
        document.location.href = '../ui/header.php?hal=beranda';
        </script>";
        die;
        exit(0);
    }
    ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <section onload="location.href = '?hal=edit-universitas&id=<?= $id ?>'">
            <div class="panel panel-default bg-body-tertiary container-fluid">
                <div class="panel-body rounded-2 border border-1 py-4 p-auto">
                    <div class="panel-heading py-1 px-2">
                        <h4 class="panel-title display-4 fs-4">Profile <?php echo $nama_universitas ?></h4>
                        <div class="breadcrumb d-flex justify-content-end align-end flex-wrap">
                            <li class="breadcrumb breadcrumb-item">
                                <a href="?hal=beranda" aria-current="page"
                                    class="text-decoration-none text-primary">Beranda</a>
                            </li>
                            <li class="breadcrumb breadcrumb-item">
                                <a href="?hal=edit-universitas&id=<?= $id ?>" aria-current="page"
                                    class="text-decoration-none active">Settings</a>
                            </li>
                        </div>
                    </div>
                    <div class="p-auto p-3">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="col-sm-7 col-md-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-2">
                                        <h4 class="card-title fs-5 text-center display-4">Profile
                                            <?php echo $ambil['nama_universitas'] ?></h4>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <form action="?hal=edit-universitas&id=<?= $id ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $ambil['id'] ?>">
                                            <div class="form-group">
                                                <div class="my-2"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="label label-default">Nama
                                                            Universitas</label>
                                                    </div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" name="nama_universitas"
                                                            value="<?= $ambil['nama_universitas'] ?>"
                                                            class="form-control" id="">
                                                    </div>
                                                </div>
                                                <div class="my-2"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="label label-default">Universitas
                                                            Akreditas</label>
                                                    </div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <select name="universitas" class="form-select" id="">
                                                            <option value="swasta"
                                                                <?php if ($ambil['universitas'] == "swasta") { ?>
                                                                selected <?php } ?>>Swasta</option>
                                                            <option value="negeri"
                                                                <?php if ($ambil['universitas'] == "negeri") { ?>
                                                                selected <?php } ?>>Negeri</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="my-2"></div>
                                                <div class="form-inline row justify-content-start 
                                                    align-items-start flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4">
                                                        <label for="" class="label label-default">status Universitas
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <select name="status" class="form-select" id="">
                                                            <option value="0" <?php if ($ambil['status'] == "0") { ?>
                                                                selected <?php } ?>>Tidak Aktif</option>
                                                            <option value="1" <?php if ($ambil['status'] == "1") { ?>
                                                                selected <?php } ?>>Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="my-2"></div>
                                                <div class="card-footer">
                                                    <div class="text-start">
                                                        <button type="submit" name="update" class="btn btn-primary">
                                                            <i class="fas fa-save fa-1x"></i>
                                                            <span>Update Data</span>
                                                        </button>
                                                    </div>
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
        <?php require_once("../ui/footer.php") ?>