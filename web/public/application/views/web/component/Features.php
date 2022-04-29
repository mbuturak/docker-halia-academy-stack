<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="features-absolute">
                    <div class="row">
                        <?php if (isset($_SESSION['featuresItem'])) {
                            foreach ($_SESSION['featuresItem'] as $items) {
                                if ($items->isShowHome != 1) { ?>
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                                            <div class="icons text-primary text-center mx-auto">
                                                <img src="<?php echo base_url('assets/uploads/') . $items->icon ?>" width="160" alt="<?php echo $items->title_en ?>">
                                            </div>
                                            <div class="card-body p-0 content">
                                                <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark"><?php echo ($_SESSION['lang'] == "en") ? $items->title_en : $items->title_tr ?></a></h5>
                                                <?php if ($items->isShowHome != 1) { ?>
                                                    <p class="text-muted"><?php echo ($_SESSION['lang'] == "en") ? substr($items->description_en, 0, 50) : substr($items->description_tr, 0, 50) ?></p>
                                                <?php } ?>
                                                <a href="<?php echo base_url('details/') . $items->url ?>" class="text-primary"><?php echo $this->lang->line('readmore') ?><i class="uil uil-angle-right-b align-middle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                        } else {
                            foreach (getAllFeatures() as $featuresItem) {
                                if ($featuresItem->isShowHome) { ?>
                                    <style>
                                        .rectangleText {
                                            color: black;
                                            font-size: 20px !important;
                                            margin-top: 10px;
                                        }

                                        .rectangle {
                                            height: 50px;
                                            width: 500px;
                                            background-color: white;
                                            position: absolute;
                                            top: 46%;
                                            left: 50%;
                                            transform: translate(-50%, -50%);
                                            opacity: 0.9;
                                            text-align: center;

                                        }

                                        <?php $softwareImg = getFeaturesById(1);
                                        $hardwareImg = getFeaturesById(2); ?>.bgSoftwareImgCenter {
                                            background-image: url('<?php echo isset($softwareImg[0]->icon) ? base_url('assets/uploads/' . $softwareImg[0]->icon) : base_url('assets/uploads/no-image.png') ?>');
                                            background-repeat: no-repeat;
                                            height: 275px;
                                            width: 500px;
                                            background-size: cover
                                        }

                                        .bgHardwareImgCenter {
                                            background-image: url('<?php echo isset($hardwareImg[0]->icon) ? base_url('assets/uploads/' . $hardwareImg[0]->icon) : base_url('assets/uploads/no-image.png') ?>');
                                            background-repeat: no-repeat;
                                            height: 275px;
                                            width: 500px;
                                            background-size: cover
                                        }
                                    </style>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <a href="<?php echo base_url('features/') . $featuresItem->url ?>">
                                            <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center content <?php echo ($featuresItem->Id == 1) ? 'bgSoftwareImgCenter' : 'bgHardwareImgCenter' ?>">
                                                <div class="card-body p-0">
                                                    <?php if ($featuresItem->isShowHome != 1) { ?>
                                                        <p class="text-muted"><?php echo ($_SESSION['lang'] == "en") ? substr($featuresItem->description_en, 0, 50) : substr($featuresItem->description_tr, 0, 50) ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                        <?php  }
                            }
                        } ?>
                        <!--end col-->
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
    <?php $getAbout = getPages(5); ?>
    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="position-relative">
                    <img src="<?php echo base_url('assets/uploads/') . $getAbout[0]->product_img ?>" class="img-fluid mx-auto" alt="<?php echo $getAbout[0]->about_title_en ?>">
                    <?php
                    if ($getAbout[0]->video_en != "" || $getAbout[0]->video_tr != "") { ?>
                        <div class="play-icon">
                            <a href="#!" data-type="youtube" data-id="<?php echo ($_SESSION['lang'] == "en") ? $getAbout[0]->video_en : $getAbout[0]->video_tr ?>" class="play-btn lightbox">
                                <i class="mdi mdi-play text-primary rounded-circle bg-white shadow"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-4">
                    <h4 class="title mb-4"><?php echo ($_SESSION['lang'] == "en") ? $getAbout[0]->about_title_en : $getAbout[0]->about_title_tr ?></h4>
                    <p class="text-muted"><?php echo ($_SESSION['lang'] == "en") ? $getAbout[0]->about_description_en : $getAbout[0]->about_description_tr ?></p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>

<!-- Partners start -->

<section class="py-4 border-bottom border-top">
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach (getAllPartners() as $item) { ?>
                <div class="col-lg-2 col-md-2 col-6 text-center py-4">
                    <a href="<?php echo base_url('details/' . $item->seo_url) ?>"><img src="<?php echo base_url('assets/uploads/partners/' . $item->image) ?>" class="avatar avatar-ex-sm" alt="<?php echo $item->brand ?>"></a>
                </div>
            <?php } ?>
            <!--end col-->
        </div>

        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->

<!-- Partners End -->

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4">How do we works ?</h4>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-presentation-edit d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Discussion</h5>
                        <p class="text-muted mb-0">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-4 mt-md-5 pt-md-3 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent process-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-airplay d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Strategy & Testing</h5>
                        <p class="text-muted mb-0">Generators convallis odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-md-4 mt-md-5 pt-md-5 mt-4 pt-2">
                <div class="card features feature-clean work-process bg-transparent d-none-arrow border-0 text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-image-check d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body">
                        <h5 class="text-dark">Reporting</h5>
                        <p class="text-muted mb-0">Internet Proin tempus odio, vel pharetra quam malesuada vel. Nam porttitor malesuada.</p>
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

<section class="section pt-0">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tiny-single-item">
                    <?php foreach (getAllComments() as $commentItem) { ?>
                        <div class="tiny-slide">
                            <div class="card border-0 text-center">
                                <div class="card-body">
                                    <img src="<?php echo base_url('assets/uploads/comments/' . $commentItem->image) ?>" class="img-fluid avatar avatar-small rounded-circle mx-auto shadow" alt="">
                                    <p class="text-muted mt-4"><?php echo $commentItem->name ?></p>
                                    <h6 class="text-primary"><?php echo $commentItem->comment ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->


<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4"><?php echo $this->lang->line('keyfeatures') ?></h4>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <?php foreach (getAllKeywords() as $keywordsItem) { ?>
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                        <div class="icon text-center rounded-circle me-3">
                            <i data-feather="<?php echo $keywordsItem->icon ?>" class="fea icon-ex-md text-primary"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0"><?php echo ($_SESSION['lang'] == 'en') ? $keywordsItem->title_en : $keywordsItem->title_tr ?></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>


<!--end section-->
<!--end section-->