<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Landrick - Saas & Software Landing Page Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
	<meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
	<meta name="author" content="Shreethemes" />
	<meta name="email" content="support@shreethemes.in" />
	<meta name="website" content="https://shreethemes.in" />
	<meta name="Version" content="v3.2.0" />
	<!-- favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<!-- Bootstrap -->
	<link href="<?php echo base_url() ?>assets/web/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Icons -->
	<link href="<?php echo base_url() ?>assets/web/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
	<!-- tobii css -->
	<link href="<?php echo base_url() ?>assets/web/css/tobii.min.css" rel="stylesheet" type="text/css" />
	<!-- Main Css -->
	<link href="<?php echo base_url() ?>assets/web/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
	<link href="<?php echo base_url() ?>assets/web/css/colors/default.css" rel="stylesheet" id="color-opt">

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
	<?php $this->load->view('web/component/Navbar') ?>
	<!-- Navbar End -->

	<!-- Hero Start -->
	<section class="vh-100 d-flex align-items-center" style="background: url('<?php echo base_url() ?>assets/web/images/contact-detail.jpg') center;">
		<div class="bg-overlay bg-overlay-white"></div>
		<div class="container">
			<div class="row align-items-center">

				<div class="col-3">
					<div class="title-heading">
						<?php $settings = getSettings(); ?>
						<h1 class="heading"><?php echo $this->lang->line('contactTitle') ?></h1>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="mail" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('customerEmail') ?></h5>
								<p class="text-primary"><?php echo $settings[0]->email_tr ?></p>
							</div>
						</div>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="phone" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('customerPhone') ?></h5>
								<a href="tel:+152534-468-854" class="text-primary"><?php echo $settings[0]->phone_tr ?></a>
							</div>
						</div>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="map-pin" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('location') ?></h5>
								<a href="<?php echo $settings[0]->google_maps ?>" data-type="iframe" class="video-play-icon text-primary lightbox">Google Map</a>
							</div>
						</div>

						<ul class="list-unstyled social-icon mb-0 mt-4">
							<li class="list-inline-item"><a href="<?php echo $settings[0]->instagram ?>" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $settings[0]->linkedin ?>" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
						</ul>
						<!--end icon-->
					</div>
				</div>
				<div class="col-3">
					<div class="title-heading">
						<?php $settings = getSettings(); ?>
						<h1 class="heading"><?php echo $this->lang->line('contactTitle2') ?></h1>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="mail" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('customerEmail') ?></h5>
								<p class="text-primary"><?php echo $settings[0]->email_en ?></p>
							</div>
						</div>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="phone" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('customerPhone') ?></h5>
								<a href="tel:+152534-468-854" class="text-primary"><?php echo $settings[0]->phone_en ?></a>
							</div>
						</div>
						<div class="d-flex contact-detail align-items-center mt-3">
							<div class="icon">
								<i data-feather="map-pin" class="fea icon-m-md text-dark me-3"></i>
							</div>
							<div class="flex-1 content">
								<h5 class="title fw-bold mb-0"><?php echo $this->lang->line('location') ?></h5>
								<a href="<?php echo $settings[0]->google_maps ?>" data-type="iframe" class="video-play-icon text-primary lightbox">Google Map</a>
							</div>
						</div>

						<ul class="list-unstyled social-icon mb-0 mt-4">
							<li class="list-inline-item" style="visibility:hidden"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
							<li class="list-inline-item" style="visibility:hidden"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
						</ul>
						<!--end icon-->
					</div>
				</div>
				<div class="col-6">
					<div class="card shadow rounded border-0">
						<div class="card-body py-5">
							<h4 class="card-title"><?php echo $this->lang->line('getInTouch') ?></h4>
							<div class="custom-form mt-3">
								<form method="post" name="myForm" action="<?php echo base_url('Contact/saveContact'); ?>">
									<p id="error-msg" class="mb-0"></p>
									<div id="simple-msg"></div>
									<div class="row">
										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label"><?php echo $this->lang->line('customerName') ?> <span class="text-danger">*</span></label>
												<div class="form-icon position-relative">
													<i data-feather="user" class="fea icon-sm icons"></i>
													<input name="customerName" id="name" type="text" class="form-control ps-5" required>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="mb-3">
												<label class="form-label"><?php echo $this->lang->line('customerPhone') ?> <span class="text-danger">*</span></label>
												<div class="form-icon position-relative">
													<i data-feather="phone-call" class="fea icon-sm icons"></i>
													<input name="customerPhone" id="phone" type="number" class="form-control ps-5" required>
												</div>
											</div>
										</div>
										<!--end col-->
										<div class="col-12">
											<div class="mb-3">
												<label class="form-label"><?php echo $this->lang->line('customerEmail') ?></label>
												<div class="form-icon position-relative">
													<i data-feather="at-sign" class="fea icon-sm icons"></i>
													<input name="customerEmail" id="email" class="form-control ps-5" required>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<label class="form-label"><?php echo $this->lang->line('company') ?></label>
												<div class="form-icon position-relative">
													<i data-feather="home" class="fea icon-sm icons"></i>
													<input name="customerEmail" id="email" class="form-control ps-5" required>
												</div>
											</div>
										</div>
										<!--end col-->

										<div class="col-12">
											<div class="mb-3">
												<label class="form-label"><?php echo $this->lang->line('message') ?> <span class="text-danger">*</span></label>
												<div class="form-icon position-relative">
													<i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
													<textarea name="message" id="message" rows="4" class="form-control ps-5" placeholder="Message :" required></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" id="submit" class="btn btn-primary"><?php echo $this->lang->line('send_btn') ?></button>
											</div>
										</div>
										<!--end col-->
									</div>
									<!--end row-->
								</form>
							</div>
							<!--end custom-form-->
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
		<!--end container-->
	</section>
	<!--end section-->
	<!-- Hero End -->
	<?php $this->load->view('web/common/all_js'); ?>
</body>

</html>