            <div class="row no-gutter fullwidth"><!-- row -->
            
                <div class="col-lg-12 clearfix"><!-- featured posts slider -->
                
                    <div id="carousel-featured" class="carousel slide" data-interval="4000" data-ride="carousel"><!-- featured posts slider wrapper; auto-slide -->
                    
                        <div class="carousel-inner"><!-- Wrapper for slides -->
                        <?php 
                            $i=0;                        
                            foreach ($galleries as $gallery){                            
                            if ($i == 0){                                
                         ?>  
                            <div class="item active">
                                <img src="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" alt="Image slide 3" />
                                <div class="k-carousel-caption pos-1-3-right scheme-dark">
                                    <div class="caption-content">
                                        <h3 class="caption-title"><?php echo $gallery['gallery_name'];?></h3>
                                        <p>
                                            <?php echo $gallery['gallery_description'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="item">
                                <img src="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" alt="Image slide 3" />
                                <div class="k-carousel-caption pos-1-3-right scheme-dark">
                                    <div class="caption-content">
                                        <h3 class="caption-title"><?php echo $gallery['gallery_name'];?></h3>
                                        <p>
                                            <?php echo $gallery['gallery_description'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>                                                  
                        <?php
                            } $i++; }
                        ?>               
                            
                        </div><!-- Wrapper for slides end -->
                    
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-featured" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="right carousel-control" href="#carousel-featured" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        <!-- Controls end -->
                        
                    </div><!-- featured posts slider wrapper end -->
                        
                </div><!-- featured posts slider end -->
                
            </div><!-- row end -->