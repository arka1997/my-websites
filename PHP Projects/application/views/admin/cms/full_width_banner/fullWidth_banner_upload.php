<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banner Upload</h1>
                    <!-- <button type="button" class="btn btn-warning toastsDefaultWarning"></button> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/banner_upload/index">Banner</a></li>
                        <li class="breadcrumb-item active">Banner Upload</li>
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
                            <h3 class="card-title">Banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/banner_upload/insert_banner" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Images</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="upload_file" onchange="return preview_image(this);" name="images[]" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <!-- //Image preview -->
                                    <div id="image_preview">
                                    </div>
                                    <span class="text-danger"><?php echo form_error('images'); ?></span>
<!--                                 
                                <section class="content">
                                    <div class="row">
                                    
                                    
                                        <div class="col-md-12">
                                        
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                <p class="">
                                                    <b>Banner Details</b>
                                                </p>
                                                    <textarea class="textarea" name="details" id="details"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('details'); ?></span>
                                        </div>
                                    </div>
                                </section> -->
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