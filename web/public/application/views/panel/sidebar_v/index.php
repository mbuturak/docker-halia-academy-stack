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
                    <a href="<?php echo base_url('manage-achievements') ?>" class='sidebar-link'>
                        <i class="bi bi-asterisk"></i>
                        <span>Ekstra</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-calendar-week-fill"></i>
                        <span>Akademi</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-apply') ?>">Başvurular</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-training') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-training') ?>">Eğitimleri Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Eğitmenler</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-tutor') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-tutor') ?>">Listele</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-richtext"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-blog') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-blog') ?>">Listele</a>
                        </li>
                    </ul>
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
                        <i class="bi bi-input-cursor-text"></i>
                        <span>Değerlendirme</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('new-comment') ?>">Yeni Ekle</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?php echo base_url('manage-comment') ?>">Listele</a>
                        </li>
                    </ul>
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
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>