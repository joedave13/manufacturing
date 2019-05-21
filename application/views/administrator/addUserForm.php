<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<div class="card shadow">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Form Add User</h6>
				</div>
				<div class="card-body">
					<form action="<?= base_url('administrator/formUser') ?>" method="post">
						<div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
							<?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
							<?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password1" name="password1"
								placeholder="Password">
							<?php echo form_error('password1', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="repeatPassword">Repeat Password</label>
							<input type="password" class="form-control" id="password2" name="password2"
								placeholder="Repeat Password">
						</div>
						<div class="form-group">
							<label for="role">Role</label>
							<select class="form-control" name="role">
								<option value="">Select Role</option>
								<option value="1">Administrator</option>
								<option value="2">Manager</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success btn-sm">Add</button>
						<a href="<?= base_url('administrator/addUser'); ?>" class="btn btn-danger btn-sm">Kembali</a>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
