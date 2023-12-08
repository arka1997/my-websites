<div id="page_caption" class="hasbg parallax  " data-image="<?php echo base_url('uploads/package/domestic-tour-packages.jpg') ?>" data-width="1200" data-height="1200">
    <div class="page_title_wrapper">
        <h1>Tour Grid Fullwidth</h1>
        <div id="crumbs"><a href="index.html">Home</a> / <span class="current">Tour Grid Fullwidth</span></div>
    </div>
    <div class="parallax_overlay_header"></div>
</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">
    <!-- Begin content -->
    <div class="inner">

        <div class="inner_wrapper">

            <div id="page_main_content" class="sidebar_content full_width">
            <!-- OR -->
            <!-- <div class="ppb_wrapper  ">
        <div class="one pp_tour_search">
            <div class="page_content_wrapper"> -->


                <!-- Begin of ppb_tour one withpadding -->
                <div class="ppb_tour one withpadding ">

                <div class="page_content_wrapper full_width" style="text-align:center">

                <h2 class="ppb_title ">All Destinations & Offers</h2>
            <div class="page_caption_desc pb20">Check out our best promotion tours</div>

                <div id="portfolio_filter_wrapper" class="three_cols gallery section content clearfix">
                <?php foreach($destinations as $key=>$d) { 
                    if($d->status == 1){ ?>
                    <div class="element portfolio3filter_wrapper">

                        <div class="one_third gallery3 filterable gallery_type animated<?=$key?>" data-id="post-<?=$key?>">

                            <a href="east-europe.html">
                            <img src="<?php echo base_url('uploads/destination/'.$d->main_image)?>" alt="" title="1600&#215;1200-1" width="1600" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                            </a>

                            <div class="thumb_content classic">
                                <div class="thumb_title">
                                    <div class="tour_country"> <?=$d->popular_name?> </div>
                                    <a href="east-europe.html">
                                        <h3><?=$d->destination_name?></h3>
                                    </a>
                                </div>
                                <!-- <div class="thumb_meta">
                                    <div class="tour_days"> <?=$d->days?> Days </div>
                                    <div class="tour_price"> Rs <?=$d->cost?> </div>
                                </div> -->
                                <br class="clear">
                                <div class="tour_excerpt"><?=$d->details?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php }} ?>
                   <!--  -->
                </div>
                <!-- END OF ppb_tour one withpadding -->
                </div>
                <!-- page_content_wrapper full_width -->
                </div>
                <div class="text-center">
                <a href="<?php echo base_url();?>front/cms/index" class="button medium center mt-4" style="background-color:#76bb2c !important;color:#ffffff !important;border:1px solid #76bb2c !important;"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br class="clear">
<br>

</div>
