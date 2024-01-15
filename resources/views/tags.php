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

    <?php $tags=$result; ?>

    <?php include "layouts/header_sidebar_dash.php"; ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <?php include "layouts/header_dash.php"; ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <a href="/wikis/Tags/add" class="btn btn-primary mb-4" style="width: 230px">Add tag</a>
                        <table id="tags" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tags as $tag){ ?>
                                <tr>
                                    <th><?= $tag->id; ?></th>
                                    <th><?= $tag->name; ?></th>
                                    <th>
                                        <a href="/wikis/Tags/edit/<?= $tag->id ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/wikis/Tags/destroy/<?= $tag->id ?>">
                                            <i class="fa fa-trash"></i>
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
        $('#tags').DataTable();
    } );
</script>
</body>
</html>