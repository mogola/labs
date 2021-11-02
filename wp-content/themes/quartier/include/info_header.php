<!--Info Outer-->
<div class="info-outer">
    <!--Info Box-->
    <div class="info-box">
        <div class="icon"><span class="flaticon-computer"></span></div>
        <strong>EMAIL</strong>
        <?php echo '<a href="mailto:'. option_get_config_value('email') .'">'?><?php echo option_get_config_value('email') ?></a>
    </div>
    <!--Info Box-->
    <div class="info-box">
        <div class="icon"><span class="flaticon-technology-5"></span></div>
        <strong><?php echo option_get_config_value('title_contact') ?></strong>
        <a class="phone" href="#"><?php echo option_get_config_value('telephone') ?></a>
    </div>
    <!--Info Box-->
    <div class="info-box social-box">
        <div class="social-links clearfix">
            <!--
            <?php echo '<a href="'.option_get_config_value('facebook').'" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>' ?>
            
            <?php echo '<a href="'.option_get_config_value('twitter').'" class="twitter img-circle"><span class="fa fa-twitter"></span></a>'?>
            <?php echo '<a href="'.option_get_config_value('google').'" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>'?>
            <?php echo '<a href="'.option_get_config_value('linkedin').'" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>'?>
            -->
        </div>
    </div>
</div>