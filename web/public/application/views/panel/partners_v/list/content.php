<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['partnersItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['partnersItem']->brand . ' Partneri düzenliyorsunuz.' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardPartners/savePartners/' . $_SESSION['partnersItem']->Id) ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo (isset($_SESSION['partnersItem']->image)) ? base_url('assets/uploads/partners/') . $_SESSION['partnersItem']->image : 'no-image.png' ?>" class="rounded mx-auto d-block" width="175">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Görsel</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo $_SESSION['partnersItem']->image ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Partner Adı<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Başlık giriniz.." name="brand" value="<?php echo $_SESSION['partnersItem']->brand ?>" required>
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
                                                    <?php $getSingleMenu = getMenuInformationWithSeoUrl($_SESSION['partnersItem']->seo_url); ?>
                                                    <option value="<?php echo $getSingleMenu[0]->seo_url ?>" selected><?php echo $getSingleMenu[0]->title_tr ?></option>
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
                        <h4 class="card-title">Partnerlerimiz</h4>
                        <a href="<?php echo base_url('new-partners') ?>"><button class="btn btn-primary btn-md float-end">Yeni Ekle</button></a>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Görsel</th>
                                        <th>Başlık</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($partnersItem as $item2) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><img src="<?php echo base_url('assets/uploads/partners/') . $item2->image ?>" alt="<?php echo $item2->brand ?>" width="100"></td>
                                            <td><?php echo $item2->brand ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-partners/') . $item2->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <a href="<?php echo base_url('DashboardPartners/removePartners/' . $item2->Id) ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></a>
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