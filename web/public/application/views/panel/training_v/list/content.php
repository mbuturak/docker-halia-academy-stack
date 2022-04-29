<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['trainingItem'])) { ?>

    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['trainingItem']->trainingName_tr . ' başlıklı eğitimi düzenliyorsunuz.' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardTraining/saveDetails/').$_SESSION['trainingItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo ($_SESSION['trainingItem']->Image != "no-image.png") ? base_url('assets/uploads/') . $_SESSION['trainingItem']->Image : base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="350" alt="...">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Eğitim Görseli</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo ($_SESSION['trainingItem']->Image != "no-image.png") ? $_SESSION['trainingItem']->Image : 'no-image.png' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="trainingName_tr" value="<?php echo $_SESSION['trainingItem']->trainingName_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-icon">Detay (TR)<code>*</code></label>
                                            <textarea class="form-control" name="trainingDescription_tr" rows="3"><?php echo $_SESSION['trainingItem']->trainingDescription_tr ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="trainingName_en" value="<?php echo $_SESSION['trainingItem']->trainingName_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-icon">Detay (EN)<code>*</code></label>
                                            <textarea class="form-control" name="trainingDescription_en" rows="3"><?php echo $_SESSION['trainingItem']->trainingDescription_en ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>Eğitmen Seçimi</label>
                                        <select name="tutorId" class="choices">
                                            <?php $getTutorInfo = getTutor($_SESSION['trainingItem']->tutorId) ?>
                                            <option value="<?php echo $getTutorInfo[0]->Id ?>" selected disabled><?php echo $getTutorInfo[0]->tutorBusiness . ' | ' . $getTutorInfo[0]->tutorName ?></option>
                                            <?php foreach (getAllTutor() as $tutorId) { ?>
                                                <option value="<?php echo $tutorId->Id ?>"><?php echo $tutorId->tutorBusiness . ' | ' . $tutorId->tutorName ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <label>Eğitim Tarihi</label>
                                            <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                                <?php $currentDate = explode(" ", $_SESSION['trainingItem']->isStartAt) ?>
                                                <input type="text" class="form-control form-select" name="isStartAt" value="<?php echo $currentDate[0] ?>">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Başlangıç Saat</label>
                                            <select name="startTime" class="form-control form-select">
                                                <option value="<?php echo $currentDate[1] ?>" selected disabled><?php echo $currentDate[1]; ?></option>
                                                <?php
                                                for ($hours = 12; $hours < 19; $hours++) // the interval for hours is '1'
                                                    echo '<option value=' . str_pad($hours, 2, '0', STR_PAD_BOTH) . ':00' . '>' . str_pad($hours, 2, '0', STR_PAD_LEFT) . ':00</option>';
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
                        <h4 class="card-title">Eğitimler</h4>
                        <a href="<?php echo base_url('new-training') ?>"><button class="btn btn-primary btn-md float-end">Yeni Eğitim Oluştur</button></a>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Görsel</th>
                                        <th>Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Eğitmen</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($trainingItem as $item2) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><img src="<?php echo base_url('assets/uploads/') . $item2->Image ?>" alt="<?php echo $item2->trainingName_en ?>" width="58"></td>
                                            <td><?php echo $item2->trainingName_tr ?></td>
                                            <td><?php echo (strlen($item2->trainingDescription_tr) >= 50) ? substr($item2->trainingDescription_tr, 50) . '...' : $item2->trainingDescription_tr ?></td>
                                            <?php $getTutor = getTutor($item2->tutorId) ?>
                                            <td><?php echo $getTutor[0]->tutorName  ?></td>
                                            <?php $date = explode(" ", $item2->isStartAt); ?>
                                            <td class="text-center"><?php echo $date[0] . '<br/>' . $date[1] . ' - ' . $item2->isEndAt ?></td>
                                            <td class="text-center statusChange-training" data-url="<?php echo base_url('DashboardTraining/statusChange') ?>" trainingId="<?php echo $item2->Id ?>"><?php echo ($item2->isActive) ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tamamlandı</span>' ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-training/') . $item2->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <button class="btn btn-danger btn-sm remove-training" data-url="<?php echo base_url('DashboardTraining/removeTraining') ?>" imageUrl="<?php echo $item2->Image ?>" trainingId="<?php echo $item2->Id ?>"><i class="bi bi-x-circle"></i></button>
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