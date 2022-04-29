<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('web/common/head'); ?>
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
	<?php $this->load->view('web/component/hero') ?>
	<!--end section-->
	<!-- Hero End -->

	<!-- Feature Start -->
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="section-title mb-4 pb-2">
						<h4 class="title mb-4"><?php echo $this->lang->line('home-features') ?></h4>
					</div>
				</div>
				<!--end col-->
			</div>
			<!--end row-->
			<?php foreach (getAllAchievements() as $achievementsItem) {
				# code...
			} ?>
			<div class="row">
				<div class="col-md-4 col-12 mt-5">
					<div class="features text-center">
						<div class="image position-relative d-inline-block">
							<i class="uil uil-<?php echo $achievementsItem->icon ?> h1 text-primary"></i>
						</div>

						<div class="content mt-4">
							<h5><?php echo ($_SESSION['lang'] = 'en') ? $achievementsItem->title_en : $achievementsItem->title_tr ?></h5>
							<p class="text-muted mb-0"><?php echo ($_SESSION['lang'] = 'en') ? $achievementsItem->description_en : $achievementsItem->description_tr ?></p>
						</div>
					</div>
				</div>
				<!--end col-->

			</div>
			<!--end row-->
		</div>
		<!--end container-->

		<div class="container mt-100 mt-60">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="section-title mb-4 pb-2">
						<h4 class="title mb-4">See everything about your <span class="text-primary">HALIA Academy</span></h4>
					</div>
				</div>
				<!--end col-->
			</div>
			<!--end row-->

			<div class="row" id="counter">
				<div class="col-md-3 col-6 mt-4 pt-2">
					<div class="counter-box text-center">
						<img src="<?php echo base_url('assets/web/') ?>images/illustrator/Asset190.svg" class="avatar avatar-small" alt="">
						<h2 class="mb-0 mt-4"><span class="counter-value" data-target="45000">11000</span>$</h2>
						<h6 class="counter-head text-muted">Investment</h6>
					</div>
					<!--end counter box-->
				</div>

				<div class="col-md-3 col-6 mt-4 pt-2">
					<div class="counter-box text-center">
						<img src="<?php echo base_url('assets/web/') ?>images/illustrator/Asset189.svg" class="avatar avatar-small" alt="">
						<h2 class="mb-0 mt-4"><span class="counter-value" data-target="9">1</span>+</h2>
						<h6 class="counter-head text-muted">Awards</h6>
					</div>
					<!--end counter box-->
				</div>

				<div class="col-md-3 col-6 mt-4 pt-2">
					<div class="counter-box text-center">
						<img src="<?php echo base_url('assets/web/') ?>images/illustrator/Asset186.svg" class="avatar avatar-small" alt="">
						<h2 class="mb-0 mt-4"><span class="counter-value" data-target="48002">12050</span>$</h2>
						<h6 class="counter-head text-muted">Profitability</h6>
					</div>
					<!--end counter box-->
				</div>

				<div class="col-md-3 col-6 mt-4 pt-2">
					<div class="counter-box text-center">
						<img src="<?php echo base_url('assets/web/') ?>images/illustrator/Asset187.svg" class="avatar avatar-small" alt="">
						<h2 class="mb-0 mt-4"><span class="counter-value" data-target="11">3</span>%</h2>
						<h6 class="counter-head text-muted">Growth</h6>
					</div>
					<!--end counter box-->
				</div>
			</div>
			<!--end row-->
		</div>
		<!--end container-->
	</section>
	<!--end section-->
	<!-- About End -->

	<!-- Shape Start -->
	<div class="position-relative">
		<div class="shape overflow-hidden text-light">
			<svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
			</svg>
		</div>
	</div>
	<!--Shape End-->

	<!-- Footer Start -->
	<?php $this->load->view('web/common/footer') ?>
	<!--end footer-->
	<!-- Footer End -->
</body>

</html>