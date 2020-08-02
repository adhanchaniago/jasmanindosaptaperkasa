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
<p><a href="<?php echo base_url('admin/downloads/upload') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Upload New File</a></p>



<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>File Name</th>
        <th>Link Upload</th>
        <th>Status</th>
        <th>Date Upload</th>
        <th>Role</th>
        <th width="150px">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($downloads as $list) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo substr(strip_tags($list['file_name']),0,20) ?></td>        
        <td><a hre="<?php echo $list['file'] ?>">Downloads</a></td>        
        <td><?php echo $list['status'] ?></td>        
        <td><?php echo date('l, d/m/Y', strtotime($list['date_upload'])); ?></td>
        <td><?php echo $list['username'] ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/downloads/edit/'.$list['download_id']);?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>    
        <a href="<?php echo base_url('admin/downloads/delete/'.$list['download_id']);?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>