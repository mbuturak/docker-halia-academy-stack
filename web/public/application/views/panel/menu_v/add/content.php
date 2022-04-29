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
                    <h4 class="card-title">Yeni Menü</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="<?php echo base_url('DashboardMenu/addMenu') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197518.png" width="16" alt=""></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="title_tr" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group has-icon-left">
                                        <code>*</code>&nbsp;Başlık <img src="https://cdn-icons-png.flaticon.com/512/197/197374.png" width="16" alt=""></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="title_en" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-fonts"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 mt-1 mb-1">
                                    <div class="form-group">
                                        <label>Sıralama</label>
                                        <input type="number" class="form-control" name="rank" required>
                                    </div>
                                </div>
                                <div class="col-4 mt-1 mb-1">
                                    <div class="form-group">
                                        <label>Menü Bağlama</label>
                                        <select class="choices form-select" name="parentId" required>
                                            <option value="0" selected>Ana Menü</option>
                                            <?php foreach (getMegaMenu() as $megaItem) { ?>
                                                <option value="<?php echo $megaItem->Id ?>"><?php echo $megaItem->title_tr ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 mt-1 mb-1">
                                    <div class="form-group">
                                        <label>Mega Menü</label>
                                        <select class="choices form-select" name="megaMenu" required>
                                            <option value="0" selected>Hayır</option>
                                            <option value="1">Evet</option>
                                           
                                        </select>
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