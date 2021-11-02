<!-- Main Header -->
<header class="header-style-two">
    <div class="wrap-head-flex">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container clearfix">
                <!-- Logo -->
                <div class="logo">
                    <a href="<?php echo get_site_url(); ?>">
                        <?php echo '<img src="'.option_get_config_value('upload_image') .'" alt="Greenture" />' ?>
                    </a>
                </div>
            </div>
        </div><!-- Header Top End -->
        
        <!-- Lower Part -->
        <div class="lower-part">
            <div class="auto-container clearfix">
                
                <!--Outer Box-->
                <div class="outer-box clearfix">
                
                    <!--Btn Box-->
                    <div class="btn-box btn-contact-link">
                        <a href="/nous-contacter" class="theme-btn donate-btn"><?php echo option_get_config_value('title_contact') ?></a>
                    </div>
                    
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <?php get_template_part( 'template-parts/navigation/navigation', 'main' ); ?><!-- .wrap -->
                        </div><!-- .navigation-top -->
                    </nav><!-- Main Menu End-->
                    
                </div>
            </div>
        </div><!-- Lower Part End-->
    </div>
</header><!--End Main Header -->