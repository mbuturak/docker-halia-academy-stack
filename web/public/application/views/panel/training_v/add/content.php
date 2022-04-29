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
                    <h4 class="card-title">Yeni Eğitim Oluştur</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardTraining/addTraining') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <img src="<?php echo base_url('assets/uploads/no-image.png') ?>" rounded mx-auto d-block" width="175" alt="">
                                    <div class="mb-4">
                                        <label for="formFileSm" class="form-label">Eğitim Görseli</label>
                                        <input class="form-control form-control-sm" name="image" type="file" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="trainingName_tr" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name-icon">Detay (TR)<code>*</code></label>
                                        <textarea class="form-control" name="trainingDescription_tr" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="trainingName_en" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="first-name-icon">Detay (EN)<code>*</code></label>
                                        <textarea class="form-control" name="trainingDescription_en" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Eğitmen Seçimi</label>
                                    <select name="tutorId" class="choices">
                                        <?php foreach (getAllTutor() as $tutorId) { ?>
                                            <option value="<?php echo $tutorId->Id ?>"><?php echo $tutorId->tutorBusiness . ' | ' . $tutorId->tutorName ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label>Eğitim Tarihi</label>
                                        <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                            <input type="text" class="form-control form-select" name="isStartAt">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Başlangıç Saat</label>
                                        <select name="startTime" class="form-control form-select">
                                            <?php
                                            for ($hours = 12; $hours < 19; $hours++) // the interval for hours is '1'
                                                echo '<option value=' . str_pad($hours, 2, '0', STR_PAD_BOTH).':00'. '>' . str_pad($hours, 2, '0', STR_PAD_LEFT) .':00</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if (isset($_SESSION['errors'])) { ?>
                                    <div class="card-footer mt-3">
                                        <code><?php print_r($_SESSION['errors']) ?></code>
                                    </div>
                                <?php } ?>

                                <div class="col-12 d-flex justify-content-end mt-3">
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