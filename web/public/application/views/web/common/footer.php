<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="<?php echo base_url() ?>" class="logo-footer">
                    <img src="<?php echo base_url('assets/web/images/halia-logo-light.svg') ?>" height="72" alt="">
                </a>
                <ul class="list-unstyled social-icon mb-0 mt-4">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                </ul>
                <!--end icon-->
            </div>
            <!--end col-->

            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">Menu</h5>
                <ul class="list-unstyled footer-list mt-4">
                    <?php foreach (getAllMenu() as $mainMenu) {
                        if ($mainMenu->seo_url != "software-prod" && $mainMenu->seo_url != "hardware-product") { ?>
                            <li><a href="<?php echo $mainMenu->seo_url ?>" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i><?php echo ($_SESSION['lang'] == 'en') ? $mainMenu->title_en : $mainMenu->title_tr ?></a></li>
                    <?php }
                    } ?>

                </ul>
            </div>
            <!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head"><?php echo $this->lang->line('PTY_software') ?></h5>
                <ul class="list-unstyled footer-list mt-4">
                    <?php foreach (getSoftwareMenu() as $softwareMenu) { ?>
                        <li><a href="<?php echo base_url('details/') . $softwareMenu->seo_url ?>" class="text-foot"><i class="uil uil-angle-right-b ms-1"></i><?php echo ($_SESSION['lang'] == 'en') ? $softwareMenu->title_en : $softwareMenu->title_tr ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">© <script>
                            document.write(new Date().getFullYear())
                        </script> Halia Technology | <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#LoginForm">Copyrights</a></p>
                    <!-- Modal Content Start -->
                    <div class="modal fade" id="LoginForm" tabindex="-1" aria-labelledby="LoginForm-title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded shadow border-0">
                                <div class="modal-header border-bottom">
                                    <h5 class="modal-title" id="LoginForm-title">Copyright</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="bg-white p-3 rounded box-shadow">
                                        <ul class="list-group">
                                            <?php foreach (getAllCopyrights() as $item) { ?>
                                                <li class="list-group-item"><?php echo $item->url ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Content End -->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->

<?php $this->load->view('web/common/all_js') ?>