<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<?= $this->session->flashdata('message'); ?>

			<a href="<?= base_url('manufacturing/addProduct'); ?>" class="btn btn-primary btn-sm">Add New Products</a>

			<table class="table table-hover mt-4">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Price</th>
						<th scope="col">Qty</th>
						<th scope="col">Type</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($products as $p) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $p['name']; ?></td>
						<td>Rp. <?= number_format($p['price'], 2, ',', '.'); ?></td>
						<td><?= $p['qty']; ?></td>
						<td><?= $p['type']; ?></td>
						<td>
							<a href="<?= base_url('manufacturing/detailProduct/') . $p['id_produk']; ?>"
								class="btn btn-info btn-sm">Detail</a>
							<a href="<?= base_url('manufacturing/editProduct/') . $p['id_produk']; ?>"
								class="btn btn-warning btn-sm">Edit</a>
							<a href="<?= base_url('manufacturing/deleteProduct/') . $p['id_produk']; ?>"
								class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
					<?php $i++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
