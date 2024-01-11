<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>

<?php include "layouts/header.php"; ?>

<div class="container-fluid">

    <?php $categories=$result[0];
    $tags=$result[1]; ?>

    <div class="container mt-4">
        <div class="row">

            <form action="/wikis/wiki/create" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title of post">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="id_catg">Category</label>
                    <select class="form-control" name="id_catg">
                        <option>Default select</option>
                        <?php foreach ($categories as $category){ ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tags">Tags</label>
                    <select class="js-example-basic-multiple form-control" multiple="multiple" name="tags[]" >
                        <?php foreach ($tags as $tag){ ?>
                            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image </label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="Add">
                </div>
            </form>
        </div>
    </div>

</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>
<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>
</html>
