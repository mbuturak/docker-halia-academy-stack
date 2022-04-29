<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['achievementsItem'])) { ?>
    <div class="page-heading">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $_SESSION['achievementsItem']->title_tr ?> Kazanımı düzenliyorsunuz.</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardAchievements/saveDetails/').$_SESSION['achievementsItem']->Id ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon"><code>*</code> Icon -> <code><a href="https://feathericons.com" target="_blank">Icon Arşivi</a></code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="icon" value="<?php echo $_SESSION['achievementsItem']->icon ?>" required>
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
                                            <input type="text" class="form-control" name="title_tr" value="<?php echo $_SESSION['achievementsItem']->title_tr ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Açıklama (TR)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="description_tr" value="<?php echo $_SESSION['achievementsItem']->description_tr ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-markdown"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Başlık (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="title_en" value="<?php echo $_SESSION['achievementsItem']->title_en ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Açıklama (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="description_en" value="<?php echo $_SESSION['achievementsItem']->description_en ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-markdown"></i>
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
                        <h4 class="card-title">Kazanımlar</h4>
                        <a href="<?php echo base_url('new-achievements') ?>"><button class="btn btn-primary btn-md float-end">Yeni Ekle</button></a>
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
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($achievementsItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $item->title_tr ?></td>
                                            <td><?php echo $item->title_en ?></td>
                                            <td><?php echo $item->description_tr ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-achievements/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <button class="btn btn-danger btn-sm remove-achievements" data-url="<?php echo base_url('DashboardAchievements/removeAchievements') ?>" achievementsId="<?php echo $item->Id ?>"><i class="bi bi-x-circle"></i></button>
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