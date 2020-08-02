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

<form action="<?php echo base_url('admin/blogs/edit_category/'.$category['category_id']) ?>" method="post">  
  <div class="col-md-8">
      <div class="form-group">
      <label>Category Name</label>      
        <input type="text" name="category_name" class="form-control" placeholder="Nama Kategori" required  value="<?php echo $category['category_name'] ?>">
      </div>
  </div>  
  <div class="col-md-4">
      <div class="form-group">
      <label>Order Category</label>      
        <input type="number" name="order_category" class="form-control" placeholder="Order Category" required  value="<?php echo $category['order_category'] ?>">
      </div>
  </div>  
  <div class="col-md-12">
    <div class="form-group">
      <label>Description</label>
        <textarea name="category_description" placeholder="Description Category" class="form-control"><?php echo $category['category_description'] ?></textarea>
    </div>
  </div>  
  <div class="col-md-6">
  <div class="form-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
  </div>
</form>