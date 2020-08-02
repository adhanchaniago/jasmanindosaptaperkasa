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
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create Admin</button></p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Create New Admin</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/users/admin') ?>" method="post">
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input name="username" type="text" autofocus required class="form-control" placeholder="Username"  value="<?php echo set_value('username') ?>">
            </div>                                      
            <div class="form-group input-group">
              <span class="input-group-addon">@</span>
              <input type="email" name="email" class="form-control" placeholder="Alamat email" required value="<?php echo set_value('email') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo set_value('password') ?>">
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
        <th>Username</th>
        <th>Email</th>
        <th width="20%">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($admin as $admin) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $admin['username'] ?></td>
        <td><?php echo $admin['email'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/users/edit_admin/'.$admin['admin_id']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
        <a href="<?php echo base_url('admin/users/delete_admin/'.$admin['admin_id']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus admin ini?')"><i class="fa fa-trash"></i> Delete</a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>