<?php $heroItem = getHero();  ?>
<section class="bg-half-170 d-table w-100" style="background: url('<?php echo base_url('assets/uploads/') . $heroItem[0]->image ?>') center center;" id="home">
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="row align-items-center mt-md-5">
			<div class="col-lg-5 col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0 order-2 order-md-1">
				<div class="card shadow rounded border-0 me-lg-3">
					<div class="card-body">
						<h5 class="card-title"><?php echo $this->lang->line('register-now') ?></h5>
						<form class="login-form" action="<?php echo base_url('DashboardApply/registerApplication') ?>" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label"><?php echo $this->lang->line('customerName') ?><span class="text-danger">*</span></label>
										<div class="form-icon position-relative">
											<i data-feather="user" class="fea icon-sm icons"></i>
											<input type="text" class="form-control ps-5" name="customerName" required="">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label"><?php echo $this->lang->line('customerBusiness') ?><span class="text-danger">*</span></label>
										<div class="form-icon position-relative">
											<i data-feather="mail" class="fea icon-sm icons"></i>
											<input type="text" class="form-control ps-5" name="customerBusiness" required="">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label"><?php echo $this->lang->line('customerPhone') ?><span class="text-danger">*</span></label>
										<div class="form-icon position-relative">
											<i data-feather="mail" class="fea icon-sm icons"></i>
											<input type="number" class="form-control ps-5" name="customerPhone" required="">
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label"><?php echo $this->lang->line('select_training') ?><span class="text-danger">*</span></label>
										<div class="form-icon position-relative">
											<select name="trainingId" class="form-select form-control">
												<?php foreach (getTraining() as $key => $trainingItem) { ?>
													<option value="<?php echo $trainingItem->Id ?>"><?php echo ($_SESSION['lang'] == 'en') ? $trainingItem->trainingName_en : $trainingItem->trainingName_tr ?></option>
												<?php } ?>

											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="d-grid">
										<button class="btn btn-success"><?php echo $this->lang->line('register') ?></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--end col-->
			<?php $heroItem = getHero();  ?>
			<div class="col-lg-7 col-md-6 order-1 order-md-2">
				<div class="title-heading mt-4 ms-lg-4">
					<h1 class="heading title-dark text-white mb-3"><?php echo ($_SESSION['lang'] == 'en') ? $heroItem[0]->title_en : $heroItem[0]->title_tr ?></h1>
					<p class="para-desc para-dark text-light"><?php echo ($_SESSION['lang'] == 'en') ? $heroItem[0]->description_en : $heroItem[0]->description_tr ?></p>
					<?php if (isset($heroItem[0]->videoLink_en)) { ?>
						<div class="mt-4 pt-2">
							<a href="#!" data-type="youtube" data-id="<?php echo $heroItem[0]->videoLink_en ?>" class="btn btn-icon btn-pills btn-primary m-1 lightbox"><i data-feather="video" class="icons"></i></a><small class="fw-bold text-uppercase text-light title-dark align-middle ms-1">Watch Now</small>
						</div>
					<?php } ?>

				</div>
			</div>
			<!--end col-->
		</div>
		<!--end row-->
	</div>
	<!--end container-->
</section>


<!-- Shape Start -->
<div class="position-relative">
	<div class="shape overflow-hidden text-white">
		<svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
		</svg>
	</div>
</div>
<!--Shape End-->