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
<p><a href="<?php echo base_url('admin/users/create');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create User</a></p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah User Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/user') ?>" method="post">
          	<div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input name="nama" type="text" autofocus required class="form-control" placeholder="Nama lengkap"  value="<?php echo set_value('nama') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon">@</span>
              <input type="email" name="email" class="form-control" placeholder="Alamat email" required value="<?php echo set_value('email') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username" required value="<?php echo set_value('username') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo set_value('password') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-eye"></i></span>
              <select name="level" class="form-control" required>
              	<option value="Admin">Administrator</option>
                <option value="Tutor">Tutor</option>
                <option value="Staff">Staff</option>
                <option value="Blocked">Block Akun ini</option>
              </select>
          	</div>
            <div class="form-group input-group">
            	<input type="submit" name="submit" value="Simpan Data User" class="btn btn-primary btn-md">
                <input type="reset" name="reset" value="Reset" class="btn btn-default btn-md">
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
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($user as $user) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $user['fname'].' '.$user['lname']; ?></td>
        <td><?php echo $user['email'] ?></td>
        <td class="center"><?php echo $user['username'];?></td>
        <td class="center">
        <?php 
        if ($user['status'] == 0 ){
        ?>
        <span class="btn btn-danger">Not Active</span>
        <?php
        }elseif ($user['status'] > 0) {
        ?>
          <span class="btn btn-success">Active</span>
        <?php } ?>          

        </td>
        <td class="center">
        <a href="<?php echo base_url('admin/users/edit/'.$user['user_id']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
       <!-- View Biz -->
       <!--  Modals-->
        <button class="btn btn-success" data-toggle="modal" data-target="#View<?php echo $user['user_id']; ?>"><i class="fa fa-eye"></i></button>

        <div class="modal fade" id="View<?php echo $user['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Detail user <?php echo $user['fname'].' '.$user['lname'];?></h4>
              </div>
              <div class="modal-body">
              <div class="col-md-12">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
          <tr>          
            <td>Nama</td>
            <td><?php echo $user['fname'].' '.$user['lname'];?></td>
          </tr>
          <tr>          
            <td>Username</td>
            <td><?php echo $user['username'];?></td>
          </tr> 
          <tr>          
            <td>Email</td>
            <td><?php echo $user['email'];?></td>
          </tr>  
          <tr>          
            <td>Phone</td>
            <td><?php echo $user['phone'];?></td>
          </tr>  
          <tr>          
            <td>Address</td>
            <td><?php echo $user['address'];?></td>
          </tr>                      

            <td>&nbsp;</td>
            <td>
            <a href="<?php echo base_url('admin/users/edit/'.$user['user_id']) ?>" class="btn btn-primary">Edit</a>
            <a href="<?php echo base_url('admin/users/delete/'.$user['user_id']) ?>" class="btn btn-danger">Delete</a>
          </tr>
        </table>
        </div>
        <div class="clearfix"></div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
        </div>
        <!-- End Modals-->                
        <a href="<?php echo base_url('admin/users/delete/'.$user['user_id']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus user ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>