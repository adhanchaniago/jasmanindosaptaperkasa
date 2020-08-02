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
<p><a href="<?php echo base_url('admin/products/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create New products</a></p>



<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th width="150px">Image</th>
        <th>Product Name</th>
        <th>Status</th>
        <th>Date Upload</th>
        <th>Role</th>
        <th width="150px">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($products as $list) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td>
        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$list['image']);?>" width="150px">
        </td>
        <td>
        <?php echo substr(strip_tags($list['product_name']),0,20) ?>
        </td>        
        <td><?php echo $list['status'] ?></td>        
        <td><?php echo date('l, d/m/Y', strtotime($list['date'])); ?></td>
        <td><?php echo $list['username'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/products/edit/'.$list['product_id']);?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
       <!-- View Biz -->
       <!--  Modals-->
        <button class="btn btn-success" data-toggle="modal" data-target="#View<?php echo $list['product_id']; ?>"><i class="fa fa-eye"></i></button>

        <div class="modal fade" id="View<?php echo $list['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">View Post</h4>
              </div>
              <div class="modal-body">
              <div class="col-md-12">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
          <tr>
          <img src="<?php echo base_url('assets/upload/image/'.$list['image']);?>" width="539px">
            <td>Product Name</td>
            <td><?php echo $list['product_name'] ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo $list['status']; ?></td>
          </tr>
          <tr>
            <td>Date Update</td>
            <td><?php echo date('l, d/m/Y', strtotime($list['date'])); ?></td>
          </tr>
          <tr>
            <td>Post By</td>
            <td><?php echo $list['username']; ?></td>
          </tr>                     
          <tr>
                <td colspan="2">Description : <?php echo $list['product_description'];?></td>
          </tr>                   
          <tr>
            <td>&nbsp;</td>
            <td>
            <a href="<?php echo base_url('admin/products/edit/'.$list['product_id']) ?>" class="btn btn-primary">Edit</a>
            <a href="<?php echo base_url('admin/products/delete/'.$list['product_id']) ?>" class="btn btn-danger">Delete</a>
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
        <a href="<?php echo base_url('admin/products/delete/'.$list['product_id']);?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>