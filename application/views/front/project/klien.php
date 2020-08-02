    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
            <div class="row"><!-- row -->            
            
                <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('galleri');?>">Project</a></li>
                        <li class="active">Daftar Klien <?php echo $site['nameweb'];?></li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                    
                            	<h1 class="page-title">Daftar Klien</h1><!-- category title -->
                            
                            </div>
                        
                        </div><!-- row end -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                            
                            <?php foreach ($clients as $client){?>
                            	<div class="leadership-wrapper"><!-- leadership single wrap -->
                            	
                            		<figure class="leadership-photo">
                            			<img src="<?php echo base_url('assets/upload/image/'.$client['image']);?>" alt="<?php echo $client['client_name'];?>" />
                            		</figure>
                                    
                                    <div class="leadership-meta clearfix">
                                    	<h1 class="leadership-function title-median">
                                            <a href="<?php echo $client['website'];?>" target="_blank" title="<?php echo $client['client_name'];?>"> 
                                                <?php echo $client['client_name'];?>
                                            </a>
                                        </h1>
                                    </div>
                                
                                </div><!-- leadership single wrap end -->
                            <?php }  ?>
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
                                                <a href="<?php echo base_url('blog/detil/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>">
                                                <img src="<?php echo base_url('assets/upload/image/'.$blog['image']);?>" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date"><?php echo date('l, d/m/Y', strtotime($blog['date_post'])); ?></div>
                                                </div>
                                                <h1 class="title-median"><a href="<?php echo base_url('blog/detil/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a></h1>
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
    