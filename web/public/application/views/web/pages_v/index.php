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
    <section class="bg-half d-table w-100" style="background: url('<?php echo base_url('assets/uploads/' . $pageDetails->header_img) ?>');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"><?php echo ($_SESSION['lang'] == "en") ? $pageDetails->about_title_en : $pageDetails->about_title_tr ?></h1>
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

    <section class="section">
        <div class="container">
            <div class="row align-items-center" id="counter">
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/uploads/' . $pageDetails->product_img) ?>" class="img-fluid" alt="<?php echo $pageDetails->about_title_en ?>">
                </div>
                <!--end col-->

                <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="ms-lg-4">
                        <div class="section-title">
                            <h4 class="title mb-4"><?php echo ($_SESSION['lang'] == "en") ? $pageDetails->about_title_en : $pageDetails->about_title_tr ?><?php $getSeoUrl = getMenuInformation($pageDetails->menuId); ?>
                                <?php if ($pageDetails->productType == 3) { ?> <a href="<?php echo base_url("shop/") . $getSeoUrl[0]->seo_url ?>" class="btn btn-primary"><?php echo $this->lang->line("browseproducts") ?><i class="uil uil-angle-right-b"></i></a><?php } ?></h4>
                            <p class="text-muted"><?php echo ($_SESSION['lang'] == "en") ? $pageDetails->about_description_en : $pageDetails->about_description_tr ?></p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->

    <section class="section bg-light">
        <?php $getProcess = getProcess($pageDetails->Id);
        if (count($getProcess) > 0) { ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-4"><?php echo $this->lang->line('process') ?></h4>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <?php
                    $say = 0;
                    foreach ($getProcess as $pageDetailsItem) {
                        $say++;
                        if ($say < count($getProcess)) { ?>
                            <div class="col-md-4 mt-4 pt-2">
                                <div class="card features feature-clean bg-transparent process-arrow work-process border-0 text-center">
                                    <div class="icons text-primary text-center mx-auto">
                                        <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-dark"><?php echo ($_SESSION['lang'] == "en") ? $pageDetailsItem->title_en : $pageDetailsItem->title_tr ?></h5>
                                        <p class="text-muted mb-0"><?php echo ($_SESSION['lang'] == "en") ? $pageDetailsItem->subtitle_en : $pageDetailsItem->subtitle_tr ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-4 mt-4 pt-2">
                                <div class="card features feature-clean bg-transparent border-0 text-center">
                                    <div class="icons text-primary text-center mx-auto">
                                        <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="text-dark"><?php echo ($_SESSION['lang'] == "en") ? $pageDetailsItem->title_en : $pageDetailsItem->title_tr ?></h5>
                                        <p class="text-muted mb-0"><?php echo ($_SESSION['lang'] == "en") ? $pageDetailsItem->subtitle_en : $pageDetailsItem->subtitle_tr ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
        <?php } ?>

        <!--end container-->
    </section>
    <!-- End -->


    <?php $this->load->view('web/common/footer') ?>
</body>

</html>