    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb">
                    	<li><a href="<?php echo base_url('galleri');?>">Galleri</a></li>
                        <li class="active">Album Foto <?php echo $site['nameweb'];?></li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter fullwidth"><!-- row -->
                
                <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                        
                        <h1 class="page-title">Album Foto <?php echo $site['nameweb'];?> <span class="label label-info"><?php echo $countGalleries;?> photos</span></h1>
                        
                        <div class="news-body">
                            
                            <div class="row gutter k-equal-height"><!-- row -->
                            <?php foreach ($galleries as $gallery){ ?>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                	<figure class="gallery-photo-thumb">
                                    	<a href="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" title="<?php echo $gallery['gallery_name'];?>" data-fancybox-group="gallery-bssb" class="fancybox"><img src="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" alt="<?php echo $gallery['gallery_name'];?>" /></a>
                                    </figure>
                                    <div class="gallery-photo-description">
                                    	<?php echo $gallery['gallery_description'];?>
                                    </div>
                                </div>
                            <?php } ?>
                                
                            </div><!-- row end -->
                            
                        </div>
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
   