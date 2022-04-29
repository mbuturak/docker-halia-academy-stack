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
                        <h4 class="title"><?php echo $this->lang->line('tutors-title') ?></h4>
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
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <?php foreach ($tutors as $item) { ?>
                    <div class="col-lg-3 col-md-6 mt-4 pt-2">
                        <div class="card team text-center border-0 p-4 shadow">
                            <div class="position-relative">
                                <img src="<?php echo base_url('assets/uploads/tutors/' . $item->image) ?>" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="<?php echo $item->seo_url ?>">
                                <ul class="list-unstyled social-icon team-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="<?php echo  $item->tutorLinkedIn ?>" class="rounded" target="_blank"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                </ul>
                                <!--end icon-->
                            </div>
                            <div class="card-body py-3 px-0 content">
                                <h5 class="mb-0"><a href="<?php echo  base_url('tutor-info/' . $item->seo_url) ?>" class="name text-dark"><?php echo $item->tutorName ?></a></h5>
                                <small class="designation text-muted"><?php echo $item->tutorBusiness . '<br>' . $item->tutorTitle ?></small>
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
    <!-- End -->

    <?php $this->load->view('web/common/footer') ?>


</body>

</html>