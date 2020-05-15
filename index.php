<?php 
session_write_close();
session_start();

$_SESSION["verification"]=20;
?>
<!doctype html><html lang="en"><head>
<!-- Required meta tags -->
<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Optional JavaScript -->
		
<!-- 		SWEETALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;800&display=swap" rel="stylesheet"> 
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<!-- OWN CSS -->
			<link rel="stylesheet" href="src/css/style.css" >
				<title>New page!</title>
			</head>
			<body>
			<?php
            include('src/includes/header.php');
            ?>
				<section class="section-banner" id="banner">
					<div class="container-fluid banner">
						<div class="row banner-row">
							<div class="col-md-5  left-section-banner" style="margin-top: 40px">
								<div class="container lft-container">
								<h1 class="h1-banner">GET A FREE BOTTLE ON US</h1>
								<h4 class="text-center">after actively taking our product for at least 7 days.*<br/>
                                No Credit Card Required - Free Shipping! </h4>
<br>
								<h6 class="justified" >*Following Conditions Apply: Customer agrees to share their honest feedback with us on our product after actively using for at least 7 days. 
                                    Limited to one free travel-sized bottle per product review, per household.
                                    The travel-sized product offering will be selected by Nuvana Nutrition. Offer valid while supplies last.
                                    This offer is NOT contingent on leaving a review on any website. Product must have been purchased through Amazon.com or NuvanaNutrition.com. </h6></div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-5 text-center right-section-banner" style="margin-top: 70px" >
								<div class="container rgh-container">
								<div class="overlay">
									<h2>Share your HONEST feedback with us and we'll send you a FREE
                                        travel-sized bottle of one of our best-selling products!
									</h2>
									<form  onsubmit="return firstForm()"  action="session.php" method="POST">
										<div class="form-group">
											<input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="full name" placeholder="Full Name">
											</div>
											<div class="form-group">
												<input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email">
												</div>

												<div class="form-group">
													<select class="browser-default custom-select" id="product" name="product">
														<option value="select" selected>Which Product Did You Purchase?</option>
														<option value="Turmeric">Turmeric</option>
														<option value="Shut Eye">Shut Eye</option>
														<option value="Cider Cleanse">Cider Cleanse</option>
													</select>
												</div>
												<div class="form-group">
													<input type="text" class="form-control" id="ordernumber" name="ordernumber" aria-describedby="order number" placeholder="Order Number">
													</div>
													<button type="submit" class="btn btn-block burnt-orange-btn">Submit</button>
												</form>
											</div>
								</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section id="steps">
							<div class="container steps text-center">
								<h2 class="text-center">Get Your FREE Bottle in 3 Simple Steps</h2>
								<div class="row three-steps">
									<div class="col-md-4">
										<span class="step-img">
											<img class="step-image" src="src/img/step1.png" alt="">
											</span>
											<span class="step-icon">
												<img src="src/img/icons/icon-1.png" alt="">
												</span>
												<h4>
													<!-- <strong class="step-strong">01.</strong> -->
                                    Fill out the Form
                                
												</h4>
												<p>Please fill out the form and use the same email address that you used for the account you purchased our product from.  This email will also be used to send tracking for your FREE bottle.</p>
											</div>
											<div class="col-md-4">
												<span class="step-img">
													<img class="step-image" src="src/img/step2.png" alt="">
													</span>
													<span class="step-icon">
														<img src="src/img/icons/icon-2.png" alt="">
														</span>
														<h4>
															<!-- <strong class="step-strong">02.</strong> -->
                                    Share your Experience
                                
														</h4>
														<p>Share your honest feedback with us so that we can continue to improve our products and service for you. Sharing your experience will help other customers in the same situation.</p>
													</div>
													<div class="col-md-4">
														<span class="step-img">
															<img class="step-image" src="src/img/step3.png" alt="">
															</span>
															<span class="step-icon">
																<img src="src/img/icons/icon-3.png" alt="">
																</span>
																<h4>
																	<!-- <strong class="step-strong">03.</strong> -->
                                    Receive your FREE Bottle
                                
																</h4>
																<p>Upon completion, you will receive your FREE travel-sized bottle of one of our best-selling products within 5 business days. Keep an eye on your inbox for tracking information.</p>
															</div>
														</div>
													</div>
												</section>
												
												<?php
               								include('src/includes/footer.php');
              							 ?>
											</body>
										</html>