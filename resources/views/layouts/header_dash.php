<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
                <div class="header-button">

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">

                            <div class="content">
                                <a class="js-acc-btn" style="text-decoration: none" href="#"><?= $_SESSION['name']; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">

                                    <div class="content">
                                        <h5 class="name">
                                             <a href="#"><?= $_SESSION['name']; ?></a>
                                        </h5>

                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                    <a href="/wikis/auth/logout">
                                        <i class="fa fa-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->