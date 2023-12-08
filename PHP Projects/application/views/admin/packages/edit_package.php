<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Packages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/packages/index">Package</a></li>
            <li class="breadcrumb-item active">Add Package</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Package Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php foreach ($package_dtl as $p) { ?>
            <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/packages/update_packages/<?=$p->id?>" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Select Destination</label>
                      <div class="select2-purple">
                        <select class="select2" name="destination_ids[]" multiple="multiple" data-placeholder="Select Destination names for package" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        <?php
                      $destination_ids = explode(',', $p->destination_ids); //converting the comma-separated string to array format
                      if ($destination) {
                           foreach($destination as $d){ ?>
                          <option value="<?=$d->id?>" <?php if ($destination_ids) {
                                                        foreach ($destination_ids as $id) {
                                                          if ($id == $d->id) {
                                                            echo 'selected';
                                                          }
                                                        }
                                                      } ?>><?=$d->destination_name ?></option>
                      <?php }
                      } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPackage">Package Name</label>
                      <input type="text" class="form-control" id="package_name" name="package_name" onkeyup="create_package_slug(this.value,<?=$p->id?>)" placeholder="Enter Package" value="<?= $p->package_name ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPackage">Popular Name</label>
                      <input type="text" class="form-control" id="popular_name" name="popular_name" placeholder="Enter Popular Name" value="<?= $p->popular_name ?>" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputpackage">Package ID</label>
                      <input type="text" class="form-control"  placeholder="Enter ID" value="<?=$p->package_id ?>" readonly >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputtagline">Tagline</label>
                      <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="Enter tagline" value="<?= $p->tag_line ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputslug">Slug</label>
                      <input type="text" class="form-control" id="package_slug" name="package_slug" value="<?= $p->slug ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control tokenize-sample-demo1" multiple>
                      <?php
                      $tag_ids = explode(',', $p->tags); //converting the comma-separated string to array format
                      if ($tags) {
                        foreach ($tags as $t) {
                      ?>
                          <option value="<?= $t->id ?>" <?php if ($tag_ids) {
                                                        foreach ($tag_ids as $id) {
                                                          if ($id == $t->id) {
                                                            echo 'selected';
                                                          }
                                                        }
                                                      } ?>><?= $t->tag_name ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="main_image">Package Main Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="main_image" onchange="return check_file_type()" name="main_image" value="<?=$p->file?>">
                          <label class="custom-file-label" for="main_image">Choose file</label>
                        </div>
                      </div>
                        <img src="<?php echo base_url('uploads/package/' . $p->file); ?>" width="30%" height="25%"></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="additional_images">Add More Images</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="additional_images" onchange="return check_file_type2()" name="additional_images[]" multiple>
                          <label class="custom-file-label" for="additional_images">Choose file</label>
                        </div>
                      </div>
                      <!-- Showing fetched image -->
                    <?php foreach ($additional_images as $key => $a) : ?>
                      <div class="form-group col-sm-5 col-lg-6 flex">

                          <img src="<?php echo base_url('uploads/package/' . $a->file); ?>" width="30%" height="25%">

                        <?php echo anchor('admin/packages/delete_multi_img/'.$a->file.'/'.$a->id, 'Delete', 'class="btn btn-danger"'); ?>
                      </div>
                    <?php endforeach; ?>
                    <span class="text-danger"><?php echo form_error('images'); ?></span>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputcost">Cost INR per Pack</label>
                      <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter cost"  value="<?= $p->cost ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="days">No. Of Days</label>
                      <input type="number" class="form-control" id="days" name="days" value="<?=$p->days?>">
                      <span class="text-danger"><?php echo form_error('days'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="nights">No. Of Nights</label>
                      <input type="number" class="form-control" id="nights" name="nights" value="<?=$p->nights?>">
                      <span class="text-danger"><?php echo form_error('nights'); ?></span>
                    </div>
                  </div>
                  <?php
                  if($p->days  >= $p->nights)
                  {
                    $total_days = $p->days;
                  }
                  elseif($p->days <= $p->nights)
                  {
                    $total_days = $p->nights;
                  }
                  ?>
                  <div class="col-md-2">
                    <div class="form-group">
                    <label for="nights">Total Days</label>
                      <input type="text" class="form-control" value="<?=$total_days?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <section class="content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card-header">
                            <h3 class="card-title">
                              Details
                            </h3>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea class="textarea" name="details" id="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $p->details ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

                    <section class="content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card-header">
                            <h3 class="card-title">
                              Itinerary
                            </h3>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea class="textarea" name="itinerary" id="itinerary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$p->itinerary?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>

                    <section class="content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card-header">
                            <h3 class="card-title">
                              Instructions & notes
                            </h3>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea class="textarea" id="instructions" name="instructions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $p->instructions ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>

                <!-- adding rating and review section -->
                <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group ">
                        <label class=""><b>Review</b> <a href="javascript:void(0);" onclick="addreview()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a> </label>

                        <?php foreach ($review as $key => $r) { ?>

                          <div class="row" id="review<?= $key ?>">
                            <!-- <div class="col-lg-12 flex"> -->
                            <div class="col-lg-6">
                              <label><b>Review</b></label>
                              <input type="text" class="form-control" placeholder="Enter review Name" name="review[]" value="<?= $r->review ?>">
                            </div>
                            <div class="col-sm-2">
                              <a href="javascript:void(0)" onclick="DeleteEditreview(<?= $key ?>)" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete Row"><i class="fa fa-trash"></i></a>
                            </div>
                            <!-- star rating -->
                            <div class="col-lg-6">
                              <br>
                              <label>Rating</label>
                              <!-- fa fa-star is used to create star icon -->
                              <div class="rateyo-readonly-widg<?= $key ?>" data-key="<?= $key ?>"></div>
                              <input type="hidden" class="star_rating<?= $key ?>" name="rating[]" value="<?= $r->rating ?>">
                            </div>
                            <!-- </div> -->
                          </div>

                          <br>
                        <?php } ?>

                        <input type="hidden" id="total_rating" value="<?= count($review) ?>">

                      </div>
                    </div>
                  </div>
                  <!-- this below hiiden input is used for making the rating and review ID's dynamic -->
                  <input type="hidden" id="SlRows" value="1">
                  <!-- Append preview is used for printing the output of the addmore review function in js -->
                  <span id="Appendreview"></span>

                  <!-- End of editing review code -->

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="traveller_choice" name="traveller_choice"  <?php if ($p->traveller_choice == "1") {
                                                                                                                                                            echo "checked";
                                                                                                                                                          } ?>>
                    <label for="traveller_choice" class="custom-control-label">Traveller choice</label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" <?php if ($p->status == "1") {
                                                                                                                                        echo "checked";
                                                                                                                                      } ?>>
                    <label class="custom-control-label" for="status">Active</label>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
          <?php } ?>
          <!-- /.card-body -->
          </form>
        </div>
      </div>
    </div>
</div>
</section>
</div>