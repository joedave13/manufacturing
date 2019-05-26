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
					<?= form_open_multipart(); ?>
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
						<label for="type">Type</label>
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
						<label for="kind_of">Kind Of</label>
						<select class="form-control" name="kind_of" id="kind_of">
							<option value="">Select Kind Of</option>
							<?php foreach($kind_of as $k) : ?>
							<?php if($k == $selectedProduct['kind_of']) : ?>
							<option value="<?= $k; ?>" selected><?= $k; ?></option>
							<?php else : ?>
							<option value="<?= $k; ?>"><?= $k; ?></option>
							<?php endif; ?>
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
						<label for="image">Product Image</label>
						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('assets/img/product/') . $selectedProduct['image']; ?>"
									class="img-thumbnail">
							</div>
							<div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="image" name="image">
									<label class="custom-file-label" for="image">Choose file</label>
								</div>
							</div>
						</div>
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
