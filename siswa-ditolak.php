<?php
include('../dtb/dtb.php');
include('../cmd/sekolah.php');
// include 'session.php';

// include('../dtb/global-session.php');
$Ditolak = $db->query("SELECT * FROM formulir WHERE parent = 2");
$dt = $db->query("SELECT COUNT(parent) AS jumlah_siswa FROM formulir WHERE parent = 2");
$JS = $dt->fetch(PDO::FETCH_ASSOC);
$jsi = $JS['jumlah_siswa'];
$jumlah_siswa = $jsi;

?>
<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Data Siswa Ditolak</h2>
			<div class="panel panel-default">
				<div class="panel-heading">Data Siswa Yang Sudah Ditolak</div>
				<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="DataTables-Example">
							<thead>
								<tr>
									<th colspan="3">JUMLAH PENDAFTAR</th>
									<th><?php echo $jumlah_siswa; ?></th>
								</tr>
								<tr>
									<th class="text-center">Nama siswa</th>
									<th class="text-center">NISN</th>
									<th class="text-center">Total Nilai UN</th>
									<th class="text-center">Grade</th>
								</tr>
							</thead>
							<tbody>
								<?php //Perulangan 
								
								while($data=$Ditolak->fetch(PDO::FETCH_ASSOC)) {                     
		                            $nisn = $data['nisn'];
					 				$nilai = $db->query("SELECT * FROM nilai WHERE nisn = '$nisn'");
					 				while($n = $nilai->fetch(PDO::FETCH_ASSOC)){
								    ?>
								<tr class="odd gradeX">
									<td><?php echo $data['fn'];?></td>
									<td class="text-center"><?php echo $data['nisn'];?></td>
									<td class="text-center"><?php echo $n['total'];?></td>
									<td class="text-center">
										<?php 
											if($n['total'] < 400){
												echo "<b style='color:green;'>A</b>";
											}else if($n['total'] < 350){
												echo "<b style='color:orangered'>B</b>";
											}else if($n['total'] < 200){
												echo "<b style='color:orange;'>C</b>";
											}else if($n['total'] < 100){
												echo "<b style='color:yellow;'>D</b>";
											}else{
												echo "<b style='color:red;'>E</b>";
											}
										 ?>
									</td>
								</tr>
							<?php } ?>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">Siswa <?=$ns['nama_sekolah']?></div>
			</div>
	</div>
</div>

<?php 
	include '../inc/footer-admin.php';
 ?>
            <!-- /.row -->
