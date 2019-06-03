<?php 
//panggil header, css, navigasi
include('../inc/header-admin.php');
include('../inc/css-admin.php');
include('../inc/nav-admin.php');
?>
<?php 

include('../dtb/dtb.php');
include '../cmd/status-daftar.php';
// include('../dtb/global-session.php');
// ob_start();
?>
<div class="row">
	<div class="col-lg-6">
		<h2 class="page-header">Verifikasi Data Siswa </h2>
			<p class="page-header"><a href="verifikasi-siswa"><button class="btn btn-default">Kembali</button></a></p>
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Edit dan Verifikasi siswa
					</div>
                        <!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<form role="form" method="post" action="<?=htmlspecialchars('terima-siswa')?>">
								<table class="table table-striped table-bordered table-hover">
									<?php 
										if(isset($_GET['id'])){
											$id = $_GET['id'];
											$id = (int)$id;
											$sdo = $db->query("SELECT * FROM formulir WHERE id = '$id'");
											$ro = $sdo->fetch(PDO::FETCH_ASSOC);
										}
											?>
									<tbody>
										<tr>
											<td>Nama</td>
											<td>
												<fieldset disabled>
													<input class="form-control" type="text" value="<?=$ro['nisn'];?>">
												</fieldset>
											</td>
										</tr>
										<tr>
											<td>NISN</td>
											<td>
												<fieldset disabled>
													<input class="form-control" type="text" value="<?=$ro['fn'];?>" required="" />
												</fieldset>
											</td>
										</tr>
										<tr>
											<td>Status Siswa</td>
											<td>
												<select class="form-control" name="status_pendaftaran" id="status_pendaftaran" required="">
													<option value="0">-Pilih Verifikasi-</option>
													<?php 
														while($df = $stdf->fetch(PDO::FETCH_ASSOC)){
													 ?>
													<option value="<?=$df['id']?>"><?=$df['status']?></option>
											<?php }?>
												</select>
											</td>
										</tr>
									</tbody>
								<?php #} ?>
								</table>
								<button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
							</form>

						</div>
					<!-- /.table-responsive -->
					</div>
				<!-- /.panel-body -->
				</div>
	<!-- /.panel -->
	</div>
<!-- /.col-lg-6 -->
</div>

<?php 
//footer
include('../inc/footer-admin.php');
// echo ob_get_clean();
?>
