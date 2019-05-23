<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
				</div>
				<div class="card-body">
					<form action="<?= base_url('manufacturing/addProduct'); ?>" method="post">
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" class="form-control" id="name" name="name">
							<?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price">
							<?php echo form_error('price', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="qty">Qty</label>
							<input type="text" class="form-control" id="qty" name="qty">
							<?php echo form_error('qty', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Type</label>
							<select class="form-control" name="type" id="type">
								<option value="">Select Type</option>
								<option value="Storable Product">Storable Product</option>
								<option value="Consumable">Consumable</option>
								<option value="Service">Service</option>
							</select>
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<?php foreach($category as $c) : ?>
							<select class="form-control" name="category" id="category">
								<option value="">Select Category</option>
								<option value="<?= $c['id']; ?>"><?= $c['category_name']; ?></option>
							</select>
							<?php endforeach; ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Add Product</button>
							<a href="<?= base_url('manufacturing'); ?>" class="btn btn-danger">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
