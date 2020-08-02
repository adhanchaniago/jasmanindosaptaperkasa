<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?php echo base_url() ?>assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
    selector: "#isi",
	height: 250,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 
// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<!--  Modals-->
<div class="panel-body">
<p>
  <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create Pekerjaan</button>
 <!-- <button class="btn btn-default" data-toggle="modal" data-target="#headline"><i class="fa fa-plus"></i> Create Headline</button>-->

</p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Create New Pekerjan</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/pekerjaan') ?>" method="post">
		  
		  
		 
		<div class="form-group">
                <label>Client Name</label>
                <select name="pekerjaan_client" id="pekerjaan_client" class="form-control">
                    <option value="">-Pilih-</option>
                                            <?php
										$con=mysqli_connect("localhost","jasmanin_hesen","Qwerty@123");
										mysqli_select_db($con,"jasmanin_live");
										$qclient=mysqli_query($con,"SELECT * FROM clients");
										while($rclient=mysqli_fetch_array($qclient)){
										?>
                                            <option value="<?php echo $rclient['client_name']; ?>"><?php echo $rclient['client_name']; ?></option>
											
                                            <?php } ?>              
                </select>
            </div>          
		  	  
		  
		                                              
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input type="text" name="pekerjaan_lokasi" class="form-control" placeholder="Lokasi" required value="<?php echo set_value('pekerjaan_lokasi') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input type="text" name="pekerjaan_tahun" class="form-control" placeholder="Tahun" required value="<?php echo set_value('pekerjaan_tahun') ?>">
            </div>
             <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input type="text" name="tipe_kapal" class="form-control" placeholder="Tipe Kapal" required value="<?php echo set_value('tipe_kapal') ?>">
          	</div>
			
			<div class="form-group input-group">
			<label>Description</label>
			<textarea name="pekerjaan_nama" placeholder="Description pekerjaan" class="form-control" id="isi"><?php echo set_value('pekerjaan_nama') ?></textarea>
			</div>
	



			
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="publish">Publish</option>                
                    <option value="draft">Draft</option>                           
                </select>
            </div>            
            <div class="form-group input-group">
            <input type="submit" name="submit" value="Save" class="btn btn-primary btn-md">
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>



</div>
<!-- End Modals-->

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Pekerjaan Nama</th>
        <th>Lokasi</th>
        <th>Tahun</th>
        <th>Client</th>
		<th>Tipe Kapal</th>
        <th>Status</th>
        <th>Role</th>
        <th width="20%">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($pekerjaan as $pekerjaan) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $pekerjaan['pekerjaan_nama'] ?></td>
        <td><?php echo $pekerjaan['pekerjaan_lokasi'] ?></td>
        <td><?php echo $pekerjaan['pekerjaan_tahun'] ?></td>
        <td><?php echo $pekerjaan['pekerjaan_client'] ?></td>
		<td><?php echo $pekerjaan['tipe_kapal'] ?></td>
        <td><?php echo $pekerjaan['status'] ?></td>
        <td><?php echo $pekerjaan['username'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/pekerjaan/edit/'.$pekerjaan['pekerjaan_id']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
        <a href="<?php echo base_url('admin/pekerjaan/delete/'.$pekerjaan['pekerjaan_id']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus pekerjaan ini?')"><i class="fa fa-trash"></i> Delete</a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>