                <div class="col-lg-4 col-md-4"><!-- recent news wrapper -->
                    
                    <div class="col-padded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Blog Terbaru</h1>
                                
                                <ul class="list-unstyled">
                                <?php                             
                                    foreach ($blogs as $blog){
                                        if ($blog['blog_id']++ < 10) {
                                ?>
                                    <li class="recent-news-wrap">
                                
                                        <h1 class="title-median"><a href="<?php echo base_url('blog/detil/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a></h1>
                                        
                                        <div class="recent-news-meta">
                                            <div class="recent-news-date"><?php echo date('l, d/m/Y', strtotime($blog['date_post'])); ?></div>
                                        </div>
                                        
                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="<?php echo base_url('blog/detil/'.$blog['slug_blog']);?>" title="<?php echo $blog['title'];?>">
                                                <img src="<?php echo base_url('assets/upload/image/'.$blog['image']);?>" style="height:90px"/></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <p>
                                                <?php
                                                    $out = strlen($blog['content']) > 50 ? substr($blog['content'],0,50).'... <a href="#" class="moretag">detil Selengkapnya</a> ' : $blog['content'];
                                                    echo $out;
                                                ?>                                             
                                                </p>
                                            </div>
                                        </div>
                                    
                                    </li>                        
                                <?php }} ?>
                                </ul>
                                
                            </li><!-- widgets list end -->
                        
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- recent news wrapper end -->