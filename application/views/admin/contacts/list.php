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
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Sender</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Date Sender</th>
        <th>Messages</th>
        <th width="150px">Action</th>
    </tr>
</thead>
<tbody>
	<?php $i=1; foreach($contacts as $list) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i; ?></td>
        <td><?php echo substr(strip_tags($list['name']),0,20) ?></td>        
        <td><?php echo substr(strip_tags($list['email']),0,20) ?></td>        
        <td><?php echo substr(strip_tags($list['subject']),0,20) ?></td>        
        <td><?php echo substr(strip_tags($list['messages']),0,70) ?></td>        
        <td><?php echo date('l, d/m/Y', strtotime($list['date'])); ?></td>
        <td class="center">
        <a href="<?php echo base_url('admin/contacts/delete/'.$list['message_id']);?>" class="btn btn-danger" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
       
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>