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
<p>
  <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create Price</button>
  <button class="btn btn-default" data-toggle="modal" data-target="#headline"><i class="fa fa-plus"></i> Create Headline</button>

</p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Create New Price</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/price') ?>" method="post">
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input name="price_name" type="text" autofocus required class="form-control" placeholder="Price Name"  value="<?php echo set_value('price_name') ?>">
            </div>                                      
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="text" name="price" class="form-control" placeholder="Price" required value="<?php echo set_value('price') ?>">
          	</div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="text" name="with_service" class="form-control" placeholder="With Service" required value="<?php echo set_value('price') ?>">
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="text" name="no_with_service" class="form-control" placeholder="No With Service" required value="<?php echo set_value('price') ?>">
            </div>                        
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="publish">Publish</option>                
                    <option value="draft">Draft</option>                           
                </select>
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

<div class="modal fade" id="headline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Create New Price</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/price/headline') ?>" method="post">                                      
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="text" name="headline" class="form-control" placeholder="Price" required value="<?php echo set_value('price') ?>">
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
        <th>Price Name</th>
        <th>Price</th>
        <th>Service</th>
        <th>No Service</th>
        <th>Status</th>
        <th>Role</th>
        <th width="20%">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($price as $price) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo $price['price_name'] ?></td>
        <td><?php echo $price['price'] ?></td>
        <td><?php echo $price['with_service'] ?></td>
        <td><?php echo $price['no_with_service'] ?></td>
        <td><?php echo $price['status'] ?></td>
        <td><?php echo $price['username'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/price/edit/'.$price['price_id']) ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
        <a href="<?php echo base_url('admin/price/delete/'.$price['price_id']) ?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus price ini?')"><i class="fa fa-trash"></i> Delete</a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>