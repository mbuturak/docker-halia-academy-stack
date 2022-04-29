<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Yeni Ekle</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardPartners/addPartners') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <img src="<?php echo base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175">
                                    <div class="mb-4">
                                        <label for="formFileSm" class="form-label">Görsel</label>
                                        <input class="form-control form-control-sm" name="image" type="file" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Partner Adı<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Başlık giriniz.." name="brand" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <div class="form-group">
                                            <label for="first-name-icon">Menü Seçimi</label>
                                            <select class="choices form-select" name="seo_url" required>
                                                <?php foreach (getHardwareMenu() as $menuItem) { ?>
                                                    <option value="<?php echo $menuItem->seo_url ?>"><?php echo $menuItem->title_tr ?></option>
                                                <?php } ?>

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
                                    <button type="submit" class="btn btn-primary mb-1"><i class="bi bi-check2-circle me-2"></i>Ekle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>