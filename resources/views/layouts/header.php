<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="<?= URL_DIR ?>public/images/wikis.png" style="width: 50px">
            Wikis</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/wikis/home/index">Home</a>
                </li>

                <?php if(isset($_SESSION['id_user'])){ ?>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="/wikis/home/index">My Posts</a>
                    </li>

                <?php } else{ ?>
                    <li class="nav-item me-3">
                        <a class="nav-link active btn btn-success" style="color: white" href="/wikis/auth/sign_in">Login</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active btn btn-success" style="color: white" href="/wikis/auth/sign_up">Sign up</a>
                    </li>
                <?php } ?>

            </ul>

        </div>
    </div>
</nav>