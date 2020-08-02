<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">
	<li><a  href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#"><i class="fa fa-wrench"></i> Settings<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/dashboard/config') ?>">General Settings</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/logo') ?>">Logo</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/icon') ?>">Icon</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/locations') ?>">Locations</a></li>
            <li><a href="<?php echo base_url('admin/dashboard/social') ?>">Social Campaign</a></li>
        </ul>
    </li>  
    <li><a href="#"><i class="fa fa-users"></i> Users<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/users/admin') ?>">List Admin</a></li>
        </ul>
    </li>
    <li><a href="#"><i class="fa fa-pencil"></i> Blogs<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/blogs') ?>">List Blogs</a></li>
            <li><a href="<?php echo base_url('admin/blogs/create') ?>">Create Blogs</a></li>
            <li><a href="<?php echo base_url('admin/blogs/categories') ?>">Categories</a></li>
        </ul>
    </li>    
    <li><a href="#"><i class="fa fa-list"></i> Products<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/products') ?>">List Products</a></li>
            <li><a href="<?php echo base_url('admin/products/create') ?>">Create Product</a></li>
        </ul>
    </li> 
    <li><a href="#"><i class="fa fa-dollar"></i> Price<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/price') ?>">List Price</a></li>
        </ul>
    </li>     
    <li><a href="#"><i class="fa fa-user-md"></i> Clients<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/clients') ?>">List Clients</a></li>
            <li><a href="<?php echo base_url('admin/clients/create') ?>">Create Clients</a></li>
        </ul>
    </li>
<li><a href="#"><i class="fa fa-check"></i> Pekerjaan<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/pekerjaan') ?>">List Pekerjaan</a></li>
            <li><a href="<?php echo base_url('admin/pekerjaan/create') ?>">Create Pekerjaan</a></li>
        </ul>
    </li> 	
    <li><a href="#"><i class="fa fa-image"></i> Galleries<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/galleries') ?>">List Galleries</a></li>
            <li><a href="<?php echo base_url('admin/galleries/create') ?>">Create Galleries</a></li>
        </ul>
    </li>               
    <li><a href="#"><i class="fa fa-file"></i> Downloads<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/downloads') ?>">List Downloads</a></li>
            <li><a href="<?php echo base_url('admin/downloads/upload') ?>">Upload File</a></li>
        </ul>
    </li>              

    <li><a href="#"><i class="fa fa-envelope-o"></i> Contacts<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo base_url('admin/contacts/inbox') ?>">Inbox</a></li>
        </ul>
    </li>                                        
</ul>
</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">


<div class="row">
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2><?php echo $title ?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive">