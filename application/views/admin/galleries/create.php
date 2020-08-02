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

<style>
#imagePreview {
    margin-top: 7px;
    width: 180px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>
<script type="text/javascript">
$(function() {
    $("#file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>


<?php
// Session 
if($this->session->flashdata('sukses')) { 
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
} 

// File upload error
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

// Error
echo validation_errors('<div class="alert alert-success">','</div>'); 
?>

<form action="<?php echo base_url('admin/galleries/create') ?>" method="post" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="form-group">
        <label>Upload Image</label>
      <input type="file" name="image" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
    <div class="form-group input-group-lg">
        <label>Gallery Name</label>
        <input type="text" name="gallery_name" class="form-control" value="<?php echo set_value('gallery_name') ?>" required placeholder="Title">
    </div>   
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="publish">Publish</option>                
            <option value="draft">Draft</option>                           
        </select>
    </div>    
    <div class="form-group">
        <label>Position</label>
        <select name="position" class="form-control">
            <option value="slider">Home - Slider</option>                
            <option value="profil">Profil Page</option>                
            <option value="harga">Daftar Harga</option>                
            <option value="footer">Footer - Grid Image</option>  
			 <option value="pekerjaan">Pekerjaan</option> 
			 <option value="struktur">Struktur Organisasi</option>
			 
        </select>
    </div>      

    
</div>
<div class="col-md-6">
    <h3>Notice</h3><hr>
    <div class="alert alert-warning"><label>Important</label><hr>
   Gunakan ukuran gambar yang sesuai, contohnya seperti :<br>
       <i>
          <strong>Position Slider</strong> : 1140px X 400px<br>
          <strong>Position Profil</strong> : 700px X 500px<br>
          <strong>Position Footer</strong> : 500px X 330px        
       </i>
    </div>
       <div class="form-group">
        <label>Description</label>
        <textarea name="gallery_description" placeholder="Gallery Description" class="form-control"><?php echo set_value('gallery_description') ?></textarea>
    </div>
</div><br>
<div class="col-md-12">
<div class="form-group"><br>
	<input type="submit" name="submit" value="Create" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">
    </div>
</div>

</form>