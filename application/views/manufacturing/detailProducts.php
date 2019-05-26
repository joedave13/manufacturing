<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<div class="card shadow">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="<?= base_url('assets/img/product/') . $product['image'] ?>" class="card-img">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?= $product['name']; ?></h5>
							<p class="card-text"><b>Price : </b> Rp.
								<?= number_format($product['price'], 2, ',', '.'); ?></p>
							<p class="card-text"><b>Qty On Hands : </b><?= $product['qty']; ?></p>
							<p class="card-text"><b>Type : </b><?= $product['type']; ?></p>
							<p class="card-text"><b>Category : </b><?= $product['category_name']; ?></p>
							<p class="card-text"><b>Kind Of : </b><?= $product['kind_of']; ?></p>
							<p class="card-text"><small class="text-muted">Created
									<?= date('d M Y', $product['date_created']); ?></small></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->