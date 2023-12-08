<div class="ppb_tour one withpadding " style="border-top:1px solid #e1e1e1;">
        <div class="page_content_wrapper full_width" style="text-align:center">
            <h2 class="ppb_title">Best Offers</h2>
            <div class="page_caption_desc pb20">Check out our best promotion tours</div>
            <div class="portfolio_filter_wrapper three_cols fullwidth shortcode gallery section content clearfix" style="text-align:center">
               
                <?php foreach($packages as $key=>$p) { ?>
                <div class="element portfolio3filter_wrapper">
                    <div class="one_third gallery3 filterable gallery_type animated<?=$key?>">
                        <a href="east-europe.html">
                            <!-- <img src="<?php echo base_url('uploads/package/'.$p->file)?>" alt="">  -->
                            <img src="<?php echo base_url('uploads/package/'.$p->file)?>" alt="" title="1600&#215;1200-1" width="1600" height="1200" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina="">
                   
                        </a>
                        <a href="east-europe.html" class="portanchor"><div class="thumb_content fullwidth ">
                            <div class="thumb_title">
                                <div class="tour_country">
                                    <?=$p->popular_name?>
                                </div>
                                <h3><?=$p->package_name?></h3>
                            </div>
                            <div class="thumb_meta">
                                <div class="tour_days">
                                <?=$p->days?> Days
                                </div>
                                <div class="tour_price">
                                    Rs <?=$p->cost?>
                                </div>
                            </div>
                        </div></a>
                    </div>
                </div>     
                <?php } ?>                   
            </div>
            <h3>If you want your package customized, we would be happy to connect with you. Please fill up the below form to connect each other.</h3>
                    
            <div class="login-box">
  <div class="login-logo">
    <a href="Javascript:void(0)"><b>Customize</b>PackageForm</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Fill in the form</p>

      <form id="tour_search_form"  method="post" action="<?php echo base_url();?>front/cms/customize_package_details" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="full name">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email id">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="phone" placeholder="Phone">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="travellers" placeholder="Pax/Travellers">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="location" placeholder="location">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="source_rail_station" placeholder="source railway station">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                <br/>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
        </div>
    </div>