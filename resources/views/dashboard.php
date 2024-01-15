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

<body class="">
<div class="page-wrapper">

    <?php include "layouts/header_sidebar_dash.php"; ?>

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <?php include "layouts/header_dash.php"; ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                        <div class="text mt-3">
                                            <h2><?= $result[0]; ?></h2>
                                            <span>Members</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c2">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="fa-regular fa-newspaper"></i>
                                        </div>
                                        <div class="text mt-3">
                                            <h2><?= $result[1]; ?></h2>
                                            <span>Posts</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c3">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="fa-regular fa-newspaper"></i>
                                        </div>
                                        <div class="text mt-3">
                                            <h2><?= $result[2]; ?></h2>
                                            <span>Posts in Pending</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="overview-item overview-item--c4">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                        <div class="text mt-3">
                                            <h2><?= $result[3]; ?></h2>
                                            <span>Categories</span>
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

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>

<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>
<script src="<?= URL_DIR ?>public/js/wow.min.js"></script>
<script src="<?= URL_DIR ?>public/js/animsition.min.js"></script>
<script src="<?= URL_DIR ?>public/js/main.js"></script>

</body>
</html>