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

<form action="<?php echo base_url('admin/users/edit/'.$user['user_id']); ?>" method="post">
  <div class="col-md-6">
      <div class="form-group">
      <label>First Name</label>
        <input type="text" name="fname" class="form-control" placeholder="Ex: John" required  value="<?php echo $user['fname'] ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
      <label>Last Name</label>      
        <input type="text" name="lname" class="form-control" placeholder="Ex : Done" required  value="<?php echo $user['lname'] ?>">
      </div>  
  </div>
  <div class="col-md-6">
      <div class="form-group">
      <label>Username</label>      
        <input type="text" name="username" class="form-control" placeholder="Ex : johndone" required  value="<?php echo $user['username'] ?>">
      </div>  
  </div>
  <div class="col-md-6">
      <div class="form-group">
      <label>Email</label>      
        <input type="text" name="email" class="form-control" placeholder="Ex : johndone@gmail.com" required  value="<?php echo $user['email'] ?>">
      </div>  
  </div>
  <div class="col-md-6">
      <div class="form-group">
      <label>Password</label>      
        <input type="password" name="password" class="form-control" placeholder="Change Password" value="<?php echo set_value('password') ?>">
      </div>  
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Gender</label>
        <select name="gender" class="form-control">
          <option value="male" <?php if($user['gender']=="male") { echo "selected"; } ?>>Male</option>
          <option value="female" <?php if($user['gender']=="female") { echo "selected"; } ?>>Female</option>
        </select>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Phone</label>      
        <input type="number" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $user['phone'] ?>">
    </div>  
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Address</label>      
      <textarea name="address" rows="3" class="form-control" placeholder="Address"><?php echo $user['address'] ?></textarea>
    </div>  
  </div>
 
  <div class="col-md-6">
  <br>      
  <div class="form-group input-group">
      <input type="submit" name="submit" value="Update" class="btn btn-primary btn-md">
  </div>
  </div>
</form>