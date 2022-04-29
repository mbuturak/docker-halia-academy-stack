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
                    <h4 class="card-title">Yeni Blog</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardBlog/addBlog') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <img src="<?php echo base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175" alt="">
                                    <div class="mb-4">
                                        <label for="formFileSm" class="form-label">Blog Kapak</label>
                                        <input class="form-control form-control-sm" name="image" type="file" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Başlık (TR)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="title_tr" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name-icon">Açıklama (TR)<code>*</code></label>
                                        <textarea name="description_tr" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Başlık (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="title_en" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name-icon">Açıklama (EN)<code>*</code></label>
                                        <textarea name="description_en" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                Copyrights URL</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="copyrights_url" required>
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