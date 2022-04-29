<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['hardwareItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ürün Güncelleme</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardHardware/saveProduct/') . $_SESSION['hardwareItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo base_url('assets/uploads/products/') . $_SESSION['hardwareItem']->image ?>" class="rounded mx-auto d-block" width="175">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Görsel</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" value="<?php echo $_SESSION['hardwareItem']->image ?>" type="hidden">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (TR)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Başlık giriniz.." value="<?php echo $_SESSION['hardwareItem']->title_tr ?>" name="title_tr">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Açıklama (TR)</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Alt başlık giriniz.." value="<?php echo $_SESSION['hardwareItem']->description_tr ?>" name="description_tr">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">SKU<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Please enter a Title.." value="<?php echo $_SESSION['hardwareItem']->sku ?>" name="sku">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Açıklama (EN)</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Please enter a Subtitle.." value="<?php echo $_SESSION['hardwareItem']->description_en ?>" name="description_en">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label for="first-name-icon">Menü Seçimi</label>
                                                <select class="choices form-select" name="menuId" required>
                                                    <?php $menuItemName = getMenuInformation($_SESSION['hardwareItem']->menuId); ?>
                                                    <option value="<?php echo $menuItemName[0]->Id ?>" selected disabled><?php echo $menuItemName[0]->title_tr ?></option>
                                                    <?php foreach (getHardwareMenu() as $menuItem) {
                                                        if ($menuItem->Id != $_SESSION['hardwareItem']->menuId) { ?>
                                                            <option value="<?php echo $menuItem->Id ?>"><?php echo $menuItem->title_tr ?></option>
                                                    <?php }
                                                    } ?>

                                                </select>
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
                        <h4 class="card-title">Donanım Ürünleri</h4>
                        <a href="<?php echo base_url('new-hardware') ?>"><button class="btn btn-primary btn-md float-end">Yeni Ekle</button></a>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Görsel</th>
                                        <th>SKU</th>
                                        <th>Başlık</th>
                                        <th>Marka</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($hardwareItem as $item2) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><img src="<?php echo base_url('assets/uploads/products/') . $item2->image ?>" alt="<?php echo $item2->title_tr ?>" width="100"></td>
                                            <td><?php echo $item2->sku ?></td>
                                            <td><?php echo $item2->title_tr ?></td>
                                            <td><span class="badge bg-success"> <?php $menuTitle = getMenuInformation($item2->menuId);
                                                                                echo $menuTitle[0]->title_tr ?></span></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-hardware/') . $item2->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <button class="btn btn-danger btn-sm remove-keywords" data-url="<?php echo base_url('DashboradKeywords/removeKeywords') ?>" keywordsId="<?php echo $item2->Id ?>"><i class="bi bi-x-circle"></i></button>
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