<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<!-- javascript -->
<script src="<?php echo base_url() ?>assets/web/js/bootstrap.bundle.min.js"></script>
<!-- SLIDER -->
<script src="<?php echo base_url() ?>assets/web/js/tiny-slider.js "></script>
<script src="<?php echo base_url() ?>assets/web/js/swiper.min.js"></script>
<!-- tobii js -->
<script src="<?php echo base_url() ?>assets/web/js/tobii.min.js "></script>
<!-- Icons -->
 <!-- shuffle js -->
 <script src="<?php echo base_url() ?>assets/web/js/shuffle.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/js/feather.min.js"></script>
<script src="<?php echo base_url() ?>assets/web/js/custom.js"></script>
<!-- Main Js -->
<script src="<?php echo base_url() ?>assets/web/js/plugins.init.js"></script>
<!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="<?php echo base_url() ?>assets/web/js/app.js"></script>

<!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

<?php 
    if(isset($_SESSION['alert'])){
        $this->load->view('web/common/alert');
    }
?>
