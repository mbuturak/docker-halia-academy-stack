<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['menuItem'])) {
    //Get features detail
    $data = getFeaturesBySeoUrl($_SESSION['menuInformation']->seo_url);
?>

    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['menuInformation']->title_tr . ' Menü düzenleme'  ?>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardMenu/saveMenu/') . $_SESSION['menuInformation']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_tr" value="<?php echo $_SESSION['menuInformation']->title_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_en" value="<?php echo $_SESSION['menuInformation']->title_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 mt-1 mb-1">
                                        <div class="form-group">
                                            <label>Sıralama</label>
                                            <input type="number" class="form-control" name="rank" value="<?php echo $_SESSION['menuInformation']->rank ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-1 mb-1">
                                        <div class="form-group">
                                            <label>Menü Bağlama</label>
                                            <select class="choices form-select" name="parentId" required>
                                                <?php $menuTitle = getMenuInformation($_SESSION['menuInformation']->parentId) ?>
                                                <option value="<?php echo $_SESSION['menuInformation']->parentId ?>">
                                                    <?php echo $menuTitle[0]->title_tr ?></option>
                                                <option value="0">Ana Menü</option>
                                                <?php foreach (getMegaMenu() as $megaItem) { ?>
                                                    <option value="<?php echo $megaItem->Id ?>">
                                                        <?php echo $megaItem->title_tr ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mt-1 mb-1">
                                        <div class="form-group">
                                            <label>Mega Menü</label>
                                            <select class="choices form-select" name="megaMenu" required>
                                                <?php
                                                if ($_SESSION['menuInformation']->megaMenu) { ?>
                                                    <option value="0">Hayır</option>
                                                    <option value="1" selected>Evet</option>
                                                <?php } else { ?>
                                                    <option value="0" selected>Hayır</option>
                                                    <option value="1">Evet</option>
                                                <?php } ?>
                                            </select>
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
    <?php
    if (count($data) > 0) { ?>
        <div class="page-heading">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Features Düzenleme
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="<?php echo base_url('DashboardHome/saveFeaturesSpesific/') . $data[0]->Id ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="<?php echo isset($data[0]->icon) ? base_url('assets/uploads/' . $data[0]->icon) : base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Görsel</label>
                                                <input class="form-control form-control-sm" name="icon" type="file">
                                                <input class="form-control form-control-sm" name="old_icon" value="<?php echo (isset($data[0]->icon)) ? $data[0]->icon : 'no-image.png' ?>" type="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_tr" value="<?php echo $data[0]->title_tr ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_en" value="<?php echo $data[0]->title_en ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
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
                                            <a href="<?php echo base_url('DashboardHome/removeFeatures/' . $data[0]->Id) ?>" class="btn btn-danger mb-1" style="margin-left:5px"><i class="bi bi-trash"></i>Sil</a>
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
        <div class="alert alert-info m-3">Henüz bu menü için features eklenmemiştir. Eklemek için hemen <a href="<?php echo base_url('new-features'); ?>">buraya</a> tıklayın.</div>
    <?php } ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <?php echo $_SESSION['menuItem']->about_title_tr . ' başlıklı sayfayı düzenliyorsunuz..' ?></h4>
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

                                    <div class="col-6 mt-1 mb-1">
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
                                    <?php
                                    if ($_SESSION['menuItem']->productType == '3') { ?>
                                        <div class="col-6 mt-1 mb-1">
                                            <label for="formFileSm" class="form-label">Ürün Katalogu
                                                <?php echo ($_SESSION['menuItem']->catalog != "no-catalog.pdf" && ($_SESSION['menuItem']->catalog != null) ? '<a href=' . base_url('assets/uploads/catalog/') . $_SESSION['menuItem']->catalog . '><span class="badge bg-success">Görüntüle</span></a>' : '<span class="badge bg-danger">Katalog Eklenmedi</span>') ?></label>
                                            <input class="form-control form-control-sm" name="catalog" type="file">
                                            <input class="form-control form-control-sm" name="old_catalog" type="hidden" value="<?php echo (isset($_SESSION['menuItem']->catalog) && ($_SESSION['menuItem']->catalog != null)) ? $_SESSION['menuItem']->header_img : "no-catalog.pdf" ?>">
                                        </div>
                                    <?php  } ?>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-md-6 col-12">
                                            <img src="<?php echo ($_SESSION['menuItem']->header_img != "no-image.png") ? base_url("assets/uploads/" . $_SESSION['menuItem']->header_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $_SESSION['menuItem']->about_title_en ?>">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Kapak Görseli</label>
                                                <input class="form-control form-control-sm" name="header_img" type="file">
                                                <input class="form-control form-control-sm" name="old_header_img" type="hidden" value="<?php echo (isset($_SESSION['menuItem']->header_img) && ($_SESSION['menuItem']->header_img != "no-image.png")) ? $_SESSION['menuItem']->header_img : "no-image.png" ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <img src="<?php echo ($_SESSION['menuItem']->product_img != "no-image.png") ? base_url("assets/uploads/" . $_SESSION['menuItem']->product_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $_SESSION['menuItem']->about_title_en ?>">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Proje Görseli</label>
                                                <input class="form-control form-control-sm" name="product_img" type="file">
                                                <input class="form-control form-control-sm" name="old_product_img" type="hidden" value="<?php echo (isset($_SESSION['menuItem']->product_img) && ($_SESSION['menuItem']->product_img != "no-image.png")) ? $_SESSION['menuItem']->product_img : "no-image.png" ?>">
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
    <?php
    $processItem = getProcessByPagesId($_SESSION['menuItem']->Id);
    if (isset($processItem)) { ?>
        <div class="page-heading">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Proccess</h4>
                            <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#inlineForm">Yeni Process</button>
                            <!--Add Process Modal -->
                            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Yeni Process</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form id="contactForm" class="contactForm" action="<?php echo base_url('DashboardMenu/addProcess/' . $_SESSION['menuItem']->Id) ?>" method="POST" name="contact" role="form">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="name">Icon |&nbsp;<a href="http://icon-sets.iconify.design/uil/" target="_blank" class="badge bg-warning">Icon Arşivi</a></label>
                                                            <input type="text" name="Icon" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Başlık (TR)</label>
                                                            <input type="text" name="title_tr" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Başlık (EN)</label>
                                                            <input type="text" name="title_en" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Kısa Açıklama (TR)</label>
                                                            <textarea class="form-control" name="subtitle_tr" rows="3" style="height: 113px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Kısa Açıklama (EN)</label>
                                                            <textarea class="form-control" name="subtitle_en" rows="3" style="height: 113px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Aktif</label>
                                                            <select name="isActive" class="form-control form-select">
                                                                <option value="1" selected>Aktif</option>
                                                                <option value="0">Pasif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="name">Sıralama</label>
                                                            <input type="text" name="rank" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-success" id="submit" value="Kaydet" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Icon</th>
                                            <th>Başlık</th>
                                            <th>Açıklama</th>
                                            <th>Durum</th>
                                            <th>Sıralama</th>
                                            <th>Aksyion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($processItem as $item) {
                                            $no++; ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $item->Icon ?></td>
                                                <td><?php echo $item->title_tr ?></td>
                                                <td><?php echo substr($item->subtitle_tr, 0, 75) ?></td>
                                                <td width="10%">
                                                    <span class="badge <?php echo ($item->isActive) ? 'bg-success' : 'bg-warning' ?>"><?php echo ($item->isActive) ? 'Aktif' : 'Pasif' ?></span>
                                                </td>
                                                <td><?php echo $item->rank ?></td>
                                                <td width="10%">
                                                    <a href="<?php echo base_url('edit-menu/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                    <a href="<?php echo base_url('DashboardMenu/removeMenu/') . $item->Id ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
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
    <?php } else { ?>
        <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
            Bu sayfa için bir process kaydı mevcut değil. Yeni bir process eklemek için <a href="#" data-bs-toggle="modal" data-bs-target="#inlineForm">tıklayın!</a></div>
        <!--Add Process Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Yeni Process</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form id="contactForm" class="contactForm" action="<?php echo base_url('DashboardMenu/addProcess/' . $_SESSION['menuItem']->Id) ?>" method="POST" name="contact" role="form">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Icon |&nbsp;<a href="http://icon-sets.iconify.design/uil/" target="_blank" class="badge bg-warning">Icon Arşivi</a></label>
                                        <input type="text" name="Icon" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Başlık (TR)</label>
                                        <input type="text" name="title_tr" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Başlık (EN)</label>
                                        <input type="text" name="title_en" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Kısa Açıklama (TR)</label>
                                        <textarea class="form-control" name="subtitle_tr" rows="3" style="height: 113px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Kısa Açıklama (EN)</label>
                                        <textarea class="form-control" name="subtitle_en" rows="3" style="height: 113px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Aktif</label>
                                        <select name="isActive" class="form-control form-select">
                                            <option value="1" selected>Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Sıralama</label>
                                        <input type="text" name="rank" class="form-control" required>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" id="submit" value="Kaydet" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }
} else {
    if (isset($_SESSION['software'])) {
        //Get software Item
        $softwareData = getFeaturesById(1);
    ?>
        <div class="page-heading">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $softwareData[0]->title_tr . ' düzenleme'  ?>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="<?php echo base_url('DashboardHome/saveFeaturesSpesific/') . $softwareData[0]->Id ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="<?php echo isset($softwareData[0]->icon) ? base_url('assets/uploads/' . $softwareData[0]->icon) : base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Görsel</label>
                                                <input class="form-control form-control-sm" name="icon" type="file">
                                                <input class="form-control form-control-sm" name="old_icon" value="<?php echo (isset($softwareData[0]->icon)) ? $softwareData[0]->icon : 'no-image.png' ?>" type="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_tr" value="<?php echo $softwareData[0]->title_tr ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_en" value="<?php echo $softwareData[0]->title_en ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
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
                                        foreach ($_SESSION['software'] as $softwareItem) {
                                            if ($softwareItem->parentId == 2) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $softwareItem->title_tr ?></td>
                                                    <td><?php echo $softwareItem->title_en ?></td>
                                                    <td width="10%"><span class="badge <?php echo ($softwareItem->parentId == 0) ? 'bg-success' : 'bg-danger' ?>"><?php echo ($softwareItem->parentId == 0) ? 'Ana Menü' : 'Alt Menü' ?></span>
                                                    </td>
                                                    <td width="10%">
                                                        <span class="badge <?php echo ($softwareItem->isActive) ? 'bg-success' : 'bg-warning' ?>"><?php echo ($softwareItem->isActive) ? 'Aktif' : 'Pasif' ?></span>
                                                    </td>
                                                    <td width="10%">
                                                        <?php if ($softwareItem->parentId != 0) { ?>
                                                            <a href="<?php echo base_url('edit-menu/') . $softwareItem->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url('DashboardMenu/removeMenu/') . $softwareItem->Id ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } elseif (isset($_SESSION['hardware'])) {  //Get software Item
        $softwareData = getFeaturesById(2);
    ?>
        <div class="page-heading">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $softwareData[0]->title_tr . ' düzenleme'  ?>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="<?php echo base_url('DashboardHome/saveFeaturesSpesific/') . $softwareData[0]->Id ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="<?php echo isset($softwareData[0]->icon) ? base_url('assets/uploads/' . $softwareData[0]->icon) : base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Görsel</label>
                                                <input class="form-control form-control-sm" name="icon" type="file">
                                                <input class="form-control form-control-sm" name="old_icon" value="<?php echo (isset($softwareData[0]->icon)) ? $softwareData[0]->icon : 'no-image.png' ?>" type="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_tr" value="<?php echo $softwareData[0]->title_tr ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="title_en" value="<?php echo $softwareData[0]->title_en ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-fonts"></i>
                                                    </div>
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
                                        foreach ($_SESSION['hardware'] as $hardwareItem) {
                                            if ($hardwareItem->parentId == 3) {
                                                $no++;
                                        ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $hardwareItem->title_tr ?></td>
                                                    <td><?php echo $hardwareItem->title_en ?></td>
                                                    <td width="10%"><span class="badge <?php echo ($hardwareItem->parentId == 0) ? 'bg-success' : 'bg-danger' ?>"><?php echo ($hardwareItem->parentId == 0) ? 'Ana Menü' : 'Alt Menü' ?></span>
                                                    </td>
                                                    <td width="10%">
                                                        <span class="badge <?php echo ($hardwareItem->isActive) ? 'bg-success' : 'bg-warning' ?>"><?php echo ($hardwareItem->isActive) ? 'Aktif' : 'Pasif' ?></span>
                                                    </td>
                                                    <td width="10%">
                                                        <?php if ($hardwareItem->parentId != 0) { ?>
                                                            <a href="<?php echo base_url('edit-menu/') . $hardwareItem->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                        <?php } ?>
                                                        <a href="<?php echo base_url('DashboardMenu/removeMenu/') . $hardwareItem->Id ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
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
                                            $no++;
                                            if ($item->parentId != 2 && $item->parentId != 3 && $item->Id != 2 && $item->Id != 3) {
                                        ?>
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
                                                        <a href="<?php echo base_url('DashboardMenu/removeMenu/') . $item->Id ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></button>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>