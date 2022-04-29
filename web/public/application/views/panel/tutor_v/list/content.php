<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['tutorItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['tutorItem']->tutorName . ' eğitmen bilgilerini düzenliyorsunuz.' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardTutor/saveDetails/') . $_SESSION['tutorItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo ($_SESSION['tutorItem']->image != "no-image.png") ? base_url('assets/uploads/tutors/') . $_SESSION['tutorItem']->image :  base_url('assets/uploads/no-image.png') ?>" class="rounded mx-auto d-block" width="175" alt="">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Eğitimen Görseli</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo ($_SESSION['tutorItem']->image != "no-image.png") ? $_SESSION['tutorItem']->image : 'no-image.png' ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">İsim<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="tutorName" value="<?php echo $_SESSION['tutorItem']->tutorName ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Firma <code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="tutorBusiness" value="<?php echo $_SESSION['tutorItem']->tutorBusiness ?>">
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
                                                <input type="text" class="form-control" name="tutorTitle" value="<?php echo $_SESSION['tutorItem']->tutorTitle ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">LinkedIn </label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="tutorLinkedIn" value="<?php echo $_SESSION['tutorItem']->tutorLinkedIn ?>">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-markdown"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-icon">Hakkında<code>*</code></label>
                                            <textarea class="form-control" name="tutorDetails" cols="30" rows="10"><?php echo $_SESSION['tutorItem']->tutorDetails ?></textarea>
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
                        <h4 class="card-title">Eğitmenler</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Görsel</th>
                                        <th>Eğitmen</th>
                                        <th>Unvan</th>
                                        <th>Firma</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($tutorItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><img class="img-thumbnail" src="<?php echo (isset($item->image)) ? base_url('assets/uploads/tutors/') . $item->image : base_url('assets/uploads/no-image.png'); ?>" alt="" width="64"></td>
                                            <td><?php echo $item->tutorName ?></td>
                                            <td><?php echo $item->tutorTitle ?></td>
                                            <td><?php echo $item->tutorBusiness ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-tutor/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <button class="btn btn-danger btn-sm tutor-remove-btn" data-url="<?php echo base_url('DashboardTutor/removeTutor') ?>" imageUrl="<?php echo $item->image ?>" tutorId="<?php echo $item->Id ?>"><i class="bi bi-x-circle"></i></button>
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