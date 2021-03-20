<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">
		<title>Online Questionnaire</title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url();?>public/assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>public/assets/vendor/bootstrap/docs/4.0/examples/navbar-fixed/navbar-top-fixed.css" rel="stylesheet">
		<link href="<?php echo base_url();?>public/assets/css/style.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url();?>">Invoice Generate</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid bg-light">
			<div class="row">
				<div class="col-12 col-sm-8 mx-auto" style="min-height: 75rem;">
					<div class="row">
						<section class="col-6">
							<h3 class="font-weight-bold text-dark">Generate Invoice</h3>
						</section>
						<section class="col-6">
							<button class="btn btn-info btn-sm float-right mb-4" onclick="formReset('generate-invoice');">Reset Form</button>
							<div class="clearfix"></div>
						</section>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header bg-dark text-white">
									Generate Invoice
								</div>
								<div class="card-body">
									<form autocomplete="off" action="<?php echo base_url();?>invoice/generate_print" name="generate-invoice" id="generate-invoice" method="post" accept-charset="utf-8">

									<fieldset class="py-1 no-border" id="item-field-wrapper">
										<section class="row align-items-center">
											<div class="col-12">
												<div class="row">
													<div class="col-3">Item Name</div>
													<div class="col-2">Quantity</div>
													<div class="col-2">Unit Price</div>
													<div class="col-2">Tax</div>
													<div class="col-2">Total</div>
													<div class="col-1"></div>
												</div>
											</div>
											<div class="form-sm multiple-form-group col-12 mt-3">
												<input type="hidden" name="field_init_counter" id="field_init_counter" value="1">
												<div class="clearfix"></div>
												<div class="form-row form-group mb-0 align-items-center mb-3">
													<div class="col-3">
														<input type="text" data-field="dynamic-input" data-input="item-name" data-index="1" name="item_name_1" id="item_name_1" class="form-control" required="true" />
													</div>
													<div class="col-2">
														<input type="number" data-field="dynamic-input" data-input="item-quantity" data-index="1" name="item_quantity_1" id="item_quantity_1" class="form-control" required="true" />
													</div>
													<div class="col-2">
														<input type="number" data-field="dynamic-input" data-input="item-unitprice" data-index="1" name="item_unitprice_1" id="item_unitprice_1" class="form-control" required="true" />
													</div>
													<div class="col-2">
														<select data-field="dynamic-input" data-input="item-tax" data-index="1" name="item_tax_1" id="item_tax_1" class="form-control">
															<option value="0" selected="true">0</option>
															<option value="1">1%</option>
															<option value="5">5%</option>
															<option value="10">10%</option>
														</select>
													</div>
													<div class="col-2">
														<input type="number" data-field="dynamic-input" data-input="item-total-price" data-index="1" name="item_total_price_1" id="item_total_price_1" class="form-control" value="0" readonly="true" />
													</div>
													<div class="col-1 m-0 p-t-20">
														<span class="input-group-btn">
															<button type="button" class="btn btn-success btn-add btn-plus sm mt-0 btn-xs" style="font-size: 0.9rem!important;">+</button>
														</span>
													</div>
												</div>
											</div>
										</section>
									</fieldset>

									<fieldset>
										<hr/>
										<div class="row">
											<section class="col-7"></section>
											<section class="col-2">Subtotal With Tax :</section>
											<section class="col-2">
												<div class="form-row form-group">
													<input type="text" name="subtotal_with_tax" id="subtotal_with_tax" class="form-control" readonly="true"  value="0" />
												</div>
											</section>
											<section class="col-1"></section>
										</div>
										<div class="row">
											<section class="col-7"></section>
											<section class="col-2">Apply Discount :</section>
											<section class="col-2">
												<div class="form-row form-group">
													<input type="number" data-field="discount" name="discount" id="discount" class="form-control" placeholder="In Percentage"/>
												</div>
											</section>
											<section class="col-1"></section>
										</div>
										<div class="row">
											<section class="col-12"><hr/></section>
											<section class="col-7"></section>
											<section class="col-2">Total :</section>
											<section class="col-2">
												<div class="form-row form-group">
													<input type="number" name="total" id="total" class="form-control" readonly="true" />
												</div>
											</section>
											<section class="col-1"></section>
										</div>
									</fieldset>

									<fieldset>
										<div class="row">
											<section class="col-12"><hr/></section>
											<section class="col-2 mx-auto">
												<div class="form-row form-group mt-4">
													<input type="submit" name="submit" value="Generate Invoice" class="form-control btn btn-primary"/>
													<div class="clearfix"></div>
												</div>
											</section>
										</div>
									</fieldset>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo base_url();?>public/assets/vendor/jquery/jquery-3.6.0.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo base_url();?>public/assets/vendor/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="<?php echo base_url();?>public/assets/vendor/bootstrap/assets/js/vendor/popper.min.js"></script>
		<script src="<?php echo base_url();?>public/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>public/assets/js/main.js"></script>
	</body>
</html>