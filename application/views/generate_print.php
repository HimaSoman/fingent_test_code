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
		<link href="<?php echo base_url();?>public/assets/css/print.css" rel="stylesheet">
	</head>
	<body onload="window.print();">
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
						<div class="col-12">
							<div class="card">
								<div class="card-body p-0">
									<div class="row p-5">
										<div class="col-md-6">
											<h4 class="font-weight-bold">J&D World</h4>
										</div>
										<div class="col-md-6 text-right">
											<p class="font-weight-bold mb-1">Invoice #001</p>
											<p class="text-muted">Due to: <?php echo date('d M Y');?></p>
										</div>
									</div>
									<hr class="my-5">
									<div class="row pb-5 p-5">
										<div class="col-6">
											<p class="font-weight-bold mb-4">Invoice To</p>
											<p class="mb-1">John Doe</p>
											<p>JD.Inc</p>
											<p class="mb-1">PB 000457</p>
										</div>
										<div class="col-6 text-right">
											<p class="font-weight-bold mb-4">Payment Details</p>
											<p class="mb-1"><span class="text-muted">payment Method: </span> Card</p>
											<p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
										</div>
									</div>
									<div class="row p-5">
										<div class="col-md-12">
											<table class="table">
												<thead>
													<tr>
														<th class="border-0 text-uppercase small font-weight-bold">ID</th>
														<th class="border-0 text-uppercase small font-weight-bold">Item</th>
														<th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
														<th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
														<th class="border-0 text-uppercase small font-weight-bold">Tax</th>
														<th class="border-0 text-uppercase small font-weight-bold">Total</th>
													</tr>
												</thead>
												<tbody>
														<?php
														$index = $data['field_init_counter'];
														for ($i = 0; $i <=$index ; $i++) {
															if (!empty($data['item_name_'.$i])) {
														?>
															<tr>
																<td><?php echo $i;?></td>
																<td><?php echo $data['item_name_'.$i];?></td>
																<td><?php echo $data['item_quantity_'.$i];?></td>
																<td><?php echo $data['item_unitprice_'.$i];?></td>
																<td><?php echo $data['item_tax_'.$i];?>%</td>
																<td><?php echo $data['item_total_price_'.$i];?></td>
															</tr>
														<?php
															}
														}
														?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="d-flex flex-row-reverse bg-dark text-white p-4">
										<div class="py-3 px-5 text-right">
											<div class="mb-2">Grand Total</div>
											<div class="h2 font-weight-light">$<?php echo $data['total'];?></div>
										</div>
										<div class="py-3 px-5 text-right">
											<div class="mb-2">Discount</div>
											<div class="h2 font-weight-light"><?php echo (!empty($data['discount'])) ? $data['discount']:'0';?>%</div>
										</div>
										<div class="py-3 px-5 text-right">
											<div class="mb-2">Sub - Total amount</div>
											<div class="h2 font-weight-light">$<?php echo $data['subtotal_with_tax'];?></div>
										</div>
									</div>
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