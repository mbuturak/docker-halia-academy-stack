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
                        <h4 class="title"><?php echo $this->lang->line('training-title') ?></h4>
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

    <?php
    $trainingCategories = getTrainingCategories();
    $getTrainings = getTraining();
    ?>
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 filters-group-wrap">
                    <div class="filters-group">
                        <ul class="container-filter list-inline mb-0 filter-options text-center">
                            <li class="list-inline-item categories-name border text-dark rounded active" data-group="all">All</li>
                            <?php foreach ($trainingCategories as $trainingCategory) { ?>
                                <li class="list-inline-item categories-name border text-dark rounded" data-group="<?php echo $trainingCategory->Id ?>"><?php echo ($_SESSION['lang'] == "en") ? $trainingCategory->title_en : $trainingCategory->title_tr ?></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div id="grid" class="row">
                        <?php foreach ($getTrainings as $training) { ?>
                            <div class="col-md-6 col-12 mt-4 pt-2 picture-item" data-groups='["<?php echo $training->categoryId ?>"]'>
                                <div class="card border-0 work-container work-classic">
                                    <div class="card-body p-0">
                                        <a href="<?php echo base_url('course/') . $training->seo_url ?>"><img src="<?php echo base_url('assets/uploads/') . $training->Image ?>" class="img-fluid rounded work-image" alt=""></a>
                                        <div class="content pt-3">
                                            <h5 class="mb-0"><a href="<?php echo base_url('course/') . $training->seo_url ?>" class="text-dark title"><?php echo ($_SESSION['lang'] == 'en') ? $training->trainingName_en : $training->trainingName_tr ?></a></h5>
                                            <?php $categoryName = getTrainingCategoriesId($training->categoryId) ?>
                                            <h6 class="text-muted tag mb-0"><?php echo ($_SESSION['lang'] == 'en') ? $categoryName[0]->title_en : $categoryName[0]->title_tr ?></h6>
                                            <h6 class="text-muted tag mb-0"><?php echo  $training->isStartAt . ' - ' . $training->isEndAt ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        <?php } ?>
                    </div>
                    <!--end row-->
                </div>
                <div class="col-md-3">
                    <div class="card border-0 sidebar sticky-bar rounded shadow">
                        <div class="card-body">

                            <!-- Categories -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    <?php
                                    foreach ($trainingCategories as $categoryItem) { ?>
                                        <li><a href="jvascript:void(0)"><?php echo ($_SESSION['lang'] == 'en') ? $categoryItem->title_en : $categoryItem->title_tr ?></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <!-- Categories -->

                            <!-- SOCIAL -->
                            <div class="widget">
                                <h5 class="widget-title">Follow us</h5>
                                <ul class="list-unstyled social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/halia-academy" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                            <!-- SOCIAL -->
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
        <!--end container-->
    </section>
    <!-- End -->
    <!--Blog Lists End-->

    <?php $this->load->view('web/common/footer') ?>


</body>

</html>