
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

$postMetas = get_post_meta($post->ID);
$engagements = array();

if (array_key_exists('engagement1', $postMetas)) {
    array_push($engagements, $postMetas['engagement1'][0]);
}

if (array_key_exists('engagement2', $postMetas)) {
    array_push($engagements, $postMetas['engagement2'][0]);
}

if (array_key_exists('engagement3', $postMetas)) {
    array_push($engagements, $postMetas['engagement3'][0]);
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

                <?php
                    for ($i = 0; $i < count($engagements); $i++) {
                ?>
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-shapes-1"></span></div>
                            <div class="lower-box">
                                <h4><span data-speed="1500" data-stop="7845910" class="count-text"><?php echo $engagements[$i];?></h2></span></h4>
                                <span class="title">Engagement <?php echo ($i+1); ?></span>
                            </div>
                        </div>
                <?php
                    } 
                ?>
            </div>
        </div>
    </div>
</div>