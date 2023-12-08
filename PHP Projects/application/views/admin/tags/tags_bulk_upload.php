<!DOCTYPE html>
<html>
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags_Upload</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/tags_bulk_upload/index">Tags_Excel</a></li>
                            <li class="breadcrumb-item active">Add tags sheet</li>
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
                                <h3 class="card-title">Excel sheet upload</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/tags_bulk_upload/upload_file" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="main_image">Excel Sheet Upload</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file" name="file">
                                                    </div>
                                                    <label class="custom-file-label" for="file">Choose file</label>
                                                </div>
                                            </div>
                                            <p><a href="<?php echo base_url(); ?>/uploads/demo_excel_file/Tags.xlsx"><i class="fa fa-download"></i>&nbsp;&nbsp;Click here to get demo file</a></p>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                        <!-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="main_image"> Excel demo file download</label>
                                                <div class="input-group">
                                                    <a href="<?php echo base_url(); ?>/uploads/demo_excel_file/Tags.xlsx" download="" class="btn btn-outline-danger">Demo</a>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                    </div>
                                    
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
    </form>
</body>

</html>