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
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah admin</button></p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Admin Baru</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/user_admin/') ?>" method="post">
          	<div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input name="f_name" type="text" autofocus required class="form-control" placeholder="Nama Depan"  value="<?php echo set_value('f_name') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input name="l_name" type="text" autofocus required class="form-control" placeholder="Nama Belakang"  value="<?php echo set_value('l_name') ?>">
            </div>
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
            	<input type="submit" name="submit" value="Simpan Data admin" class="btn btn-primary btn-md">
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
        <th>Username</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($admin as $admin) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $admin['f_name'].' '.$admin['l_name'] ?></td>
        <td><?php echo $admin['username'] ?></td>
        <td><?php echo $admin['email'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/user_admin/edit/'.$admin['admin_id']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
        <a href="<?php echo base_url('admin/user_admin/delete/'.$admin['admin_id']) ?>" class="btn btn-primary" onClick="return confirm('Yakin ingin menghapus admin ini?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>