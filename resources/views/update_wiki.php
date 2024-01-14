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

    <?php $wiki=$result[0];
    $categories=$result[1];
    $tags=$result[2]; ?>

    <div class="container mt-4">
        <div class="row">

            <form action="/wikis/wiki/update/<?= $wiki->id ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $wiki->title ?>" placeholder="Title of post">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"><?= $wiki->description ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="id_catg">Category</label>
                    <select class="form-control" name="id_catg" value="<?= $wiki->id_catg ?>">
                        <?php foreach ($categories as $category){ ?>
                            <option  value="<?= $category->id ?>" <?php if($category->name==$wiki->category) echo 'selected' ?> ><?= $category->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tags">Tags</label>
                    <select class="js-example-basic-multiple form-control" multiple="multiple" name="tags[]" >
                        <?php
                        $tags_of_wiki=explode(',',$wiki->wiki_tags);
                        foreach ($tags as $tag){
                            $selected = in_array($tag->name, $tags_of_wiki) ? 'selected' : ''; ?>
                            <option value="<?= $tag->id ?>" <?= $selected ?> > <?= $tag->name ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image </label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <input type="hidden" name="image_wiki" value="<?= $wiki->image ?>">
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" value="Update" >
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
