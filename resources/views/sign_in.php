<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL_DIR ?>public/css/auth.css">
</head>
<body>

<?php include "layouts/header.php"; ?>

<div class="container-fluid">

    <?php /** @var TYPE_NAME $result */
    if($result!=null){ ?>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Auth</h2>
                    <span class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <p><?= $result ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Login Form</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form action="/Wikis/Auth/login" id="form_login" method="POST">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" placeholder="Email" required />
                            <p id="error_email" style="color: red;display: none">Email format is incorrect</p>
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" placeholder="Password" required />
                            <p id="error_password" style="color: red;display: none">Password format is incorrect</p>
                        </div>
                        <input class="button" type="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "layouts/footer.php"; ?>

<script src="<?= URL_DIR ?>public/js/bootstrap.bundle.min.js"></script>
<script src="<?= URL_DIR ?>public/js/Validation_Login.js"></script>
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
