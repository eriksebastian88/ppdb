<?php 
	// session_start();
	include '../dtb/dtb.php';
	include '../inc/header-admin.php';
	include '../inc/css-admin.php';
	include '../cmd/sekolah.php';
	include 'login-proces.php';
 ?>
<form class="form form-group" method="post" action="<?php echo htmlspecialchars("login-proces")?>">
	<fieldset>
		<div class="col-sm-4">
		<legend>Admin's Login Form</legend>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
				<input type="submit" name="login" class="btn btn-success">
				<input type="reset" name="reset" class="btn btn-danger">
				
			</div>
		</div>
	</fieldset>
</form>

<?php include '../inc/footer-ppdb.php'; ?>