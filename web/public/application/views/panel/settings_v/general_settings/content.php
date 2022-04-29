<div class="page-heading">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Genel Ayarlar</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardSettings/saveSettings') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Email (TR)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="email_tr" value="<?php echo $settingsItem[0]->email_tr ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Gsm (TR)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="phone_tr" value="<?php echo $settingsItem[0]->phone_tr ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Adres (TR)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="adress_tr" value="<?php echo $settingsItem[0]->adress_tr ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Email (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="email_en" value="<?php echo $settingsItem[0]->email_en?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Gsm (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="phone_en" value="<?php echo $settingsItem[0]->phone_en ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Adres (EN)<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="adress_en" value="<?php echo $settingsItem[0]->adress_en ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Google Maps<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="google_maps" value="<?php echo $settingsItem[0]->google_maps?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">LinkedIn<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="linkedin" value="<?php echo $settingsItem[0]->linkedin ?>" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Instagram<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="instagram" value="<?php echo $settingsItem[0]->instagram ?>" required>
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