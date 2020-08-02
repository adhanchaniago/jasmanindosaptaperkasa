                <div class="col-lg-4 col-md-4"><!-- upcoming events wrapper -->
                    
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Klien Kami</h1>
                                
                                <ul class="list-unstyled">
                                
                                <?php 
                                    foreach ($clients as $client){
                                        if ($client['client_id']++ < 10) {
                                ?>
                                    <li class="recent-news-wrap news-no-summary">
                                        
                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="<?php echo $client['website'];?>" title="<?php echo $client['client_name'];?>">
                                                <img src="<?php echo base_url('assets/upload/image/'.$client['image']);?>" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date"><?php echo date('l, d/m/Y', strtotime($client['date'])); ?></div>
                                                </div>
                                                <h1 class="title-median"><a href="<?php echo $client['website'];?>" title="<?php echo $client['client_name'];?>"><?php echo $client['client_name'];?></a></h1>
                                            </div>
                                        </div>
                                    
                                    </li>                            
                                <?php }}  ?>
                                </ul>
                                
                            </li><!-- widgets list end -->
                        
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- upcoming events wrapper end -->