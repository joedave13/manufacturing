<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Edit Product Data</h6>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<input type="hidden" name="id" id="id" value="<?= $selectedProduct['id_produk']; ?>">
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" class="form-control" id="name" name="name"
								value="<?= $selectedProduct['name']; ?>">
							<?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price"
								value="<?= $selectedProduct['price']; ?>">
							<?php echo form_error('price', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="qty">Qty</label>
							<input type="text" class="form-control" id="qty" name="qty"
								value="<?= $selectedProduct['qty']; ?>">
							<?php echo form_error('qty', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="name">Type</label>
							<select class="form-control" name="type" id="type">
								<option value="">Select Type</option>
								<?php foreach($type as $t) : ?>
								<?php if($t == $selectedProduct['type']) : ?>
								<option value="<?= $t; ?>" selected><?= $t; ?></option>
								<?php else : ?>
								<option value="<?= $t; ?>"><?= $t; ?></option>
								<?php endif;?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category" id="category">
								<option value="">Select Category</option>
								<?php foreach($category as $c) : ?>
								<?php if($c['id'] == $selectedProduct['category_id']) : ?>
								<option value="<?= $c['id']; ?>" selected><?= $c['category_name']; ?></option>
								<?php else : ?>
								<option value="<?= $c['id']; ?>"><?= $c['category_name']; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Edit Product</button>
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
