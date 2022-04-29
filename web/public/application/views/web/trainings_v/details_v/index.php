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
    <!--end header-->
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="bg-half bg-light d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title"><?php echo ($_SESSION['lang'] == 'en') ? $trainingDetails->trainingName_en : $trainingDetails->trainingName_tr ?></h4>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Start Work Detail -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <img src="<?php echo base_url('assets/uploads/') . $trainingDetails->Image ?>" class="img-fluid rounded" alt="">
                </div>

                <div class="col-md-10 mt-4 pt-2">
                    <div class="bg-light rounded p-4">
                        <p class="text-muted fst-italic mb-0"><?php echo ($_SESSION['lang'] == 'en') ? $trainingDetails->trainingDescription_en : $trainingDetails->trainingDescription_tr ?></p>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-12 mt-4 pt-2">
                            <div class="card work-details rounded bg-light border-0">
                                <div class="card-body">
                                    <h5 class="card-title border-bottom pb-3 mb-3">Project Info :</h5>
                                    <dl class="row mb-0">
                                        <?php $tutorInfo = getTutor($trainingDetails->tutorId); ?>
                                        <dt class="col-md-4 col-5">Client :</dt>
                                        <dd class="col-md-8 col-7 text-muted"><?php echo $tutorInfo[0]->tutorName ?></dd>
                                        <?php $categoryInfo = getTrainingCategoriesId($trainingDetails->categoryId); ?>
                                        <dt class="col-md-4 col-5">Category :</dt>
                                        <dd class="col-md-8 col-7 text-muted"><?php echo ($_SESSION['lang'] == 'en') ? $categoryInfo[0]->title_en : $categoryInfo[0]->title_tr ?></dd>

                                        <dt class="col-md-4 col-5">Date :</dt>
                                        <dd class="col-md-8 col-7 text-muted"><?php echo $trainingDetails->isStartAt . '-' . $trainingDetails->isEndAt ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Areas start -->
                    <div class="container mt-100 mt-60">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center">
                                <div class="section-title mb-4 pb-2">
                                    <h4 class="title mb-4">Değerlendirmeler</h4>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-lg-9 mt-4 pt-2 text-center">
                                <div class="tiny-single-item">
                                    <?php foreach (getComments($trainingDetails->Id) as $trainingComment) { ?>
                                        <!--end customer testi-->
                                        <div class="tiny-slide client-testi text-center">
                                            <p class="text-muted h6 fst-italic"><?php echo $trainingComment->comment ?></p>
                                            <h6 class="text-primary"><?php echo $trainingComment->name ?></h6>
                                        </div>
                                        <!--end customer testi-->
                                    <?php } ?>
                                </div>
                                <!--end owl carousel-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end container-->
                </div>

                <div class="col-12">
                    <div class="container mt-100 mt-60">
                        <div class="row">
                            <?php foreach (getCategoryTraining($trainingDetails->categoryId) as $categoryTrainingItem) {
                                if ($categoryTrainingItem->Id != $trainingDetails->Id) { ?>

                                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                                        <div class="card blog rounded border-0 shadow overflow-hidden">
                                            <div class="position-relative">
                                                <img src="<?php echo base_url('assets/uploads/') . $categoryTrainingItem->Image ?>" class="card-img-top" alt="...">
                                                <div class="overlay rounded-top bg-dark"></div>
                                            </div>
                                            <div class="card-body content">
                                                <h5><a href="<?php echo base_url('course/') . $categoryTrainingItem->seo_url ?>" class="card-title title text-dark"><?php echo ($_SESSION['lang'] == 'en') ? $categoryTrainingItem->trainingName_en : $categoryTrainingItem->trainingName_tr ?></a></h5>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                    <a href="page-blog-detail.html" class="text-muted readmore"><?php echo $this->lang->line('readmore') ?><i class="uil uil-angle-right-b align-middle"></i></a>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <small class="text-light date"><i class="uil uil-calendar-alt"></i><?php echo $categoryTrainingItem->isStartAt . '-' . $categoryTrainingItem->isEndAt ?></small>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work Detail -->



    <?php $this->load->view('web/common/footer'); ?>
</body>

</html>