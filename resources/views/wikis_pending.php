<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">
    <link href="<?= URL_DIR ?>public/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?= URL_DIR ?>public/css/animate.css" rel="stylesheet" media="all">
    <link href="<?= URL_DIR ?>public/css/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= URL_DIR ?>public/css/theme.css" rel="stylesheet" media="all">
    <link href="<?= URL_DIR ?>public/css/datatables.css" rel="stylesheet" media="all">

</head>

<body class="">
<div class="page-wrapper">

    <?php $wikis=$result; ?>

    <?php include "layouts/header_sidebar_dash.php"; ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <?php include "layouts/header_dash.php"; ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <table id="wikis" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Date Creation</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($wikis as $wiki){ ?>
                                <tr>
                                    <th><?= $wiki->name; ?></th>
                                    <th><?= $wiki->email; ?></th>
                                    <th><?= $wiki->title; ?></th>
                                    <th><?= substr($wiki->description, 0, 50); ?></th>
                                    <th><?= $wiki->category; ?></th>
                                    <th><?= $wiki->date_creation; ?></th>
                                    <th>
                                        <a class="btn btn-danger mb-3" href="/wikis/Wiki/wiki_archive/<?= $wiki->id ?>" onclick="return confirm('Are you sure you want to archive ?');">
                                           Archive
                                        </a>
                                        <a class="btn btn-success" href="/wikis/Wiki/validate/<?= $wiki->id ?>" onclick="return confirm('Are you sure you want to validate ?');">
                                            Validate
                                        </a>
                                    </th>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>

<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>
<script src="<?= URL_DIR ?>public/js/wow.min.js"></script>
<script src="<?= URL_DIR ?>public/js/animsition.min.js"></script>
<script src="<?= URL_DIR ?>public/js/main.js"></script>
<script src="<?= URL_DIR ?>public/js/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#wikis').DataTable();
    } );
</script>
</body>
</html>