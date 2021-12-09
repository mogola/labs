<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
 <!--Main Footer-->
 <?php
  $thumbFooter = wp_upload_dir()['baseurl'].'/default.jpg';
?>
    <footer class="main-footer" <?php echo 'style="background-image:url('. $thumbFooter .')"'?>>
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="logo-ft col-lg-12 col-sm-12 col-xs-12 column mb-xs-50">
                    <div class="logo">
                        <a href="/">
                            <?php 
                                echo '<img src="'.option_get_config_value('upload_imageFooter').'"/>'
                            ?>
                        </a>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-sm-6 col-xs-12 column mb-xs-50">
                        <div class="footer-widget about-widget">
                            <div class="text">
                                <p><?php echo $baseline ?></p>
                            </div>
                            <ul class="contact-info">
                            	<li><span class="icon fa fa-map-marker"></span> <?php echo option_get_config_value('address') ?></li>
                                <li><span class="icon fa fa-phone"></span> <?php echo option_get_config_value('telephone') ?></li>
                                <li><span class="icon fa fa-envelope-o"></span> <?php echo option_get_config_value('email') ?></li>
                            </ul>
                            
                            <div class="social-links-two clearfix">
                            	<?php echo '<a href="'.option_get_config_value('facebook') .'" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>' ?>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                    <div class="col-lg-2 col-sm-6 col-xs-12 column">
                        <h2><?php echo option_get_config_value('link_quick') ?></h2>
                        <div class="footer-widget links-widget">
                            <ul>
                            <?php
                            $args = array(
                                'title_li' => ''
                                );
                                    wp_list_pages($args); 
                                ?>
                            </ul>
                        </div>
                    </div>
                    
                    <!--Footer Column-->
                    <!-- <div class="col-lg-4 col-sm-6 col-xs-12 column">
                        <div class="footer-widget contact-widget">
                        	<h2><?php echo option_get_config_value('title_contact') ?></h2>
                        	<?php dynamic_sidebar( 'contact-form-4' ); ?>
                        </div>
                    </div> -->
                    
                </div>
                
            </div>
        </div>
        
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container clearfix">
                <!--Copyright-->
                <div class="copyright text-center">Copyright 2021 &copy; develop By <a href="https://onfirstdigital.com">OnfirstDigital</a></div>
            </div>
        </div>
        
    </footer>
		</div><!-- #content -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>
<div class="scroll-to-top scroll-to-target" data-target=".header-style-two"><span class="fa fa-long-arrow-up"></span></div>
<script src="<?php echo get_template_directory_uri(); ?>/dist/js/vendor.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/jquery.bxslider.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-media.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/isotope.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js" type="text/javascript"></script>
</body>
</html>
