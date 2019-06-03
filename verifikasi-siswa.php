<?php 
	
	include '../dtb/dtb.php'; #connection
	// include 'session.php'; #session
	// include '../cmd/semua-siswa.php'; #Query for retrieving students
	$ambildata = $db->query("SELECT * FROM formulir WHERE parent = 0");
 ?>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
	if(isset($_REQUEST['parent'])){
		?>
		<h1>Hello World</h1>
	<?php }else{?>

<hr><h1 class="text-center text-muted">Data Siswa yang Belum Diverifikasi</h1><hr>
 <table class="table table-hover table-bordered text-center" id="DataTable-Example">
 	<thead>
 		<tr>
 			<td>NISN</td>
 			<td>Nama</td>
 			<td>Sekolah Asal</td>
 			<td>Total Nilai UN</td>
 			<td>Status</td>
 			<td>Verifikasi</td>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 			while($s = $ambildata->fetch(PDO::FETCH_ASSOC)){ #$sis taken from -> include ../cmd/semua-siswa.php
 				$nisn = $s['nisn'];
 				$nilai = $db->query("SELECT * FROM nilai WHERE nisn = '$nisn'"); #select all score from score where uniq id = uniq id
 				while($n = $nilai->fetch(PDO::FETCH_ASSOC)){
 		 ?>
 		<tr id="<?=$s['id']?>">
 			<td data-target="nisn"><?=$s['nisn']?></td>
 			<td data-target="fn"><?=$s['fn']?></td>
 			<td data-target="sekal"><?=$s['sekal']?></td>
 			<td><?=$n['total']?></td>
 			<td data-target="parent"><?=$s['parent']?></span></td>
 			<td>
 				<a href="#" data-role="update" data-id="<?php echo $s['id'] ;?>">Update</a>
 				<!-- <a href="acc-siswa=<?php echo $s['id']?>" class="btn btn-default"><span class="fa fa-sm fa-check-circle"></span></a> -->
 			</td>
 		</tr>
 	<?php } ?>
 	<?php } ?>
 	</tbody>
 </table>
<?php } ?>
<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update data siswa?</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="fn" class="form-control">
              </div>
              <div class="form-group">
                <label>NISN</label>
                <input type="text" id="nisn" class="form-control">
              </div>

               <div class="form-group">
                <label>Sekolah</label>
                <input type="text" id="sekal" class="form-control">
              </div>
              <div class="form-group">
                <label>Status</label>
                <!-- <input type="text" id="parent" class="form-control"> -->
                <select id="parent" class="form-control">
                	<?php $rt = $db->query("SELECT * FROM status_daftar WHERE parent = 0"); while($so = $rt->fetch(PDO::FETCH_ASSOC)){ ?>
                	<option value="<?=$so['id']?>"><?=$so['status']?></option>
                <?php } ?>
                </select>
              </div>
                <input type="hidden" id="id" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var fn  = $('#'+id).children('td[data-target=fn]').text();
            var nisn  = $('#'+id).children('td[data-target=nisn]').text();
            var sekal  = $('#'+id).children('td[data-target=sekal]').text();
            var parent  = $('#'+id).children('td[data-target=parent]').text();

            $('#fn').val(fn);
            $('#nisn').val(nisn);
            $('#sekal').val(sekal);
            $('#parent').val(parent);
            $('#id').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#id').val(); 
         var fn =  $('#fn').val();
          var nisn =  $('#nisn').val();
          var sekal =   $('#sekal').val();
          var parent =   $('#parent').val();

          $.ajax({
              url      : '../cmd/terima-siswa.php',
              method   : 'post', 
              data     : {fn : fn , nisn: nisn , sekal : sekal , parent : parent , id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=fn]').text(fn);
                             $('#'+id).children('td[data-target=nisn]').text(nisn);
                             $('#'+id).children('td[data-target=sekal]').text(sekal);
                             $('#'+id).children('td[data-target=parent]').text(parent);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>
