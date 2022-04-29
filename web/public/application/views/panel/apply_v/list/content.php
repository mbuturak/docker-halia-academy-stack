<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['keywordsItem'])) { ?>

    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['keywordsItem']->title_tr . ' kelimeyi düzenliyorsunuz.' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboradKeywords/saveKeywords/') . $_SESSION['keywordsItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon"><code>*</code> Icon -> <code><a href="https://feathericons.com" target="_blank">Icon Arşivi</a></code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="icon" value="<?php echo $_SESSION['keywordsItem']->icon ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (TR)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_tr" value="<?php echo $_SESSION['keywordsItem']->title_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (EN)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_en" value="<?php echo $_SESSION['keywordsItem']->title_en ?>" required>
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
                                        <button type="submit" class="btn btn-primary mb-1"><i class="bi bi-check2-circle me-2"></i>Kaydet</button>
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
                        <h4 class="card-title">Başvurular</h4>
                        <a href="<?php echo base_url('new-training') ?>"><button class="btn btn-primary btn-md float-end">Yeni Eğitim Oluştur</button></a>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>İsim</th>
                                        <th>Gsm</th>
                                        <th>Firma</th>
                                        <th>Eğitim</th>
                                        <th>Kayıt Tarihi</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($applicationItem as $item2) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $item2->customerName ?></td>
                                            <td><?php echo $item2->customerPhone ?></td>
                                            <td><?php echo $item2->customerBusiness ?></td>
                                            <td><?php $trainingItem = getSingleTraining($item2->trainingId);
                                                echo $trainingItem[0]->trainingName_tr ?></td>
                                            <td><?php echo $item2->isCreatedAt ?></td>
                                            <td width="10%">
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