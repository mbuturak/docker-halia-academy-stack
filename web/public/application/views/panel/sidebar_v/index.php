<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo base_url('cms') ?>"><img src="<?php base_url() ?>assets/panel/images/logo/halia-logo.png" alt="Halia Logo"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="<?php echo base_url('cms') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Hoşgeldiniz</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('manage-home') ?>" class='sidebar-link'>
                        <i class="bi bi-house"></i>
                        <span>Anasayfa</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?php echo base_url('manage-about') ?>" class='sidebar-link'>
                        <i class="bi bi-file-earmark-person"></i>
                        <span>Hakkımızda</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url('manage-keywords') ?>" class='sidebar-link'>
                        <i class="bi bi-asterisk"></i>
                        <span>Anahtar Kelimeler</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hdd-rack"></i>
                        <span>Menu İşlemleri</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-menu') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-menu') ?>">Listele</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('DashboardMenu/getProductMenu/2') ?>">Yazılım Menü</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('DashboardMenu/getProductMenu/3') ?>">Donanım Menü</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-chat"></i>
                        <span>Yorumlar</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-comment') ?>">Yeni Yorum Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-comment') ?>">Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-image-alt"></i>
                        <span>Partnerlerimiz</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-partners') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-partners') ?>">Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo base_url('manage-contact') ?>" class='sidebar-link'>
                        <i class="bi bi-inboxes"></i>
                        <span>Gelen Kutusu</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-link"></i>
                        <span>Copyrights</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-copyrights') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-copyrights') ?>">Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hdd-rack"></i>
                        <span>E-Katalog</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-hardware') ?>">Yeni Ürün Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-hardware') ?>">Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-sliders"></i>
                        <span>Site Ayarları</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="manage-settings">Genel bilgiler</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>