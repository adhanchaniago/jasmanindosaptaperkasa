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
<p><button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Create Category</button></p>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Create Category</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url('admin/blogs/categories/') ?>" method="post">
          	<div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-tag"></i></span>
              <input name="category_name" type="text" autofocus required class="form-control" placeholder="Category Name"  value="<?php echo set_value('category_name') ?>">
            </div>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input name="order_category" type="number" autofocus required class="form-control" placeholder="Order Category"  value="<?php echo set_value('order_category') ?>">
            </div>              
            <div class="form-group">
              <textarea name="category_description" rows="5" class="form-control" placeholder="Description"><?php echo set_value('category_description') ?></textarea>
            </div>            
            <div class="form-group">
            	  <input type="submit" name="submit" value="Save" class="btn btn-primary btn-md">
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
        <th>Category Name</th>
        <th>Description</th>
        <th>Order</th>
        <th>Role</th>
        <th width="160px">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($categories as $categories) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td>
        <?php echo $categories['category_name'] ?> <br> 
        <a href="<?php echo base_url('admin/blogs/categories/'.$categories['slug_category']) ?>">
        <?php echo $categories['slug_category'] ?><sup><i class="fa fa-link"></i></sup>
        </a>
        </td>
        <td><?php echo $categories['category_description'] ?></td>
        <td><?php echo $categories['order_category'] ?></td>
        <td><?php echo $categories['username'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/blogs/edit_category/'. $categories['category_id']);?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
        <a href="<?php echo base_url('admin/blogs/delete_category/'.$categories['category_id']);?>" class="btn btn-danger" onClick="return confirm('Yakin ingin menghapus kategori ini?')"><i class="fa fa-trash"></i> Delete</a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>