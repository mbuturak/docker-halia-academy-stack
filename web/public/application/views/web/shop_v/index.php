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
                        <h4 class="title"><?php echo (isset($title)) ? $title : 'Bütün Ürünler' ?></h4>
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

    <!-- Start Products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="card border-0 sidebar sticky-bar">
                        <div class="card-body p-0">
                            <!-- Categories -->
                            <div class="widget mt-4 pt-2">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    <li><a href="<?php echo base_url('shop') ?>">Tüm Ürünler</a></li>
                                    <?php foreach (getHardwareMenu() as $hardwareMenuItem) { ?>
                                        <li><a href="<?php echo base_url('shop/') . $hardwareMenuItem->seo_url ?>"><?php echo ($_SESSION['lang'] == 'en') ? $hardwareMenuItem->title_en : $hardwareMenuItem->title_tr ?></a></li>
                                    <?php  } ?>
                                </ul>
                            </div>
                            <!-- Categories -->
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                    <div class="row">
                        <?php
                        if (isset($productAllItem)) {
                            foreach ($productAllItem as $prodItem) { ?>
                                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                                    <div class="card shop-list border-0 position-relative">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="<?php echo base_url('product-details/') . $prodItem->seo_url ?>"><img src="<?php echo base_url('assets/uploads/products/') . $prodItem->image ?>" class="img-fluid" alt="<?php echo $prodItem->title_tr ?>"></a>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="<?php echo base_url('product-details/') . $prodItem->seo_url ?>" class="text-dark product-name h6"><?php echo $prodItem->title_tr ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php  }
                        } elseif (isset($menuId)) {
                            foreach (getProductsByMenuId($menuId) as $prodItem2) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                                    <div class="card shop-list border-0 position-relative">
                                        <div class="shop-image position-relative overflow-hidden rounded shadow">
                                            <a href="<?php echo base_url('product-details/').$prodItem2->seo_url ?>"><img src="<?php echo base_url('assets/uploads/products/') . $prodItem2->image ?>" class="img-fluid" alt="<?php echo $prodItem2->title_tr ?>"></a>
                                        </div>
                                        <div class="card-body content pt-4 p-2">
                                            <a href="<?php echo base_url('product-details/').$prodItem2->seo_url ?>" class="text-dark product-name h6"><?php echo $prodItem2->title_tr ?></a>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->

    <?php $this->load->view('web/common/footer') ?>
</body>

</html>