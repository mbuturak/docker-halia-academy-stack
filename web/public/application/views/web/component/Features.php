<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="features-absolute">
                    <div class="row">
                        <?php foreach (getAllFeatures() as $featuresItem) { ?>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                                    <div class="icons text-primary text-center mx-auto">
                                        <img src="<?php echo base_url('assets/uploads/') . $featuresItem->icon ?>" width="60" alt="<?php echo $featuresItem->title_en ?>">
                                    </div>

                                    <div class="card-body p-0 content">
                                        <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark"><?php echo ($_SESSION['lang'] == "en") ? $featuresItem->title_en : $featuresItem->title_tr ?></a></h5>
                                        <p class="text-muted"><?php echo ($_SESSION['lang'] == "en") ? $featuresItem->title_en : $featuresItem->title_tr ?></p>

                                        <a href="<?php echo base_url('details/') . $featuresItem->url ?>" class="text-primary"><?php echo $this->lang->line('readmore') ?><i class="uil uil-angle-right-b align-middle"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
            <?php foreach (getAllKeywords() as $keywordsItem) {
                # code...
            } ?>
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
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->