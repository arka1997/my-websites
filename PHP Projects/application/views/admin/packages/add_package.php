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
            <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/packages/insert_package" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Destination</label>
                      <div class="select2-purple">
                        <select class="select2" name="destination_ids[]" multiple="multiple" data-placeholder="Select Destination names for package" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          <?php foreach($destination as $d){ ?>
                          <option value="<?=$d->id?>"><?=$d->destination_name?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <span class="text-danger"><?php echo form_error('destination_ids'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPackage">Popular Name</label>
                      <input type="text" class="form-control" id="popular_name" name="popular_name" placeholder="Enter Popular Name">
                      <span class="text-danger"><?php echo form_error('popular_name'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPackage">Package Name</label>
                      <input type="text" class="form-control" id="package_name" name="package_name" onkeyup="create_package_slug(this.value)" placeholder="Enter Package">
                      <span class="text-danger"><?php echo form_error('package_name'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputtagline">Tagline</label>
                      <input type="text" class="form-control" id="tag_line" name="tag_line" placeholder="Enter tagline">
                      <span class="text-danger"><?php echo form_error('tag_line'); ?></span>
                    </div>
                  </div>
                </div>

                  
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputslug">Slug</label>
                      <input type="text" class="form-control" id="package_slug" name="package_slug" placeholder="Enter slug" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tags">Tags</label>
                      <select name="tags[]" id="tags" class="form-control tokenize-sample-demo1" multiple>
                        <?php if ($tags) {
                          foreach ($tags as $t) {
                        ?>
                            <option value="<?= $t->id ?>"><?= $t->tag_name ?></option>

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
                          <input type="file" class="custom-file-input" id="main_image" name="main_image">
                          <label class="custom-file-label" for="main_image">Choose file</label>
                        </div>
                      </div>
                      <span class="text-danger"><?php echo form_error('main_image'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="additional_images">Add More Images</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="additional_images" name="additional_images[]" multiple>
                          <label class="custom-file-label" for="additional_images">Choose file</label>
                        </div>
                      </div>
                        <span class="text-danger"><?php echo form_error('additional_images'); ?></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cost">Cost INR per Pack</label>
                      <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter cost">
                      <span class="text-danger"><?php echo form_error('cost'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="days">No. Of Days</label>
                      <input type="number" class="form-control" id="days" name="days" placeholder="Enter days">
                      <span class="text-danger"><?php echo form_error('days'); ?></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nights">No. Of Nights</label>
                      <input type="number" class="form-control" id="nights" name="nights" placeholder="Enter nights">
                      <span class="text-danger"><?php echo form_error('nights'); ?></span>
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
                              <textarea class="textarea" name="details" id="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                          </div>
                          <span class="text-danger"><?php echo form_error('details'); ?></span>
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
                              <textarea class="textarea" name="itinerary" id="itinerary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                          </div>
                          <span class="text-danger"><?php echo form_error('itinerary'); ?></span>
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
                              <textarea class="textarea" id="instructions" name="instructions" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                          </div>
                          <span class="text-danger"><?php echo form_error('instructions'); ?></span>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>

                <!-- adding rating and review section -->
                <div class="row">
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label class=""><b>Review</b> <a href="javascript:void(0);" onclick="addreview()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a></label>
                      <input type="text" class="form-control" placeholder="Enter review Name" name="review[]">
                    </div>
                    <!-- star rating -->
                    <div style="margin-bottom:5px">
                      <label style="margin-bottom : 10px;">Rating</label>
                      <div class="rateyo-readonly-widg"></div>
                      <input type="hidden" class="star_rating" name="rating[]" id="rating">
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <input type="hidden" id="SlRows" value="1">
                    </div>
                  </div>
                </div>
                <span id="Appendreview"></span>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="traveller_choice" name="traveller_choice">
                    <label for="traveller_choice" class="custom-control-label">Traveller choice</label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status">
                    <label class="custom-control-label" for="status">Active</label>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
          <!-- /.card-body -->
          </form>
        </div>
      </div>
    </div>
</div>
</section>
</div>