<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Destination</h1>
          <!-- <button type="button" class="btn btn-warning toastsDefaultWarning"></button> -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/destinations/index">Destinations</a></li>
            <li class="breadcrumb-item active">Add Destination</li>
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
              <h3 class="card-title">Destination Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php foreach ($param as $p) { ?>
              <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/destinations/update_destination/<?= $p->id ?>" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="destination_name">Destination Name</label>
                    <input type="text" class="form-control" id="destination_name" name="destination_name" onkeyup="create_slug(this.value,<?= $p->id ?>)" placeholder="Enter destination" value="<?= $p->destination_name ?>">
                    <span class="text-danger"><?php echo form_error('destination_name'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="popular_name">Popular Name</label>
                    <input type="text" class="form-control" id="popular_name" name="popular_name" placeholder="Enter popular name" value="<?= $p->popular_name ?>">
                    <span class="text-danger"><?php echo form_error('popular_name'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="destination_id">Destination ID</label>
                    <input type="text" class="form-control" id="destination_id" name="destination_id" placeholder="Enter ID" value="<?= $p->destination_id ?>" readonly>
                    <span class="text-danger"><?php echo form_error('destination_id'); ?></span>
                  </div>
                  <style type="text/css">
                    .checked {
                      color: orange;
                    }
                  </style>

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

                  <div class="form-group">
                    <label for="exampleInputslug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="<?= $p->slug ?>">
                    <span class="text-danger"><?php echo form_error('slug'); ?></span>
                  </div>
                  <!-- Images  -->
                  <div class="form-group">
                      <label for="main_image">Destination Main Image</label>
                      <div class="input-group">
                          <div class="custom-file">
                          <input type="file" class="custom-file-input" id="main_image" onchange="return main_preview_image(this);" name="main_image">
                          <label class="custom-file-label" for="main_image">Choose file</label>
                          </div>
                          <img class="card-img-top " src="<?php echo base_url('uploads/destination/' . $p->main_image); ?>" width="200" height="100">
                      </div>
                      <!-- //Image preview -->
                      <div id="main_image_preview"></div>
                      <!-- end -->
                      <span class="text-danger"><?php echo form_error('main_image'); ?></span>
                  </div>
                  <!-- end IMAGES -->
                  <div class="form-group">
                    <label for="upload_file">Images</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="upload_file" onchange="return preview_image(this);" name="images[]" multiple>
                      <label class="custom-file-label" for="upload_file">Choose file</label>
                    </div>
                    <!-- //Image preview -->
                    
                    <div class="card col-md-12 ">
                    <div id="image_preview">
                    </div>
                    </div>
                    <!-- END -->

                    <!-- Showing fetched image -->
                    <div class="container ">
                      <div class="card-group row col-md-12 ">
                        <?php foreach ($img as $key => $d) : ?>
                          <div class="card col-md-12 ">

                            <input type="checkbox" onchange="image_check(this,<?= $d->id ?>)" value="<?= $d->status ?>" <?php if ($d->status == 1) { echo "checked"; } ?> id="check<?= $key ?>" />

                            <img class="card-img-top " src="<?php echo base_url('uploads/destination/' . $d->file); ?>" width="200" height="100">

                            <label for="Checkbox<?= $key ?>" id="image_preview<?= $key ?>"></label>

                            <?php echo anchor('admin/destinations/delete_multi_img/' .$d->file.'/'. $d->id, 'Delete', 'class="btn btn-danger"'); ?>

                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <span class="text-danger"><?php echo form_error('images'); ?></span>
                  </div>



                  <!-- DESCRIPTION  -->
                  <div class="form-group">
                    <label>Short description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"><?= $p->description ?></textarea>
                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                  </div>

                  <div class="form-group">
                    <label>Details</label>
                    <textarea class="form-control textarea" placeholder="Place some text here" name="details"><?= $p->details ?></textarea>
                    <span class="text-danger"><?php echo form_error('details'); ?></span>
                  </div>

                  <!-- siteseeing edit code starts -->
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group ">
                        <label class=""><b>Nearby Siteseeing</b> <a href="javascript:void(0);" onclick="addMore()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a></label>

                        <?php foreach ($siteseeing as $key => $s) { ?>

                          <div class="row" id="siteseeing<?= $key ?>">

                            <div class="col-lg-6">
                              <input type="text" class="form-control" placeholder="Enter Siteseeing Name" name="siteseeing[]" value="<?= $s->siteseeing_name ?>">
                            </div>

                            <div class="col-sm-2">
                              <a href="javascript:void(0)" onclick="DeleteEditSiteseeing(<?= $key ?>)" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete Row"><i class="fa fa-trash"></i></a>
                            </div>

                          </div>

                          <br>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <span id="AppendData"></span>
                  <!-- End of siteseeing -->

                  <!-- adding rating and review section -->
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="form-group ">
                        <label class=""><b>Review</b> <a href="javascript:void(0);" onclick="addreview()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a> </label>

                        <?php foreach ($review as $key => $r) { ?>

                          <div class="row" id="review<?= $key ?>">
                          <div class="col-lg-6">
                              <label><b>Customer_name</b></label>
                              <input type="text" class="form-control" placeholder="Enter customer Name" name="customer_name[]" value="<?= $r->customer_name ?>">
                            </div>
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

                  <!-- edit traveller choice -->
                  <div class="form-group">
                    <div class="custom-control custom-checkbox checked">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="traveller_choice" <?php if ($p->traveller_choice == "1") {
                                                                                                                          echo "checked";
                                                                                                                        } ?>>
                      <label for="customCheckbox2" class="custom-control-label">Traveller choice</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox ">

                      <input type="checkbox" class="custom-control-input" id="customCheckbox3" name="status" <?php if ($p->status == "1") {
                                                                                                                echo "checked";
                                                                                                              } ?>>
                      <label class="custom-control-label" for="customCheckbox3">Active</label>
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
<!-- <script>
  function bb(val){

  }

    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
</script>
 -->