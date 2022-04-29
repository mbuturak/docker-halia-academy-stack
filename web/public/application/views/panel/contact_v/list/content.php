<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['contactItem'])) { ?>

    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mesaj Yanıtlama</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardContact/sendEmail') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">İsim<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="customerName" value="<?php echo $_SESSION['contactItem']->customerName ?>" required readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Email<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="customerEmail" value="<?php echo $_SESSION['contactItem']->customerEmail ?>" required readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Telefon<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="customerPhone" value="<?php echo $_SESSION['contactItem']->customerPhone ?>" required readonly>
                                                <input type="hidden" class="form-control" name="Id" value="<?php echo $_SESSION['contactItem']->Id ?>" required readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-icon">Mesaj<code>*</code></label>
                                            <textarea name="comment" class="form-control" cols="30" rows="10" required readonly><?php echo $_SESSION['contactItem']->message ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label for="first-name-icon">Yanıt<code>*</code></label>
                                            <textarea name="recevie-message" cols="30" rows="10"><?php echo (isset($_SESSION['contactItem']->response)) ? $_SESSION['contactItem']->response : '' ?></textarea>
                                            <script>
                                                CKEDITOR.replace('recevie-message');
                                            </script>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['errors'])) { ?>
                                        <div class="card-footer mt-3">
                                            <code><?php print_r($_SESSION['errors']) ?></code>
                                        </div>
                                    <?php } ?>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mb-1"><i class="bi bi-check2-circle me-2"></i>Mesaj Gönder</button>
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
                        <h4 class="card-title">Gelen Kutusu</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>İsim</th>
                                        <th>Telefon</th>
                                        <th>Email</th>
                                        <th>Mesaj</th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($contactItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $item->customerName ?></td>
                                            <td><?php echo $item->customerPhone ?></td>
                                            <td><?php echo $item->customerEmail ?></td>
                                            <td><?php echo substr($item->message, 0, 70) . '...'; ?></td>
                                            <td><?php echo ($item->isActive) ? '<span class="badge bg-success">Yanıtlandı</span>' : '<span class="badge bg-danger">Cevap Bekliyor</span>' ?></td>
                                            <td><?php echo $item->isCreatedAt ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('DashboardContact/showMessageForm/' . $item->Id) ?>" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="<?php echo base_url('DashboardContact/removeContact/' . $item->Id) ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></a>
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