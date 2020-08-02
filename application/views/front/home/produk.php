                <div class="col-lg-4 col-md-4"><!-- upcoming events wrapper -->
                    
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_up_events"><!-- widgets list -->
                    
                                <h1 class="title-widget">Produk Kami</h1>
                                
                                <ul class="list-unstyled">

                                <?php 
                                    foreach ($products as $product){
                                        if ($product['product_id']++ < 10) {                                        
                                ?>
                                    <li class="up-event-wrap">
                                
                                        <h1 class="title-median">
                                        <a href="<?php echo base_url('produk/detil/'.$product['slug_product']);?>" title="<?php echo $product['product_name'];?>"><?php echo $product['product_name'];?></a></h1>
                                        
                                        <div class="up-event-meta clearfix">
                                            <div class="up-event-date"><?php echo date('l, d/m/Y', strtotime($product['date'])); ?></div>
                                        </div>                                        
                                        <p>
                                            <?php
                                                $out = strlen($product['product_description']) > 100 ? substr($product['product_description'],0,100).'... <a href="'. base_url('produk/detil/'.$product['slug_product']).'" class="moretag">Baca Selengkapnya</a> ' : $product['product_description'];
                                                echo $out;
                                            ?>
                                        </p>
                                    
                                    </li>                               
                                <?php }} ?>     
                                
                                </ul>
                            
                            </li><!-- widgets list end -->
                        
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- upcoming events wrapper end -->