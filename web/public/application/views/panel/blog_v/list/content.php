<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<?php
if (isset($_SESSION['blogItem'])) { ?>
    <div class="page-heading">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $_SESSION['blogItem']->title_tr ?></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?php echo base_url('DashboardBlog/saveBlog/') . $_SESSION['blogItem']->Id ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="<?php echo (isset($_SESSION['blogItem']->image)) ? base_url('assets/uploads/blog/') . $_SESSION['blogItem']->image : base_url('assets/uploads/no-image.png')  ?>" class="rounded mx-auto d-block" width="175" alt="">
                                        <div class="mb-4">
                                            <label for="formFileSm" class="form-label">Blog Kapak</label>
                                            <input class="form-control form-control-sm" name="image" type="file">
                                            <input class="form-control form-control-sm" name="old_image" type="hidden" value="<?php echo $_SESSION['blogItem']->image ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (TR)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_tr" value="<?php echo $_SESSION['blogItem']->title_tr ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-icon">Açıklama (TR)<code>*</code></label>
                                            <textarea name="description_tr" class="form-control" cols="30" rows="10" required><?php echo $_SESSION['blogItem']->description_tr ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Başlık (EN)<code>*</code></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="title_en" value="<?php echo $_SESSION['blogItem']->title_en ?>" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-fonts"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name-icon">Açıklama (EN)<code>*</code></label>
                                            <textarea name="description_en" class="form-control" cols="30" rows="10" required><?php echo $_SESSION['blogItem']->description_en ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                Copyrights URL</label>
                                                <div class="position-relative">
                                                    <?php $copyItem = getSingleCopyrights($_SESSION['blogItem']->Id); ?>
                                                    <input type="text" class="form-control" name="copyrights_url" value="<?php echo (isset($copyItem[0]->url)) ? htmlspecialchars($copyItem[0]->url) : '' ?>">
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
                                        <th>Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Durum</th>
                                        <th>Aksyion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($blogItem as $item) {
                                        $no++; ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><img class="img-thumbnail" src="<?php echo (isset($item->image)) ? base_url('assets/uploads/blog/') . $item->image : base_url('assets/uploads/no-image.png'); ?>" alt="" width="64"></td>
                                            <td><?php echo $item->title_tr ?></td>
                                            <td><?php echo (strlen($item->description_tr) > 50) ? substr($item->description_tr, 0, 50) . '...' : $item->description_tr ?></td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('DashboardBlog/blogChangeStatus/' . $item->Id) ?>"><span class="badge <?php echo ($item->isActive) ? 'bg-success' : 'bg-danger' ?>"><?php echo ($item->isActive) ? 'Aktif' : 'Pasif' ?></span></a>
                                            </td>
                                            <td width="10%">
                                                <a href="<?php echo base_url('edit-blog/') . $item->Id ?>"><button class="btn btn-primary btn-sm"><i class="bi bi-arrow-right-circle"></i></button></a>
                                                <a href="<?php echo base_url('DashboardBlog/removeBlog/' . $item->Id) ?>" class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></a>
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