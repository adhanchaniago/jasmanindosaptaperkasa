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

<form action="<?php echo base_url('admin/blogs/edit_type/'.$type['type_id']) ?>" method="post">  
  <div class="col-md-8">
      <div class="form-group">
      <label>Type Name</label>      
        <input type="text" name="type_name" class="form-control" placeholder="Type Name" required  value="<?php echo $type['type_name'] ?>">
      </div>
  </div>  
  <div class="col-md-4">
      <div class="form-group">
      <label>Order Type</label>      
        <input type="number" name="order_type" class="form-control" placeholder="Order Type" required  value="<?php echo $type['order_type'] ?>">
      </div>
  </div>  
  <div class="col-md-12">
    <div class="form-group">
      <label>Description</label>
        <textarea name="type_description" placeholder="Description Type" class="form-control"><?php echo $type['type_description'] ?></textarea>
    </div>
  </div>  
  <div class="col-md-6">
  <div class="form-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
  </div>
</form>