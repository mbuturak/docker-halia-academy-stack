<div class="page-heading">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hakkımızda sayfasını düzenliyorsunuz..</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardAbout/saveDetails/' . $aboutItem->Id) ?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="about_title_tr" value="<?php echo $aboutItem->about_title_tr ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="about_description_tr" value="<?php echo $aboutItem->about_description_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            Video <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="video_tr" value="<?php echo $aboutItem->video_tr ?>">
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
                                            <input type="text" class="form-control" name="about_title_en" value="<?php echo $aboutItem->about_title_en ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Açıklama <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="about_description_en" value="<?php echo $aboutItem->about_description_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            Video <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="video_en" value="<?php echo $aboutItem->video_en ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-youtube"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col-md-6 col-12">
                                        <img src="<?php echo ($aboutItem->header_img != "no-photo.png") ? base_url("assets/uploads/" . $aboutItem->header_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $aboutItem->about_title_en ?>">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Kapak Görseli</label>
                                            <input class="form-control form-control-sm" name="header_img" type="file">
                                            <input class="form-control form-control-sm" name="old_header_img" type="hidden" value="<?php echo (isset($aboutItem->header_img)) ? $aboutItem->header_img : "no-photo.png" ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <img src="<?php echo ($aboutItem->product_img != "no-photo.png") ? base_url("assets/uploads/" . $aboutItem->product_img) : 'https://via.placeholder.com/200' ?>" class="rounded mx-auto d-block" width="175" alt="<?php echo $aboutItem->about_title_en ?>">
                                        <div class="mb-3">
                                            <label for="formFileSm" class="form-label">Proje Görseli</label>
                                            <input class="form-control form-control-sm" name="product_img" id="formFileSm" type="file">
                                            <input class="form-control form-control-sm" name="old_product_img" id="formFileSm" type="hidden" value="<?php echo (isset($aboutItem->product_img)) ? $aboutItem->product_img : "no-photo.png" ?>">
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