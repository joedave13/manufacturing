<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<?= $this->session->flashdata('message'); ?>
			<a href="<?= base_url('administrator/formUser'); ?>" class="btn btn-primary btn-sm mb-3">
				Add New User
			</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Name</th>
						<th scope="col">Role</th>
						<th scope="col">Member Since</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($listUser as $lu) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $lu['name']; ?></td>
						<td><?= $lu['role']; ?></td>
						<td><?= date('d M Y', $lu['date_created']); ?></td>
						<td>
							<a href="<?= base_url('administrator/deleteUser/') . $lu['id_user']; ?>"
								class="btn btn-danger btn-sm">
								Delete
							</a>
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
