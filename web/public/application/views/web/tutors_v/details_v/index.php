<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('web/common/head'); ?>
</head>

<body>

    <?php $this->load->view('web/component/navbar'); ?>

    <!-- Hero Start -->
    <section class="bg-profile d-table w-100 bg-primary" style="background: url('<?php echo base_url('assets/uploads/tutors/header-bg.jpeg') ?>') center center; background-size:cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 text-md-start text-center">
                                    <img src="<?php echo base_url('assets/uploads/tutors/' . $tutorItem->image) ?>" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                                </div>
                                <!--end col-->

                                <div class="col-lg-10 col-md-9">
                                    <div class="row align-items-end">
                                        <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                            <h3 class="title mb-0"><?php echo $tutorItem->tutorName ?></h3>
                                            <small class="text-muted h6 me-2"><?php echo $tutorItem->tutorBusiness . ' - ' . $tutorItem->tutorTitle ?></small>
                                            <ul class="list-inline mb-0 mt-3">
                                                <?php echo (isset($tutorItem->tutorLinkedIn)) ? '<li class="list-inline-item"><a href="" class="text-muted" title="Linkedin"><i data-feather="linkedin" class="fea icon-sm me-2"></i>Profile Gözat</a></li>
                                            ' : '' ?>
                                            </ul>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--ed container-->
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">
                <div class="col-12">
                    <div class="border-bottom pb-4">
                        <p class="text-muted mb-0"><?php echo $tutorItem->tutorDetails  ?></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!--end section-->
    <!-- Profile End -->

    <?php $this->load->view('web/common/footer'); ?>
</body>

</html>