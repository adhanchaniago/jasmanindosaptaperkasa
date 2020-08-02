    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->                           
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb">
                    	<li><a href="<?php echo base_url('project');?>">Project</a></li>
                        <li class="active">Daftar Harga</li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                               <figure class="news-featured-image">    
                                    <img src="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" alt="Featured image 1" class="img-responsive" />
                                </figure>
                            	<h1 class="page-title">Daftar Harga</h1><!-- category title -->
                            <br><b>Dicari Agen</b><br>
Menjadi agen dan dapatkan keuntungan sbb :<br>
1. Fee Setup Awal 60% untuk Agen<br>

2. Fee Dengan Layanan 40% untuk Agen (pendapatan bulanan)<br>

3. Fee Layanan Trainning 100% untuk Agen<br>

4. Fee Layanan Maintenance 100% untuk Agen,<br> 
                            </div>
                        
                        </div><!-- row end -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                                
                                <table class="table table-striped table-courses">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Pengguna</th>
                                            <th>Biaya Setup Awal</th>
                                            <th>Tanpa Layanan</th>
                                            <th>Dengan Layanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach ($price as $price){?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $price['price_name'];?></td>
                                            <td><?php echo $price['price'];?></td>
                                            <td><?php echo $price['with_service'];?></td>
                                            <td><?php echo $price['no_with_service'];?></td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                            
                            </div>
                        
                        </div><!-- row end --> 
                        
                        <div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12">
                        
                                <ul class="pagination pull-right"><!-- pagination -->
                                  <?php if(isset($pagin)) { echo $pagin; }  ?>        
                                </ul><!-- pagination end -->
                            
                            </div>
                            
                        </div><!-- row end -->                 
                    <b>Dengan Layanan</b> :<br>
1. Bebas biaya permintaan penambahan fasilitas (bebas biaya request) .<br>
2. Pengguna Menengah&Besar bebas dibuatkan software/hardware yang dibutuhkan.<br> 
2. Bebas biaya remote<br>
2. Bebas biaya perbaikan sistem informasi<br>
3. Bebas biaya pengecekan/konsultasi kerusakan hardware/software<br>
4. Bebas maintenan sistem secara online<br>

untuk biaya yang katagori Call akan dilakukan penawaran perkasus kerja sama.

khusus untuk software pulsa, penggunaannya akan dianggap mulai indutri kecil.
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                    
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Navigasi</h1>
                                
                                <ul>
                                    <li><a href="<?php echo base_url('project/harga');?>" title="menu item">Daftar Harga</a></li>
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


    