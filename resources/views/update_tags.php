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

</head>

<body class="animsition">
<div class="page-wrapper">

    <?php /** @var TYPE_NAME $msg */
    if($msg!=null){ ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Category</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p><?= $msg ?></p>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php include "layouts/header_sidebar_dash.php"; ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <?php include "layouts/header_dash.php"; ?>
        <?php $tag=$result; ?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <form action="/wikis/Tags/update/<?= $tag->getId() ?>" method="post">
                            <div class="mb-3">
                                <label for="tag" class="form-label">Category</label>
                                <input type="text" class="form-control" name="tag" value="<?= $tag->getName(); ?>" id="tag" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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

</body>
</html>