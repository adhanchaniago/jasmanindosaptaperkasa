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

<form action="<?php echo base_url('admin/price/edit/'.$price['price_id']); ?>" method="post">
  <div class="col-md-6">
    <div class="col-md-12">
        <div class="form-group">
          <label>Price Name</label>
          <input type="text" name="price_name" class="form-control" placeholder="Price Name" required  value="<?php echo $price['price_name'] ?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
        <label>Price</label>      
          <input type="text" name="price" class="form-control" placeholder="Price" required  value="<?php echo $price['price'] ?>">
      </div>  
    </div>  
  </div>
  <div class="col-md-6">
  <div class="col-md-6">
      <div class="form-group">
      <label>Service</label>      
        <input type="text" name="with_service" class="form-control" placeholder="Price" required  value="<?php echo $price['with_service'] ?>">
      </div>  
  </div>
  <div class="col-md-6">
      <div class="form-group">
      <label>No Service</label>      
        <input type="text" name="no_with_service" class="form-control" placeholder="Price" required  value="<?php echo $price['no_with_service'] ?>">
      </div>  
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label>Status</label>
        <select name="status" class="form-control">
          <option value="publish" <?php if($price['status']=="publish") { echo "selected"; } ?>>Publish</option>
          <option value="draft" <?php if($price['status']=="draft") { echo "selected"; } ?>>Male</option>
        </select>
    </div>
  </div>  
  </div>  


 
  <div class="col-md-12">
  <br>      
  <div class="form-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
      <a class="btn btn-danger" href="<?php echo base_url('admin/price/');?>">Cancel</a>
  </div>
  </div>
</form>