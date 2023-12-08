<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Why choose us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Why choose us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modal-default-banner" >Upload banner Image</button>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Title</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($full_width_banner as $key => $f) { ?>
                                        <tr>
                                            <td><?=++$key?></td>
                                            <td><?= $f->title ?></td>
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-default<?=$f->id?>" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/full_width_banner/delete_full_width_banner/'); ?><?= $f->id ?>')" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ADD Model -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/full_width_banner/insert_full_width_banner" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Destination At Glance Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Destination At Glance Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="textarea" id="description" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                            </section>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--  Upload Banner Image-->
<!-- ADD Model -->
<div class="modal fade" id="modal-default-banner">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/full_width_banner/insert_full_width_banner" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Destination At Glance Banner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Destination At Glance Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="main_image">Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="main_image" onchange="main_preview_image(this);" name="main_image">
                                        <label class="custom-file-label" for="main_image">Choose file</label>
                                    </div>
                                </div>
                                <!-- //Image preview -->
                                <div id="main_image_preview">
                                </div>
                                <span class="text-danger"><?php echo form_error('main_image'); ?></span>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- part 2 -->
<!-- /.content-wrapper -->
<!--EDIT Model -->
<?php if ($full_width_banner) {
    foreach ($full_width_banner as $key => $w) { ?>
        <div class="modal fade" id="modal-default<?php echo $w->id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/full_width_banner/update_full_width_banner/<?= $w->id ?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Destination  At_glance Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Destination At_glance Edit Form</h3>
                                </div>
                                <!-- /.card-header -->
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title<?=$key?>" name="title" value="<?= $w->title ?>" >
                                        <span class="text-danger"><?php echo form_error('title'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="main_image<?=$w->id?>">Images</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="main_image<?=$w->id?>" onchange="return edit_main_preview_image(this,<?=$w->id?>);" name="main_image" >
                                                <label class="custom-file-label" for="main_image<?=$w->id?>">Choose file</label>     
                                            </div>
                                        </div>
                                        <div class="container ">
                                            <div class="card-group row col-md-12 ">
                                                    <div class="card col-md-4">
                                                        <img src="<?php echo base_url('uploads/full_width_banner/' . $w->main_image); ?>" width="100" height="100"></label>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- //Image preview -->
                                <div id="main_image_preview<?=$w->id?>"> </div>
                                        <span class="text-danger"><?php echo form_error('main_image'); ?></span>
                                    </div>
                                </div>
                                </div>
                                
                                <!-- /.card-body -->
                            </div>
                            
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<?php }
} ?>