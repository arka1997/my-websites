
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
                            <li class="breadcrumb-item"><a href="<?php echo  base_url()?>admin/destinations/index">Destinations</a></li>
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
                                <form id="tags" class="forms-sample-add_menu" method="post"  action="<?php echo base_url();?>admin/destinations/insert_destination" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="destination_name">Destination Name</label>
                                            <input type="text" class="form-control" id="destination_name" name="destination_name" onkeyup="create_slug(this.value)" placeholder="Enter destination name">
                                            <span class="text-danger"><?php echo form_error('destination_name'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="popular_name">Popular Name</label>
                                            <input type="text" class="form-control" id="popular_name" name="popular_name" placeholder="Enter popular name">
                                            <span class="text-danger"><?php echo form_error('popular_name'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <select name="tags[]" id="tags" class="form-control tokenize-sample-demo1" multiple>
                                                <?php
                                                if($tags) {
                                                foreach($tags as $t){
                                                ?>
                                                <option value="<?=$t->id?>"><?=$t->tag_name?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" readonly>
                                            <span class="text-danger"><?php echo form_error('slug'); ?></span>
                                        </div>
                                        
                                    <div class="form-group">
                                    <label for="main_image">Destination Main Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_image" onchange="return main_preview_image(this);" name="main_image">
                                        <label class="custom-file-label" for="main_image">Choose file</label>
                                        </div>
                                    </div>
                                    <!-- //Image preview -->
                                    <div id="main_image_preview">
                                            </div>
                                    <span class="text-danger"><?php echo form_error('main_image'); ?></span>
                                    </div>
                                        <div class="form-group">
                                            <label for="upload_file">More Images</label>
                                            <div class="input-group">
                                                <div class="custom-file" >
                                                    <input type="file" class="custom-file-input" 
                                                    id="upload_file" onchange="return preview_image(this);" 
                                                    name="images[]" multiple>
                                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- //Image preview -->
                                            <div id="image_preview">
                                            </div>
                                            <span class="text-danger"><?php echo form_error('images'); ?></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Short description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter...." name="description"></textarea>
                                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control textarea" placeholder="Place some text here" name="details"></textarea>
                                            <span class="text-danger"><?php echo form_error('details'); ?></span>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-5 float-left">
                                                <div class="form-group ">
                                                    <label class=""><b>Nearby Siteseeing</b> <a href="javascript:void(0);" onclick="addMore()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a></label>
                                                    <input type="text" class="form-control" placeholder="Enter Siteseeing Name" name="siteseeing[]">
                                                    <span class="text-danger"><?php echo form_error('siteseeing'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 float-right">
                                                <input type="hidden" id="SlRow" value="1">
                                            </div>
                                        </div>
                                        <span id="AppendData"></span>
                                        <!-- adding rating and review section -->
                                        <div class="row">
                                            <div class="col-lg-5">
                                            <label class=""><b>Review</b> <a href="javascript:void(0);" onclick="addreview()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a></label>
        
                                                <div class="form-group">
                                                    <label class=""><b>Customer Name</b></label>
                                                    <input type="text" class="form-control" placeholder="Enter Customer Name" name="customer_name[]">
                                                    <span class="text-danger"><?php echo form_error('customer_name'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class=""><b>Review</b></label>
                                                    <input type="text" class="form-control" placeholder="Enter review Name" name="review[]">
                                                    <span class="text-danger"><?php echo form_error('review'); ?></span>
                                                </div>
                                                <!-- star rating -->
                                                <div style="margin-bottom:5px">
                                                    <label style = "margin-bottom : 10px;">Rating</label>
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
                                            <div class="custom-control custom-checkbox checked">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="traveller_choice">
                                                <label for="customCheckbox2" class="custom-control-label">Traveller choice</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ">
                                                <input type="checkbox" class="custom-control-input" id="customCheckbox3" name="status">
                                                <label class="custom-control-label" for="customCheckbox3">Active</label>
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