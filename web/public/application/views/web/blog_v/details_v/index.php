<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('web/common/head'); ?>
</head>

<body>

    <?php $this->load->view('web/component/navbar'); ?>

    <!-- Hero Start -->
    <section class="bg-half bg-light d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h2><?php echo ($_SESSION['lang'] == "en") ? $blogItem->title_en : $blogItem->title_tr ?></h2>
                        <ul class="list-unstyled mt-4">
                            <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i><?php echo $blogItem->isCreatedAt ?></li>
                        </ul>
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

    <!-- Blog STart -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6">
                    <div class="card blog blog-detail border-0 shadow rounded">
                        <img src="<?php echo base_url('assets/uploads/blog/' . $blogItem->image) ?>" class="img-fluid rounded-top" alt="">
                        <div class="card-body content">
                            <p class="text-muted mt-3"><?php echo ($_SESSION['lang'] == "en") ? $blogItem->description_en : $blogItem->description_tr ?></p>
                        </div>
                    </div>
                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 sidebar sticky-bar rounded shadow">
                        <div class="card-body">

                            <!-- RECENT POST -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">Recent Post</h5>
                                <div class="mt-4">
                                    <?php $count = 0;
                                    foreach (getAllBlog() as $recentBlog) {
                                        $count++;
                                        if ($count < 6) { ?>
                                            <div class="clearfix post-recent">
                                                <div class="post-recent-thumb float-start"> <a href="<?php echo base_url('blog-details/' . $recentBlog->seo_url) ?>"> <img alt="img" src="<?php echo base_url('assets/uploads/blog/') . $recentBlog->image ?>" class="img-fluid rounded"></a></div>
                                                <div class="post-recent-content float-start"><a href=""<?php echo base_url('blog-details/' . $recentBlog->seo_url) ?>"><?php echo $recentBlog->title_en ?></a><span class="text-muted mt-2"><?php echo $recentBlog->isCreatedAt ?></span></div>
                                            </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <!-- RECENT POST -->
                        </div>
                    </div>
                </div>
                <!--end col-->
                <!-- END SIDEBAR -->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Blog End -->

    <?php $this->load->view('web/common/footer'); ?>
</body>

</html>