<header id="topnav" class="<?php echo ($this->uri->segment(1) == "tutor-info") ? 'defaultscroll sticky nav-sticky' : 'defaultscroll sticky' ?>">
    <div class="container-fluid">
        <!-- Logo container-->
        <div>
            <a class="logo" href="<?php echo base_url() ?>">
                <span class="logo-light-mode">
                    <img src="<?php echo base_url('assets/web/images/halia-logo-dark.svg') ?>" class="l-dark" height="48" alt="">
                    <img src="<?php echo base_url('assets/web/images/halia-logo-light.svg') ?>" class="l-light" height="48" alt="">
                </span>
                <img src="<?php echo base_url('assets/web/images/halia-logo-light.svg') ?>" height="48" class="logo-dark-mode" alt="">
            </a>
        </div>
        <div class="buy-button">
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                if ($_SESSION['lang'] == "en") { ?>
                    <span class="flag-icon flag-icon-us"></span>
                <?php } else { ?>
                    <span class="flag-icon flag-icon-tr"></span>
                <?php } ?>
            </button>
            <ul class="dropdown-menu">
                <?php
                if ($_SESSION['lang'] == "en") { ?>
                    <li><a class="dropdown-item" href="<?php echo base_url('home/switchLang') ?>"> <span class="flag-icon flag-icon-tr"></span></a></li>
                <?php } else { ?>
                    <li><a class="dropdown-item" href="<?php echo base_url('home/switchLang') ?>"> <span class="flag-icon flag-icon-us"></span></a></li>
                <?php } ?>
            </ul>
        </div>
        <!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu $this->uri->segment(1) != "training-calendar" && $this->uri->segment(1) != "" && $this->uri->segment(1) != "welcome"-->
            <?php
            if ($this->uri->segment(1) != "training-calendar" && $this->uri->segment(1) != "course" && $this->uri->segment(1) != "blog-details" && $this->uri->segment(1) != "blog") {
                $variable = "nav-light";
            } else {
                $variable = "";
            }
            ?>
            <ul class="navigation-menu <?php echo $variable ?>">
                <?php foreach (getAllMenu() as $menuItem) {
                    if ($menuItem->parentId == 0 && $menuItem->megaMenu == 0) { ?>
                        <li><a href="<?php echo base_url($menuItem->seo_url) ?>" class="sub-menu-item"><?php echo ($_SESSION['lang'] == "en") ? $menuItem->title_en :  $menuItem->title_tr ?></a></li>
                    <?php } else if ($menuItem->parentId == 0 && $menuItem->megaMenu == 1) { ?>
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)"><?php echo ($_SESSION['lang'] == "en") ? $menuItem->title_en :  $menuItem->title_tr ?></a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <?php
                                foreach (getSubMenu($menuItem->Id) as $subMenuItem) { ?>
                                    <li><a href="<?php echo base_url($subMenuItem->seo_url) ?>" class="sub-menu-item"><?php echo ($_SESSION['lang'] == "en") ? $subMenuItem->title_en :  $subMenuItem->title_tr ?></a></li>
                                <?php } ?>

                            </ul>
                        </li>
                <?php }
                } ?>
            </ul>
            <!--end navigation menu-->
            <div class="buy-menu-btn d-none">
                <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary">Buy Now</a>
            </div>
            <!--end login button-->
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</header>
<!--end header-->