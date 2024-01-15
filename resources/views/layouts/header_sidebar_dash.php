<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="<?= URL_DIR ?>public/images/wikis.png" style="width: 50px">
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="/wikis/Home/dashboard">
                        <i class="fas fa-map-marker-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/wikis/Category/index">
                        <i class="fas fa-table"></i>Categories</a>
                </li>
                <li>
                    <a href="/wikis/Tags/index">
                        <i class="far fa-check-square"></i>Tags</a>
                </li>
                <li>
                    <a href="/wikis/Wiki/index">
                        <i class="fas fa-calendar-alt"></i>Wikis</a>
                </li>
                <li>
                    <a href="/wikis/Wiki/archive">
                        <i class="fas fa-calendar-alt"></i>Archive</a>
                </li>


            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#" style="text-decoration: none">
            <img src="<?= URL_DIR ?>public/images/wikis.png" style="width: 50px">
            <span style="color: black;font-weight: bold;font-size: 20px">Wiki</span>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1" style="background-color: #472424">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">

                <li>
                    <a href="/wikis/Home/dashboard">
                        <i class="fas fa-chart-bar"></i>Dashboard</a>
                </li>
                <li class="active">
                    <a href="/wikis/Category/index">
                        <i class="fas fa-table"></i>Categories</a>
                </li>
                <li>
                    <a href="/wikis/Tags/index">
                        <i class="far fa-check-square"></i>Tags</a>
                </li>
                <li>
                    <a href="/wikis/Wiki/index">
                        <i class="fas fa-calendar-alt"></i>Wikis</a>
                </li>
                <li>
                    <a href="/wikis/Wiki/archive">
                        <i class="fas fa-calendar-alt"></i>Archive</a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->