<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #472424">
    <style>
       /* .navbar-toggler-icon{
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'><path stroke='rgba%0, 0, 0, 0%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }*/
    </style>
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" style="color: white" href="#">
            <img src="<?= URL_DIR ?>public/images/wikis.png" style="width: 50px">
            Wikis</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link active" href="/wikis/home/index" style="color: white">Home</a>
                </li>

                <?php if(isset($_SESSION['id_user'])){ ?>
                    <li class="nav-item me-3">
                        <a class="nav-link active" style="color: white" href="/wikis/Wiki/my_posts">My Posts</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" style="color: white" href="/wikis/Wiki/searsh">Searsh</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" style="color: white" href="/wikis/Auth/logout">Logout</a>
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