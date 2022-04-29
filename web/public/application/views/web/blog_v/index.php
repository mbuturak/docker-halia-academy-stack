<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('web/common/head') ?>
</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Navbar STart -->
    <?php $this->load->view('web/component/navbar') ?>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="bg-half bg-light d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title"><?php echo "Blog" ?></h4>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->
    <!--Blog Lists Start-->
    <section class="section">
        <div class="container">
            <div class="row">
                <?php foreach ($blog as $item) { ?>
                    <div class="col-lg-6 col-12 mb-4 pb-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="row align-items-center g-0">
                                <div class="col-md-6">
                                    <img src="<?php echo base_url('assets/uploads/blog/' . $item->image) ?>" class="img-fluid" alt="<?php echo $item->seo_url ?>">
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="card-body content">
                                        <h5><a href="<?php echo base_url('blog-details/'.$item->seo_url); ?>" class="card-title title text-dark"><?php echo ($_SESSION['lang'] == "en") ? $item->title_en : $item->title_tr ?></a></h5>
                                        <p class="text-muted mb-0"><?php echo ($_SESSION['lang'] == "en") ? substr($item->description_en, 0, 50) : substr($item->description_tr, 0, 50) ?></p>
                                        <div class="post-meta d-flex justify-content-between mt-3">
                                            <ul class="list-unstyled mb-0">
                                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-clock-two"></i><?php echo $item->isCreatedAt ?></a></li>
                                            </ul>
                                            <a href="<?php echo base_url('blog-details/'.$item->seo_url); ?>" class="text-muted readmore"><?php echo $this->lang->line('readmore') ?><i class="uil uil-angle-right-b align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end blog post-->
                    </div>
                <?php } ?>

                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section -->
    <!--Blog Lists End-->

    <?php $this->load->view('web/common/footer') ?>


</body>

</html>