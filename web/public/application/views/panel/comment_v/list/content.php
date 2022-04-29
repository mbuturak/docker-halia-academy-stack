<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['commentItem'])) { ?>

    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['commentItem']->name.' kullanıcının yorumunu düzenliyorsunuz.' ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardComment/addComment') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">İsim<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['commentItem']->name ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-icon">Eğitim Seçimi<code>*</code></label>
                                            <select name="trainingId" class="form-control form-select">
                                                <?php $trainingInformation = getSingleTraining($_SESSION['commentItem']->trainingId); ?>
                                                <option value="<?php echo $trainingInformation[0]->Id ?>" selected disabled><?php echo $trainingInformation[0]->trainingName_tr ?></option>
                                                <?php foreach (getTraining() as $trainingItem) { ?>
                                                    <option value="<?php echo $trainingItem->Id ?>"><?php echo $trainingItem->trainingName_tr ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-icon">Yorum<code>*</code></label>
                                            <textarea name="comment" class="form-control" cols="30" rows="5" required><?php echo $_SESSION['commentItem']->comment ?></textarea>
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
<?php } else { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Değerlendirmeler</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>İsim</th>
                                        <th>Yorum</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($commentItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $item->name ?></td>
                                            <td><?php echo substr($item->comment, 0, 70); ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-comment/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <button class="btn btn-danger btn-sm comment-remove" data-url="<?php echo base_url('DashboardComment/removeComment') ?>" commentId="<?php echo $item->Id ?>"><i class="bi bi-x-circle"></i></button>
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