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
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');


    section {
        max-width: 80rem;
        background: linear-gradient(to right, #211f24 30%,  #8a8a8a);
        color: white;
        line-height: 1.5;
        font-family: 'Nunito', sans-serif;
    }

    @media (min-width: 600px) {
        section {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .about-us {
            padding: 3vw 0 3vh 3vw;
        }

        .image-wrapper {
            filter: hue-rotate(20deg);
            clip-path: polygon(0 100%, 50% 0, 100% 0, 100% 100%);
        }
    }

    .about-us {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 2rem;

        h2 {
            font-weight: 600;
            white-space: nowrap;
            font-size: clamp(2rem, 5vw, 4rem);
            margin-block-end: .5rem;
        }

        p {
            font-size: clamp(1rem, 1.5vw, 3rem);
        }
    }

    .image-wrapper {
        height: 100%;
        width: 100%;
        clip-path: polygon(0, 0, 0, 0);

        img {
            display: block;
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: right center;
        }
    }
/***********************************************************/

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
.categories_col{
    background: linear-gradient(to right, #2e2141 30%, #8a8a8a);
    text-align: center;
    width: 78%;
    height: 106px;
    padding-top: 38px;
}

</style>
<?php include "layouts/header.php"; ?>
<?php $wikis=$result[0];
$categories=$result[1]; ?>

<section>
    <div class="about-us">
        <h2>Wiki</h2>
        <p>Wikipedia is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Wikimedia Foundation.
        </p>
    </div>
    <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2940&q=80" />
    </div>
</section>

<div class="container mt-4">
    <div class="row">
        <h2 class="text-center mb-4">Latest wikis</h2>
        <?php foreach ($wikis as $wiki){ ?>
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
        <?php } ?>
    </div>
</div>

<div class="container mt-3">
    <h2 class="text-center mb-4">Categories</h2>
    <div class="row">
        <?php foreach ($categories as $category){ ?>
        <div class="col-md-3">
            <div class="categories_col">
                <strong class="" style="color: white"><?= $category->name ?></strong>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/ad5ea8d639.js" crossorigin="anonymous"></script>
<script>
    <?php if($result!=null){ ?>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    <?php } ?>
</script>
</body>
</html>
