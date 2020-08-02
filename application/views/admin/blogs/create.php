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
    width: 458px;
    height: 355px;
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

<form action="<?php echo base_url('admin/blogs/create') ?>" method="post" enctype="multipart/form-data">

<div class="col-md-6">
	<div class="form-group input-group-lg">
    	<label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo set_value('title') ?>" required placeholder="Title">
    </div>
    <div class="form-group">
    	<label>Category Blog</label>
        <select name="category_id" class="form-control">
        	<?php foreach($categories as $category) { ?>
            <option value="<?php echo $category['category_id'] ?>">
            	<?php echo $category['category_name'] ?>
            </option>
            <?php } ?>
        </select>
    </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="publish">Publish</option>                
                <option value="draft">Draft</option>                           
            </select>
        </div>  
    <div class="form-group input-group-lg">
        <label>Keywords <i>(Example : News Update)</i></label>
        <input type="text" name="keywords" class="form-control" value="<?php echo set_value('keywords') ?>" required placeholder="Keywords Google">
    </div>                          
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Upload Cover</label>
      <input type="file" name="image" class="form-control" id="file">
        <div id="imagePreview"></div>
    </div>
</div>

<div class="col-md-12">
	<div class="form-group">
    	<label>Descriptioon</label>
        <textarea name="content" placeholder="Content Blog" class="form-control" id="isi"><?php echo set_value('content') ?></textarea>
    </div>
    
    <div class="form-group">
	<input type="submit" name="submit" value="Create" class="btn btn-primary">
    <input type="reset" name="reset" value="Reset" class="btn btn-default">
    </div>
</div>

</form>