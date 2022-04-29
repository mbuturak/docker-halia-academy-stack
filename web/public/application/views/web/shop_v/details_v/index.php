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

    <section class="section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="tiny-single-item">
                        <div class="tiny-slide"><img src="<?php echo base_url('assets/uploads/products/') . $productInfo->image ?>" class="img-fluid rounded" alt=""></div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="section-title ms-md-4">
                        <h4 class="title"><?php echo $productInfo->title_tr ?></h4>
                        <h6 class="text-muted"><?php echo 'SKU : '.$productInfo->sku ?></h6>
                        <h5 class="mt-3">Açıklama</h5>
                        <p class="text-muted"><?php echo ($_SESSION['lang'] == 'en') ? $productInfo->description_en : $productInfo->description_tr ?></p>
                        <div class="mt-4 pt-2">
                            <a href="#" class="btn btn-soft-primary ms-2"><?php echo $this->lang->line('addtocart') ?></a>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->


        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-0"><?php echo $this->lang->line('relatedproducts') ?></h5>
                </div>
                <!--end col-->

                <div class="col-12 mt-4">
                    <div class="tiny-four-item">
                        <?php foreach (getProductsByMenuId($productInfo->menuId) as $relatedProducts) { ?>
                            <div class="tiny-slide">
                                <div class="card shop-list border-0 position-relative m-2">
                                    <div class="shop-image position-relative overflow-hidden rounded shadow">
                                        <a href="<?php echo base_url('product-details/') . $relatedProducts->seo_url ?>"><img src="<?php echo base_url('assets/uploads/products/') . $relatedProducts->image ?>" class="img-fluid" alt="<?php echo $relatedProducts->title_tr ?>"></a>
                                        <a href="<?php echo base_url('product-details/') . $relatedProducts->seo_url ?>" class="overlay-work">
                                            <img src="images/shop/product/s-1.jpg" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body content pt-4 p-2">
                                        <a href="<?php echo base_url('product-details/') . $relatedProducts->seo_url ?>" class="text-dark product-name h6"><?php echo $relatedProducts->title_tr ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->

        <div class="container-fluid mt-100 mt-60 px-0">
        </div>
    </section>
    <!--end section-->

    <?php $this->load->view('web/common/footer') ?>
</body>

</html>