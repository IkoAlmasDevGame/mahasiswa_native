<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin</title>
    <?php
    if ($_SESSION['user_level'] == "admin") {
        require_once("../ui/header.php");
        require_once("../../../database/koneksi.php");
        # admin profile
        if (isset($_GET['admin'])) {
            $id = htmlspecialchars($_GET['admin']);
            $SQL = "SELECT * FROM tbl_admin WHERE id = '$id'";
            $data = $koneksi->query($SQL);
            $ambil = mysqli_fetch_array($data);
        }
        # update admin
        if (isset($_POST['update'])) {
            $id = htmlspecialchars($_POST['id']);
            $user_level = htmlspecialchars($_POST['user_level']);
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = md5(htmlspecialchars($_POST['password']), false);
            $SQUpdate = "UPDATE tbl_admin SET username = '$username', email = '$email', password = '$password', user_level = '$user_level' WHERE id = '$id'";
            $koneksi->query($SQUpdate);
            echo "<script>document.location.href = '../ui/header.php?hal=edit-profile&admin=$id';</script>";
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
    <section onload="location.href = '?hal=edit-profile&id=<?= $id ?>'">
        <div class="panel panel-default bg-body-tertiary container-fluid">
            <div class="panel-body rounded-2 border border-1 py-4 p-auto">
                <div class="panel-heading py-1 px-2">
                    <h4 class="panel-title display-4 fs-4">Profile <?php echo $ambil['username'] ?></h4>
                    <div class="breadcrumb d-flex justify-content-end align-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?hal=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?hal=edit-profile&id=<?= $id ?>" aria-current="page"
                                class="text-decoration-none active">Profile</a>
                        </li>
                    </div>
                </div>
                <div class="p-auto p-3">
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="col-sm-7 col-md-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <h4 class="card-title fs-5 text-center display-4">Profile
                                        - <?php echo $ambil['username'] ?> - </h4>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <form action="?hal=edit-profile&id=<?= $id ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $ambil['id'] ?>">
                                        <input type="hidden" name="user_level" value="<?= $ambil['user_level'] ?>">
                                        <div class="form-group">
                                            <div class="my-2"></div>
                                            <div class="form-inline row justify-content-start
                                                     align-items-start flex-wrap">
                                                <div class="form-label col-sm-4 fs-5 col-md-4">
                                                    <label for="" class="label label-default">
                                                        Username
                                                    </label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="username" class="form-control"
                                                        value="<?= $ambil['username'] ?>" id="">
                                                </div>
                                            </div>
                                            <div class="my-2"></div>
                                            <div class="form-inline row justify-content-start
                                                     align-items-start flex-wrap">
                                                <div class="form-label col-sm-4 fs-5 col-md-4">
                                                    <label for="" class="label label-default">
                                                        email
                                                    </label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="email" name="email" class="form-control"
                                                        value="<?= $ambil['email'] ?>" id="">
                                                </div>
                                            </div>
                                            <div class="my-2"></div>
                                            <div class="form-inline row justify-content-start
                                                     align-items-start flex-wrap">
                                                <div class="form-label col-sm-4 fs-5 col-md-4">
                                                    <label for="" class="label label-default">
                                                        Password
                                                    </label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="password" name="password" class="form-control"
                                                        value="" placeholder="masukkan password baru ..." id="">
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