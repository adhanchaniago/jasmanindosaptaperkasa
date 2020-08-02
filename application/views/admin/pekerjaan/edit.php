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

<form action="<?php echo base_url('admin/pekerjaan/edit/'.$pekerjaan['pekerjaan_id']); ?>" method="post">
  <div class="col-md-6">
       <div class="col-md-12">
    <div class="form-group">
      <label>Client</label>
        <select name="pekerjaan_client" id="pekerjaan_client" class="form-control">
		<option value="">-Pilih-</option>
        
										      <?php
										$con=mysqli_connect("localhost","jasmanin_hesen","Qwerty@123");
										mysqli_select_db($con,"jasmanin_live");
										$qclient=mysqli_query($con,"SELECT * FROM clients");
										while($rclient=mysqli_fetch_array($qclient)){
										?>
										 <?php if($pekerjaan['pekerjaan_client']==$rclient['client_name']):?>
                                           <option value="<?php echo $rclient['client_name'];?>" selected><?php echo $rclient['client_name'];?></option>
                                            <?php else:?>
                                              <option value="<?php echo $rclient['client_name'];?>"><?php echo $rclient['client_name'];?></option>
                                            <?php endif;?>
                                            <?php } ?>
        </select>
    </div>
  </div> 
  
 
  
    <div class="col-md-12">
        <div class="form-group">
        <label>Lokasi</label>      
          <input type="text" name="pekerjaan_lokasi" class="form-control" placeholder="Lokasi" required  value="<?php echo $pekerjaan['pekerjaan_lokasi'] ?>">
      </div>  
    </div> 
	  <div class="col-md-6">
      <div class="form-group">
      <label>Tahun</label>      
        <input type="text" name="pekerjaan_tahun" class="form-control" placeholder="Tahun" required  value="<?php echo $pekerjaan['pekerjaan_tahun'] ?>">
      </div> 
	 
  </div>
	<div class="col-md-6">
      <div class="form-group">
      <label>Tipe Kapal</label>      
        <input type="text" name="tipe_kapal" class="form-control" placeholder="Tipe Kapal" required  value="<?php echo $pekerjaan['tipe_kapal'] ?>">
      </div> 
	 
  </div>
	 <div class="col-md-12">
    <div class="form-group">
      <label>Status</label>
        <select name="status" class="form-control">
          <option value="publish" <?php if($pekerjaan['status']=="publish") { echo "selected"; } ?>>Publish</option>
          <option value="draft" <?php if($pekerjaan['status']=="draft") { echo "selected"; } ?>>Draft</option>
        </select>
    </div>
  </div>  
  
   </div> 
   <div class="col-md-12">
  <div class="col-md-12">
    <div class="form-group">
    <label>Description </label>
        <textarea name="pekerjaan_nama" placeholder="Description pekerjaan" class="form-control" value="pekerjaan_nama" id="isi"><?php echo $pekerjaan['pekerjaan_nama']; ?></textarea>
    </div>
</div>
</div>
 



 
  <div class="col-md-12">
  <br>      
  <div class="form-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
      <a class="btn btn-danger" href="<?php echo base_url('admin/pekerjaan/');?>">Cancel</a>
  </div>
  </div>
</form>