<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<?php if (isset($_SESSION['heroItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['heroItem']->title_tr . ' başlıklı alanı düzenliyorsunuz..' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('manage-home-save/') . $_SESSION['heroItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo ($_SESSION['heroItem']->image != "no-photo.png") ? base_url("assets/uploads/" . $_SESSION['heroItem']->image) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $_SESSION['heroItem']->title_en ?>">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Arkaplan Görseli</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo (isset($_SESSION['heroItem']->image) && ($_SESSION['heroItem']->image != "no-photo.png")) ? $_SESSION['heroItem']->image : "no-photo.png" ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (TR)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Başlık giriniz.." name="title_tr" value="<?php echo $heroItem[0]->title_tr ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Alt Başlık (TR)</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Alt başlık giriniz.." name="description_tr" value="<?php echo $heroItem[0]->description_tr ?>">
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
                                                <input type="text" class="form-control" placeholder="Please enter a Title.." name="title_en" value="<?php echo $heroItem[0]->title_en ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Alt Başlık (EN)</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Please enter a Subtitle.." name="description_en" value="<?php echo $heroItem[0]->description_en ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Sıra</label>
                                            <input class="form-control form-control-sm" name="rank" type="text" value="<?php echo $_SESSION['heroItem']->rank ?>">
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
                        <h4 class="card-title">Hero</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardHome/saveDetails') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_tr" value="<?php echo $heroItem->title_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="description_tr" value="<?php echo $heroItem->description_tr ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-markdown"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                Video <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="videoLink_tr" value="<?php echo $heroItem->videoLink_tr ?>">
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
                                                <input type="text" class="form-control" name="title_en" value="<?php echo $heroItem->title_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="description_en" value="<?php echo $heroItem->description_en ?>" required>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-markdown"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                Video <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="videoLink_en" value="<?php echo $heroItem->videoLink_en ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-youtube"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mt-3">
                                        <div class="col-12">
                                            <img src="<?php echo ($heroItem->image != "no-photo.png") ? base_url("assets/uploads/" . $heroItem->image) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $heroItem->title_en ?>">
                                            <div class="mb-4">
                                                <label for="formFileSm" class="form-label">Kapak Görseli</label>
                                                <input class="form-control form-control-sm" name="image" type="file">
                                                <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo (isset($heroItem->image) && ($heroItem->image != "no-photo.png")) ? $heroItem->image : "no-photo.png" ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                Copyrights URL</label>
                                                <div class="position-relative">
                                                    <?php $copyItem = getSingleCopyrights($heroItem->Id); ?>
                                                    <input type="text" class="form-control" name="copyrights_url" value="<?php echo (isset($copyItem[0]->url)) ? htmlspecialchars($copyItem[0]->url) : '' ?>">
                                                    <input type="hidden" class="form-control" name="contentId" value="<?php echo $heroItem->Id ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-asterisk"></i>
                                                    </div>
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
<?php } ?>