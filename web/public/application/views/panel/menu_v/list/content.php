<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['menuItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['menuItem']->about_title_tr . ' başlıklı menüyü düzenliyorsunuz..' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardMenu/saveMenuDetails/' . $_SESSION['menuItem']->Id) ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="about_title_tr" value="<?php echo $_SESSION['menuItem']->about_title_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="about_description_tr" value="<?php echo $_SESSION['menuItem']->about_description_tr ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-markdown"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                Video <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="video_tr" value="<?php echo $_SESSION['menuItem']->video_tr ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-youtube"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="about_title_en" value="<?php echo $_SESSION['menuItem']->about_title_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="about_description_en" value="<?php echo $_SESSION['menuItem']->about_description_en ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-markdown"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                Video <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="video_en" value="<?php echo $_SESSION['menuItem']->video_en ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-youtube"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-1 mb-1">
                                        <div class="form-group">
                                            <label>Menü Bağlama</label>
                                            <select class="choices form-select" name="productType">
                                                <?php
                                                if ($_SESSION['menuItem']->productType == '2') { ?>
                                                    <option value="2" selected>Yazılım Ürünleri</option>
                                                    <option value="3">Donanım Ürünleri</option>
                                                <?php } else { ?>
                                                    <option value="2">Yazılım Ürünleri</option>
                                                    <option value="3" selected>Donanım Ürünleri</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mt-3">
                                        <div class="col-md-6 col-12">
                                            <img src="<?php echo ($_SESSION['menuItem']->header_img != "no-photo.png") ? base_url("assets/uploads/" . $_SESSION['menuItem']->header_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $_SESSION['menuItem']->about_title_en ?>">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Kapak Görseli</label>
                                                <input class="form-control form-control-sm" name="header_img" type="file">
                                                <input class="form-control form-control-sm" name="old_header_img" type="hidden" value="<?php echo (isset($_SESSION['menuItem']->header_img) && ($_SESSION['menuItem']->header_img != "no-photo.png")) ? $_SESSION['menuItem']->header_img : "no-photo.png" ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <img src="<?php echo ($_SESSION['menuItem']->product_img != "no-photo.png") ? base_url("assets/uploads/" . $_SESSION['menuItem']->product_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $_SESSION['menuItem']->about_title_en ?>">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Proje Görseli</label>
                                                <input class="form-control form-control-sm" name="product_img" id="formFileSm" type="file">
                                                <input class="form-control form-control-sm" name="old_product_img" id="formFileSm" type="hidden" value="<?php echo (isset($_SESSION['menuItem']->product_img) && ($_SESSION['menuItem']->product_img != "no-photo.png")) ? $_SESSION['menuItem']->product_img : "no-photo.png" ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <?php if (isset($_SESSION['errors'])) { ?>
                                        <div class="card-footer mt-3">
                                            <code><?php print_r($_SESSION['errors']) ?></code>
                                        </div>
                                    <?php } ?>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-1"><i class="bi bi-check2-circle me-2"></i>Güncelle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Menü</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Türkçe Başlık</th>
                                        <th>İngilizce Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Durum</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($menuItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $item->title_tr ?></td>
                                            <td><?php echo $item->title_en ?></td>
                                            <td width="10%"><span class="badge <?php echo ($item->parentId == 0) ? 'bg-success' : 'bg-danger' ?>"><?php echo ($item->parentId == 0) ? 'Ana Menü' : 'Alt Menü' ?></span>
                                            </td>
                                            <td width="10%">
                                                <span class="badge <?php echo ($item->isActive) ? 'bg-success' : 'bg-warning' ?>"><?php echo ($item->isActive) ? 'Aktif' : 'Pasif' ?></span>
                                            </td>
                                            <td width="10%">
                                                <?php if ($item->parentId != 0) { ?>
                                                    <a href="<?php echo base_url('edit-menu/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <?php } ?>
                                                <button class="btn btn-danger btn-sm remove-btn" data-url="<?php echo base_url('DashboardMenu/removeMenu') ?>" menuId="<?php echo $item->Id ?>"><i class="bi bi-x-circle"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>