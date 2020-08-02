    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
            <div class="row"><!-- row -->        
            
                <div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('download');?>">Download</a></li>
                        <li class="active">Daftar File</li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">                            
                                
                                <div class="news-body clearfix"><!-- course content -->
                            
                                    <h2  class="heading" style="margin-top:-25px;">Daftar File</h2>
                                    <hr />
                                    <?php foreach ($downloads as $download){?>                                   
                                    <ul class="list-unstyled list-downloads"><!-- downloads list -->
                                    	<li>
                                        	<i class="fa fa-cloud-download"></i>
                                        	<a href="<?php echo base_url('assets/upload/file/'.$download['file']);?>" download target="_blank" title="<?php echo $download['file_name'];?>" class="download-link">
                                            	<span class="dwnld-title"><?php echo $download['file_name'];?></span>
                                            	<span class="help-block"><?php echo $download['file_description'];?></span>
                                            </a>
                                        </li>
                                    </ul><!-- downloads list end -->
                                    <?php } ?>
                                </div><!-- course content end -->
                            
                            </div>
                        
                        </div><!-- row end -->               
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->                    
                            
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
 