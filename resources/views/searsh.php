<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">
</head>
<body>
<style>
    .card {
        overflow: hidden;
        box-shadow: 0px 2px 20px #d7dfe2;
        background: white;
        border-radius: 0.5rem;
        position: relative;
        width: 350px;
        margin: 1rem;
        transition: 250ms all ease-in-out;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 2px 40px #d7dfe2;
    }

    .banner-img {
        position: absolute;
        object-fit: cover;
        height: 14rem;
        width: 100%;
    }

    .category-tag {
        font-size: 0.8rem;
        font-weight: bold;
        color: white;
        background: red;
        padding: 0.5rem 1.3rem 0.5rem 1rem;
        text-transform: uppercase;
        position: absolute;
        z-index: 1;
        top: 1rem;
        border-radius: 0 2rem 2rem 0;
    }

    .popular {
        background: #ef257a;
    }

    .technology {
        background: #651fff;
    }

    .psychology {
        background: #e85808;
    }

    .card-body {
        margin: 14rem 1rem 0rem 0rem;
    }

    .blog-hashtag {
        font-size: 0.9rem;
        font-weight: 500;
        color: #4d97b2;
    }

    .blog-title {
        line-height: 1.5rem;
        margin: 1rem 0 0.5rem;
    }

    .blog-description {
        color: #616b74;
        font-size: 0.9rem;
    }

    .card-profile {
        display: flex;
        margin-top: 2rem;
        align-items: center;
    }

    .profile-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }

    .card-profile-info {
        margin-left: 1rem;
    }

    .profile-name {
        font-size: 1rem;
    }

    .profile-followers {
        color: #616b74;
        font-size: 0.9rem;
    }


</style>
<?php include "layouts/header.php"; ?>
<?php $wikis=$result; ?>


<div class="container mt-4">
    <div>
        <input type="text" class="form-control" id="searsh" placeholder="Searsh with (Title,Categories,Tags)" aria-label="Username">
    </div>
    <div class="row" id="wikis_data">
        <h2 class="text-center mb-4">wikis</h2>
        <?php if(count($wikis)>0){
            foreach ($wikis as $wiki){ ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-banner">
                            <p class="category-tag popular"><?= $wiki->category ?></p>
                            <img class="banner-img" src='<?= URL_DIR ?>public/images/<?= $wiki->image ?>' alt=''>
                        </div>
                        <div class="card-body">
                            <?php $tags=explode(',',$wiki->wiki_tags);  ?>
                            <p class="blog-hashtag">
                                <?php for ($i = 0; $i < count($tags); $i++) {
                                    echo "#".$tags[$i]." ";
                                } ?>
                            </p>
                            <h3 class="blog-title"><a href="/wikis/Wiki/post/<?= $wiki->id ?>"><?= $wiki->title ?></a> </h3>
                            <p class="blog-description mt-3"><?= substr($wiki->description, 0, 50); ?></p>
                            <p>Autors : <strong><?= $wiki->name ?></strong></p>
                            <p><?= $wiki->email ?></p>

                        </div>
                    </div>
                </div>
            <?php } } else{ ?>
                <div>
                    <h4>Not found</h4>
                </div>
            <?php } ?>
    </div>
</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>
<script src="<?= URL_DIR ?>public/js/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {

        $("#searsh").on("keyup", function() {
            searshWiki();
        });

        function searshWiki() {
            var searchInput = $("#searsh").val();
            // alert(nameCheckbox);
            $.ajax({
                url: "/wikis/Wiki/getSearsh",
                method: "POST",
                data: {
                    searchInput: searchInput,
                },
                success: function(data) {
                    $("#wikis_data").html(data);
                }
            });
        }
    });
</script>
</body>
</html>
