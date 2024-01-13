<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">
    <link href="<?= URL_DIR ?>public/css/datatables.css" rel="stylesheet" media="all">

</head>
<body>

<?php include "layouts/header.php"; ?>

<div class="container-fluid">

    <?php $wikis=$result; ?>

<div class="container">
    <div class="row">
        <a href="/wikis/wiki/add" class="btn btn-primary mb-4 mt-5" style="width: 230px">Add Posts</a>
        <table id="posts" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Date Creation</th>
                <th>Status</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($wikis as $wiki){ ?>
                <tr>
                    <td>
                       <a href="/wikis/wiki/post/<?= $wiki->id ?>"><?= $wiki->title; ?></a>
                    </td>
                    <td><?= substr($wiki->description, 0, 50); ?></td>
                    <td><?= $wiki->category; ?></td>
                    <td><?= $wiki->wiki_tags; ?></td>
                    <td><?= $wiki->date_creation; ?></td>
                    <td>
                        <?php if($wiki->status=='pending') $color='orange';
                        else $color='green'; ?>
                        <span style="padding: 5px;border-radius: 15px;color: white;background-color: <?= $color ?>"><?= $wiki->status ?></span>
                    </td>
                    <td>
                        <a href="/wikis/Wiki/edit/<?= $wiki->id ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/wikis/Wiki/destroy/<?= $wiki->id ?>" onclick="return confirm('Are you sure you want to delete this post ?');">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>
<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>
<script src="<?= URL_DIR ?>public/js/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#posts').DataTable();
    } );
</script>
</body>
</html>
