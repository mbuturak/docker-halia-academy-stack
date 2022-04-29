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
                    <h4 class="card-title">Yeni Eğitmen</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardTutor/addTutor') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <img src="<?php echo base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175" alt="">
                                    <div class="mb-4">
                                        <label for="formFileSm" class="form-label">Eğitimen Görseli</label>
                                        <input class="form-control form-control-sm" name="image" type="file" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">İsim<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="tutorName">
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Firma <code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="tutorBusiness">
                                            <div class="form-control-icon">
                                                <i class="bi bi-markdown"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Unvan<code>*</code></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="tutorTitle">
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">LinkedIn </label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="tutorLinkedIn">
                                            <div class="form-control-icon">
                                                <i class="bi bi-markdown"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-icon">Hakkında<code>*</code></label>
                                        <textarea class="form-control" name="tutorDetails" cols="30" rows="10"></textarea>
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