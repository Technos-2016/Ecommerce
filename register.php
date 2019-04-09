<?php include 'header.php'; ?>
<div class="tt-breadcrumb">
	<div class="container">
		<ul>
                    <li><a href="<?= base_url();?>">Home</a></li>
			<li>Create An Account</li>
		</ul>
	</div>
</div>
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">CREATE AN ACCOUNT</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">PERSONAL INFORMATION</h2>
							<div class="form-default">
								<form id="contactform" method="post" novalidate="novalidate">
									<div class="form-group">
										<label for="loginInputName">FIRST NAME *</label>
										<div class="tt-required">* Required Fields</div>
										<input type="text" name="name" class="form-control" id="loginInputName" placeholder="Enter First Name">
									</div>
									<div class="form-group">
										<label for="loginLastName">LAST NAME *</label>
										<input type="text" name="lastName" class="form-control" id="loginLastName" placeholder="Enter Last Name">
									</div>
									<div class="form-group">
										<label for="loginInputEmail">E-MAIL *</label>
										<input type="text" name="email" class="form-control" id="loginInputEmail" placeholder="Enter E-mail">
									</div>
									<div class="form-group">
										<label for="loginInputPassword">PASSWORD *</label>
										<input type="text" name="passowrd" class="form-control" id="loginInputPassword" placeholder="Enter Password">
									</div>
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit">CREATE</button>
											</div>
										</div>
										<div class="col-auto align-self-center">
											<div class="form-group">
												<ul class="additional-links">
                                                                                                    <li>or <a href="<?= base_url(); ?>">Return to Store</a></li>
												</ul>
											</div>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

