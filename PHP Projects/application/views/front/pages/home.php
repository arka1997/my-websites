<div class="page_slider menu_transparent">
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-source="gallery" style="background:#000000;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.3 fullscreen mode -->
        <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.3">
            <ul>
                <?php $j = 0; ?>
                <?php foreach ($image as $key => $i) { ?>
                    <!-- SLIDE  -->
                    <li data-index="rs-<?= $key ?>" data-transition="zoomout" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="<?php echo base_url('uploads/banner/' . $i->images) ?>" data-rotate="0" data-saveperformance="off" data-title="<?= $i->id ?>" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="<?php echo base_url('uploads/banner/' . $i->images) ?>" alt="" title="1600&#215;1200-1" width="1600" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption pp_subheader   tp-resizeme" id="slide-<?= ++$key ?>-layer-<?= ++$j ?>" data-x="center" data-hoffset="" data-y="bottom" data-voffset="300" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1000,"speed":600,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:-50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; color: #ffffff; font-family:Open Sans;font-style:italic;border-color:rgb(255,255,255);border-width:0px 0px 2px 0px;"><?= $i->id ?> </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption pp_header   tp-resizeme" id="slide-<?= $key ?>-layer-<?= ++$j ?>" data-x="center" data-hoffset="" data-y="bottom" data-voffset="180" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1300,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"x:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; ">
                            <h1><b><?= $i->details ?></b></h1>
                        </div>


                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption pp_content   tp-resizeme" id="slide-<?= $key ?>-layer-<?= ++$j ?>" data-x="center" data-hoffset="" data-y="bottom" data-voffset="100" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1600,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; ">Arctic temperatures and several meters of snow</div>

                        <div class="tp-caption pp_content   tp-resizeme" id="slide-<?= $key ?>-layer-<?= ++$j ?>" data-x="center" data-hoffset="" data-y="bottom" data-voffset="100" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1600,"speed":600,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"y:50px;opacity:0;","ease":"nothing"}]' data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; ">
                            <a class="button medium left" style="background-color:#f4ae40 !important;color:#ffffff !important;border:1px solid #f4ae40 !important;margin-right:10px;margin-bottom:10px;">Explore</a>
                        </div>
                    </li>
                <?php } ?>

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->
</div>
<div class="ppb_wrapper  ">
    <div class="one pp_tour_search">
        <div class="page_content_wrapper">
            <form id="tour_search_form" method="post" action="<?php echo base_url(); ?>front/cms/show_images" enctype="multipart/form-data">

                <div class="tour_search_wrapper">
                    <div class="one_fourth">
                        <label for="destination_package">Destination(s)/Packages</label>
                        <input id="destination_package" name="destination_package" type="text" placeholder="Enter Destination / Packages">
                    </div>
                    <div class="one_fourth">
                        <label for="start_date">Travel Dates</label>
                        <div class="start_date_input">
                            <input id="start_date" name="start_date" type="text" placeholder="Departure">
                            <!-- <input id="start_date_raw" name="start_date_raw" type="hidden"> -->
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="end_date_input">
                            <input id="end_date" name="end_date" type="text" placeholder="Return">
                            <!-- <input id="end_date_raw" name="end_date_raw" type="hidden"> -->
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <div class="one_fourth">
                        <label for="cost">Est. Budgets(In Rs)</label>
                        <input id="cost" name="cost" type="text" placeholder="USD EX. 100">
                    </div>
                    <div class="one_fourth last">
                        <input id="tour_search_btn" type="submit" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ppb_tour one withpadding " style="border-top:1px solid #e1e1e1;">
        <div class="page_content_wrapper full_width" style="text-align:center">
            <h2 class="ppb_title">People's Choice</h2>
            <div class="page_caption_desc pb20">Check out our best promotion tours</div>
            <div class="portfolio_filter_wrapper three_cols fullwidth shortcode gallery section content clearfix">

                <?php foreach ($packages as $key => $p) {
                    if ($key == 8) {
                        break;
                    } else { ?>
                        <div class="element portfolio3filter_wrapper">
                            <div class="one_third gallery3 filterable gallery_type animated<?= $key ?>">
                                <a href="east-europe.html">
                                    <img src="<?php echo base_url('uploads/package/' . $p->file) ?>" alt="">
                                </a>
                                <a href="east-europe.html" class="portanchor">
                                    <div class="thumb_content fullwidth ">
                                        <div class="thumb_title">
                                            <div class="tour_country">
                                                Turkey
                                            </div>
                                            <h3><?= $p->package_name ?></h3>
                                        </div>
                                        <div class="thumb_meta">
                                            <div class="tour_days">
                                                Days
                                            </div>
                                            <div class="tour_price">
                                                <?= $p->cost ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>


        <div class="text-center">
            <a href="<?php echo base_url(); ?>front/cms/load_packages" class="button medium center mt-4" style="background-color:#f4ae40 !important;color:#ffffff !important;border:1px solid #f4ae40 !important">Explore</a>
        </div>
    </div>
</div>

<div class="one withsmallpadding ">
    <div class="page_content_wrapper pt20" style="text-align:center">
        <h2 class="ppb_title">What Customers Say</h2>
        <br>
        <div class="testimonial_slider_wrapper">
            <div class="flexslider" data-height="750">
                <ul class="slides">
                    <?php foreach ($comments as $c) { ?>
                        <li>
                            <div class="testimonial_slider_wrapper"><?= $c->testimonial_details ?>
                                <div class="testimonial_slider_meta">
                                    <h6><?php $c->customer_name ?></h6>
                                    <div class="testimonial_slider_meta_position"><?= $c->position ?></div>-
                                    <div class="testimonial_slider_meta_company"><a href="#" target="_blank"><?= $c->company ?></a></div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- TESTIMONIALS -->
<div class="package_feedback_slider owl-carousel">
    <?php foreach ($destination as $key => $d) {
        if ($d->status == 1) { ?>
            <section class="user_package_feedback">
                <div style="background: url(<?php echo base_url('uploads/destination/' . $d->main_image) ?>);" class="feedback_item">
                    <div class="feedback_item_wrapper">
                        <div class="package_feedback_header">
                            <h1><?= $d->popular_name ?></h1>
                            <p>
                                <a href="<?php echo base_url(); ?>front/cms/" class="button small right ml-0" style="background-color:#f4ae40 !important;color:#ffffff !important;border:1px solid #f4ae40 !important">Read More</a>
                                <?= $d->details ?>
                            </p>
                        </div>
                        <div id="customers-testimonials" class="owl-carousel customers-testimonials">
                            <?php foreach ($destination_review as $k => $val) {
                                if ($val->destination_id == $d->id) { ?>
                                    <!-- Single Ends -->
                                    <div class="item">
                                        <div class="profile">
                                            <div class="information">
                                                <div class="stars">
                                                    <!-- fa fa-star is used to create star icon -->
                                                    <div class="rateyo-readonly-widg<?= $k ?>" data-key="<?= $k ?>"></div>
                                                    <input type="hidden" class="star_rating<?= $k ?>" name="rating[]" value="<?= $val->rating ?>">
                                                </div>
                                                <p>
                                                    <?= $val->customer_name ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p>
                                            <?= $val->review ?>
                                        </p>
                                        <div class="icon">
                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                            <?php }
                            } ?>

                            <input type="hidden" id="total_rating" value="<?= count($destination_review) ?>">
                            <!-- this below hiiden input is used for making the rating and review ID's dynamic -->
                            <input type="hidden" id="SlRows" value="1">
                        </div>
                    </div>
                </div>
            </section>
    <?php }
    }   ?>
</div>
<!-- END OF TESTIMONIALS -->
<div class="one withsmallpadding withbg parallax " data-image="<?php echo base_url('uploads/full_width_banner/' . $full_width_banner->main_image) ?>" data-width="1600" data-height="1200">
    <div class="page_content_wrapper pt40" style="text-align:center">
        <h2 class="ppb_title">Why Choose Us</h2>
        <div class="service_content_wrapper ">
            <?php foreach ($why_choose_us as $k => $w) { ?>
                <div class="one_third ">
                    <div class="service_wrapper">
                        <div class="service_icon"><i class="fa fa-star"></i></div>
                        <div class="service_title">
                            <h3><?= $w->title ?></h3>
                            <div class="service_content"><?= $w->description ?>
                                <div class="icon">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="one withsmallpadding " style="background:#f3f3f3;">
    <div class="page_content_wrapper pt20">
        <div class="one_fourth">
            <div class="animate_counter_wrapper"><i class="fa fa-smile-o"></i>
                <br>
                <div id="1584612796597484876" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                <div class="count_separator"><span></span></div>
                <div class="counter_subject">Happy Customers</div>
            </div>
        </div>
        <div class="one_fourth">
            <div class="animate_counter_wrapper"><i class="fa fa-bus"></i>
                <br>
                <div id="1584612796254376806" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                <div class="count_separator"><span></span></div>
                <div class="counter_subject">Amazing Tours</div>
            </div>
        </div>
        <div class="one_fourth">
            <div class="animate_counter_wrapper"><i class="fa fa-briefcase"></i>
                <br>
                <div id="1584612796413307740" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                <div class="count_separator"><span></span></div>
                <div class="counter_subject">In Business</div>
            </div>
        </div>
        <div class="one_fourth last">
            <div class="animate_counter_wrapper"><i class="fa fa-comments-o"></i>
                <br>
                <div id="1584612796678726464" class="odometer" style="font-size:44px;line-height:44px;">0</div>
                <div class="count_separator"><span></span></div>
                <div class="counter_subject">Support Cases</div>
            </div>
        </div>
        <p>
        </p>
    </div>
</div>
<div class="one withsmallpadding withbg " style="background-image:url(<?php echo base_url('uploads/destination_at_glance/' . $destination_at_glance->main_image); ?>);background-size:cover;margin-top:-1px;">
    <div class="page_content_wrapper fullwidth pt20" style="text-align:center">
        <h2 class="ppb_title"><?=$destination_at_glance->title?></h2>
        <div id="blog_grid_wrapper" class="sidebar_content full_width ppb_blog_posts" style="text-align:left">
               <?php foreach($destination as $key=>$d) { 
                   if($key <= 10) {
                       if($d->status==1){?>
            <div class="post type-post hentry status-publish">
                <div class="post_wrapper grid_layout" style="background-image:url('<?php echo base_url('uploads/destination/' . $d->main_image) ?>');">
                    <div class="parallax_overlay_header"></div>
                    <div class="grid_wrapper">
                        <div class="post_header grid"><a href="standard-blog-post-with-image.html" title="Standard Blog Post With Image">
                                <h6><?=$d->popular_name?></h6>
                            </a>
                            <div class="post_detail">
                                <!-- On&nbsp;May 28, 2014 -->
                                <?=$d->date?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php } }}?>
        </div>
        <div class="text-center">
            <a href="<?php echo base_url(); ?>front/cms/load_destinations" class="button medium center mt-4" style="background-color:#f4ae40 !important;color:#ffffff !important;border:1px solid #f4ae40 !important">Explore</a>
        </div>
        <br class="clear">
    </div>
</div>
</div>
</div>