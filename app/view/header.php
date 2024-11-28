<head>
    <?php
    function baseurl($url)
    {
        $url = "http://localhost/mahasiswa_native/" . $url;
        return $url;
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Universitas Prediksi Jaya Jaya</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.dataTables.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" media="all">
    <!--  -->
    <link href="<?= baseurl('dist/vendor/bootstrap-icons/bootstrap-icons.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/boxicons/css/boxicons.min.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/quill/quill.snow.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/quill/quill.bubble.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/remixicon/remixicon.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/vendor/simple-datatables/style.css') ?>" media="all" crossorigin="anonymous"
        rel="stylesheet">
    <link href="<?= baseurl('dist/css/style.css') ?>" crossorigin="anonymous" media="all" rel="stylesheet">
    <link rel="stylesheet" crossorigin="anonymous" media="all" href="<?= baseurl('app/view/page/ui/styles.css') ?>">
</head>