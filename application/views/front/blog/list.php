    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb">
                    	<li><a href="<?php echo base_url('blog');?>">Blog</a></li>
                        <li class="active">Daftar Blog</li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->

                            <?php foreach ($blogs as $list){?>
                        
                        	<div class="k-article-summary col-lg-12 col-md-12">
                    
                                <figure class="news-featured-image">	
                                    <a href="<?php echo base_url('blog/detil/'.$list['slug_blog']);?>" title="<?php echo $list['title'];?>"><img src="<?php echo base_url('assets/upload/image/'.$list['image']);?>" alt="Featured image 4" class="img-responsive" /></a>
                                </figure>
                                
                                <div class="news-title-meta">
                                    <h1 class="page-title">
                                    <a href="<?php echo base_url('blog/detil/'.$list['slug_blog']);?>" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a></h1>
                                    <div class="news-meta">
                                        <span class="news-meta-date"><?php echo date('l, d/m/Y', strtotime($list['date_post'])); ?></span>
                                        <span class="news-meta-category"><a href="<?php echo base_url('blog/category/'.$list['slug_category']);?>" title="News"><?php echo $list['category_name'];?></a></span>
                                        <?php 
                                            $blog_id = $list['blog_id'];
                                            $count = $this->mBlogs->countCommentByBlog($blog_id);
                                        ?>
                                        <span class="news-meta-comments"><a href="<?php echo base_url('blog/detil/'.$list['slug_blog']);?>" title="<?php echo $count;?> comments"><?php echo $count;?> comments</a></span>
                                    </div>
                                </div>
                                
                                <div class="news-body">
                                    <p>
                                        <?php
                                            $out = strlen($list['content']) > 150 ? substr($list['content'],0,150).'... <a href="'. base_url('blog/detil/'.$list['slug_blog']).'" class="moretag">detil Selengkapnya</a> ' : $list['content'];
                                            echo $out;
                                        ?>  
                                    </p>                                    
                                </div>
                            
                            </div>

                            <?php } ?>
                        
                        </div><!-- row end -->  
                        
                        <div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12">
                        
                                <ul class="pagination pull-right"><!-- pagination -->
                                  <?php if(isset($pagin)) { echo $pagin; }  ?>        
                                </ul><!-- pagination end -->
                            
                            </div>
                            
                        </div><!-- row end -->             
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_course_search"><!-- widget -->
                            
                                <h1 class="title-titan">Pencarian Blog</h1>
                                
                                <form role="search" method="post" id="course-finder" action="<?php echo base_url('blog/cari');?>">
                                    <div class="input-group">
                                        <input type="text" name="cari" placeholder="Ketika judul blog disini..." autocomplete="off" class="form-control" id="find-course" name="find-course" />

                                        <span class="input-group-btn"><button type="submit" name="q" class="btn btn-default">GO!</button></span>
                                    </div>
                                </form>
                            
                            </li><!-- widget end -->                        	

                            <li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Kategori Blog</h1>
                                <?php foreach ($categories as $category){?>
                                <ul>
                                	<li><a href="<?php echo base_url('blog/kategori/'.$category['slug_category']);?>" title="<?php echo $category['category_name'];?>"><?php echo $category['category_name'];?></a></li>
                                </ul>
                                <?php } ?>
                    
							</li>
                            
                        	<li class="widget-container widget_up_events"><!-- widget -->
                    
                                <h1 class="title-widget">Blog Lainnya</h1>
                                
                                <ul class="list-unstyled">
                                
                                <?php 
                                    foreach ($lastBlogs as $last) {
                                        if ($last['blog_id']++ < 10) {
                                 ?>
                                    <li class="up-event-wrap">
                                
                                        <h1 class="title-median"><a href="<?php echo base_url('blog/detil/'.$last['slug_blog']);?>" title="<?php echo $last['title'];?>"><?php echo $last['title'];?></a></h1>
                                        
                                        <div class="up-event-meta clearfix">
                                            <div class="up-event-date"><?php echo date('l, d/m/Y', strtotime($last['date_post'])); ?></div>
                                        </div>
                                        
                                    <p>
                                        <?php
                                            $out = strlen($last['content']) > 150 ? substr($last['content'],0,150).'... <a href="'. base_url('blog/detil/'.$last['slug_blog']).'" class="moretag">detil Selengkapnya</a> ' : $last['content'];
                                            echo $out;
                                        ?>  
                                    </p>
                                    
                                    </li>                        
                                <?php }} ?>
                                </ul>
                            
                            </li>
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
    