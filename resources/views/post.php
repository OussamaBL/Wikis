<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">

</head>
<body>
<style>
    .info_autors{
        background-color: white;
        box-shadow: 4px 4px 20px 0px #00000061;
        border-radius: 15px;
        padding: 25px;
    }
    .tag_post{
        background-color: #4e96ff;
        color: white;
        padding: 1px 13px;
        border-radius: 15px;
    }
</style>
<?php include "layouts/header.php"; ?>

<div class="container-fluid">

    <?php $wiki=$result; ?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-9">
                <div class="" style="background-color: white;border-radius: 15px">
                    <img src="<?= URL_DIR ?>public/images/<?= $wiki->image; ?>" style="width: 100%;height: 400px" class="">
                    <p style="font-family: fantasy;">Date Creation : <?= $wiki->date_creation ?></p>
                    <h1 class="mb-4"><?= $wiki->title ?></h1>
                    <p><?= $wiki->description ?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info_autors mb-4">
                    <p>Name Autor : <strong><?= $wiki->name; ?></strong></p>
                    <p>Email Autor : <strong><?= $wiki->email; ?></strong></p>
                </div>
                <div class="info_autors mb-4">
                    <p>Category : <strong><?= $wiki->category; ?></strong></p>
                </div>
                <div class="info_autors mb-4">
                    <h4 class="mb-2">Tags</h4>
                    <?php $tags=explode(',',$wiki->wiki_tags);
                    foreach ($tags as $tag){ ?>
                        <p class="tag_post"><?= $tag ?></p>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>
<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>

</body>
</html>
