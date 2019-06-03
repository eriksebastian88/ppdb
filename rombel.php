<?php 
	include '../dtb/dtb.php';
	include '../cmd/status-daftar.php';
	// include 'session.php';
	$siswa = $db->query("SELECT * FROM formulir WHERE parent = 0");

 ?>
<hr><h1 class="text-center text-muted">Siswa yang belum di terima</h1><hr>
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<form class="form" method="POST">
			<div class="form-group">
			 	<select name="siswa" class="form-control">
			 		<?php 
			 			while($s = $siswa->fetch(PDO::FETCH_ASSOC)){
			 		 ?>
			 		<option value="<?=$s['id']?>"><?=$s['fn']?></option>
			 	<?php }?>
			 	</select>
			</div>
			<div class="form-group">
			 	<select name="status" class="form-control">
			 		<?php 
			 			while($ds = $stdf->fetch(PDO::FETCH_ASSOC)){
			 		 ?>
			 		<option value="<?=$ds['id']?>"><?=$ds['status']?></option>
			 	<?php }?>
			 	</select>
		 	</div>
		 	<div class="form-group">
				<input type="submit" name="save" value="simpan" class="btn btn-primary">
				<input type="submit" name="save" value="delete" class="btn btn-danger">
				<?php 
					if(isset($_POST['submit'])){
						$id = $_POST['siswa'];
						$status = $_POST['status'];
						$rombel = $db->query("SELECT parent FROM formulir WHERE parent = 1");
						$check = $rombel->rowcount();

						if($check == 0){
							$update = $db->query("INSERT INTO formulir (parent) VALUES('$_POST[status]') WHERE id = '$id'");
							echo '<script>alert("Parent Sudah diupdate!");</script>';
						}else{
							echo '<script>alert("Parent belum diupdate!");</script>';
						}
					}
				 ?>
		 	</div>
		</form>
	</div>
	<div class="col-sm-6 col-lg-6">
		<table class="table table-hoper">
			<thead>
				<tr class="bg-dark">
					<td>Kelas</td>
					<td>Rombel</td>
				</tr>
			</thead>
			<tbody>
				<tr class="bg-primary">
					<td>Nama Rombel</td>
					<td>Kelas</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>