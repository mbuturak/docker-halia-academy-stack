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
	<?php $hero = getHero(); ?>
	<section class="swiper-slider-hero position-relative d-block" style="height:60vh !important;" id="home">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach ($hero as $heroItem) { ?>
					<div class="swiper-slide d-flex align-items-center overflow-hidden">
						<div class="slide-inner slide-bg-image d-flex align-items-center" style="background: center center;" data-background="<?php echo base_url('assets/uploads/') . $heroItem->image ?>">
							<div class="bg-overlay"></div>
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-12">
										<div class="title-heading text-center">
											<h1 class="heading text-white title-dark mb-4"><?php echo ($_SESSION['lang'] == "en") ? $heroItem->title_en : $heroItem->title_tr ?></h1>
											<p class="para-desc mx-auto text-white-50"><?php echo ($_SESSION['lang'] == "en") ? $heroItem->description_en : $heroItem->description_tr ?>.</p>
										</div>
									</div>
									<!--end col-->
								</div>
								<!--end row-->
							</div>
							<!--end container-->
						</div><!-- end slide-inner -->
					</div> <!-- end swiper-slide -->
				<?php } ?>

			</div>
			<!-- end swiper-wrapper -->

			<!-- swipper controls -->
			<!-- <div class="swiper-pagination"></div> -->
			<div class="swiper-button-next border rounded-circle text-center"></div>
			<div class="swiper-button-prev border rounded-circle text-center"></div>
		</div>
		<!--end container-->
	</section>
	<!--end section-->
	<!-- Hero End -->

	<!-- FEATURES START -->
	<?php $this->load->view('web/component/features') ?>
	<!--end section-->
	<?php $this->load->view('web/common/footer'); ?>
</body>

</html>