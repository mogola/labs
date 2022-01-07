
<?php 
function customConfig($args) {
    $textConfig = '';
    if(!empty(option_get_config_value($args))){
        $textConfig = option_get_config_value($args);
    }else {
        $textConfig = 'default text';
    }

    echo $textConfig;
}
?>
<div class="block-engage">
    <div class="row mt-40 mt-xs-0">
        <div class="col-xs-12 col-sm-2">
            <div class="ml-10 ml-xs-0 mb-xs-20 title-mya">
                <span class="normal-font theme_color fs-24"></span>
                <h2 class="fw-b fs-30 lh-30">
                    <?php customConfig('title_reinsurance');?></h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-10">
            <div class="two-column-fluid style-two ml-20 ml-xs-0">
                <div class="icon-box">
                    <div class="icon"><span class="flaticon-shapes-1"></span></div>
                    <div class="lower-box">
                        <h4><span data-speed="1500" data-stop="7845910" class="count-text"><?php customConfig('content_one_reinsurance');?></h2></span></h4>
                        <span class="title">Engagement 1</span>
                    </div>
                </div>
                
                <div class="icon-box">
                    <!-- <div class="icon"><span class="flaticon-tool-4"></span></div> -->
                    <div class="icon"><span class="flaticon-shapes-1"></span></div>
                    <div class="lower-box">
                        <h4><span data-speed="1500" data-stop="13360" class="count-text"><?php customConfig('content_two_reinsurance');?></span></h4>
                        <span class="title">Engagement 2</span>
                    </div>
                </div>
                
                <div class="icon-box">
                    <div class="icon"><span class="flaticon-shapes-1"></span></div>
                    <div class="lower-box">
                        <h4><span data-speed="1500" data-stop="78459" class="count-text"><?php customConfig('content_three_reinsurance');?></span></h4>
                        <span class="title">Engagement 3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>