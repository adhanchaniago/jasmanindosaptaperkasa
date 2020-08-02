    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->                            
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb">
                    	<li><a href="<?php echo base_url('profil');?>">Profil</a></li>
                        <li class="active">Kontak <?php echo $site['nameweb'];?></li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
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
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                            
                                <div id="k-contact-map" class="clearfix"><!-- map -->
                                    <iframe width="700" height="450" frameborder="0" style="border:0"
                                    src="<?php echo $site['google_maps'];?>" allowfullscreen></iframe>                
                                </div>
                                <hr>
                                <h1 class="page-title">Kontak Kami</h1>
                                
                                <div class="news-body">
                                    
                                    <div class="row" style="margin-top:-40px;">
                                    	<div class="col-lg-6 col-md-6 col-sm-12">
                                        	<h6 class="remove-margin-bottom">Alamat Kantor Kami</h6>
											<p class="small"><?php echo $site['address'];?></p>                                        
                                        </div>
                                        
                                    	<div class="col-lg-6 col-md-6 col-sm-12">
                                        	<h6 class="remove-margin-bottom">Hubungi Kami</h6>
											<p class="small">Tel: <?php echo $site['phone_number'];?>   |   Fax: <?php echo $site['fax'];?></p>
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    
                                    <h6>Silahkan Kirim Pesan</h6>
                                    
                                    <form id="contactform" method="post" action="<?php echo base_url('kontak');?>">
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="contactName"><span class="required">*</span> Name</label>
                                                <input type="text" aria-required="true" size="30" value="" name="name" id="contactName" class="form-control requiredField" />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="email"><span class="required">*</span> E-mail</label>
                                                <input type="text" aria-required="true" size="30" value="" name="email" id="email" class="form-control requiredField" />
                                            </div>
                                        </div><!-- ends row --> 
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12">
                                                <label for="contactSubject">Message Subject</label>
                                                <input type="text" aria-required="true" size="30" value="" name="subject" id="contactSubject" class="form-control" />
                                            </div>
                                        </div><!-- ends row -->
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-12">
                                                <label for="comments"><span class="required">*</span> Message</label>
                                                <textarea aria-required="true" rows="5" cols="45" name="messages" id="comments" class="form-control requiredField mezage"></textarea>
                                            </div>
                            
                                            <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                                <input type="submit" value="Kirim Pesan" id="submit" name="submit" class="btn btn-default" />
                                            </div>
                                        </div><!-- ends row -->
                                    </form>
                                    
                                </div>
                            
                            </div>
                        
                        </div><!-- row end -->               
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                    
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Navigasi</h1>
                                
                                <ul>
                                    <li><a href="<?php echo base_url('project/pekerjaan');?>" title="menu item">Daftar Pekerjaan</a></li>
                                    <li><a href="<?php echo base_url('project/klien');?>" title="menu item">Daftar Klien</a></li>
                                    <li><a href="<?php echo base_url('kontak');?>" title="menu item">Kontak Kami</a></li>
                                </ul>
                    
                            </li>
                            
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Blog Terbaru</h1>
                                
                                <ul class="list-unstyled">
                                
                                <?php 
                                    foreach ($blogs as $blog){
                                        if ($blog['blog_id']++ < 10) {
                                ?>
                                    <li class="recent-news-wrap news-no-summary">
                                        
                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="<?php echo base_url('blog/read/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>">
                                                <img src="<?php echo base_url('assets/upload/image/'.$blog['image']);?>" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date"><?php echo date('l, d/m/Y', strtotime($blog['date_post'])); ?></div>
                                                </div>
                                                <h1 class="title-median"><a href="<?php echo base_url('blog/read/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a></h1>
                                            </div>
                                        </div>
                                    
                                    </li>                            
                                <?php }} ?>
                                </ul>
                                
                            </li><!-- widgets list end -->
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
 