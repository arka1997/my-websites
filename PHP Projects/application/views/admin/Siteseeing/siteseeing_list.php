<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Siteseeing</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Siteseeing</li>
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
                            <h3 class="card-title">Siteseeing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Siteseeing Name</th>
                                        <th>Destination Place</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($siteseeing as $key => $s) { ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?= $s->siteseeing_name ?></td>
                                            <td><?= $s->destination_name ?></td>
                                            <td style="text-align: center;">
                                                <?php //if($check_id[$key]->siteseeing_id==$s->id){ 
                                                ?>
                                                <a href="#" class="">
                                                    <?php if ($s->siteseeing_details == '') { ?>
                                                        <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modal-default" onclick="siteseeing_id(<?= $key ?>)">
                                                            <input type="hidden" id="siteseeing_name<?= $key ?>" value="<?= $s->siteseeing_name ?>">
                                                            <input type="hidden" id="siteseeing_id<?= $key ?>" value="<?= $s->id ?>">
                                                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                            <!-- <i class="fa fa-edit"></i> -->
                                                        </button></a>
                                            <?php } else { ?>
                                                <a href="#" data-toggle="modal" data-target="#modal-default<?php echo $s->id; ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                <?php if ($s->status == 1) { ?>
                                                    <a href="<?php echo base_url('admin/siteseeing/update_status/0/'); ?><?= $s->id ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('admin/siteseeing/update_status/1/'); ?><?= $s->id ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-check-square"></i></a>
                                            <?php }
                                                    } ?>

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
            <form class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/siteseeing/insert_siteseeing" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Siteseeing Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Siteseeing Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="siteseeing_name">Siteseeing Name</label>
                                <input type="text" class="form-control" id="siteseeing_name" value="" readonly>
                                <input type="hidden" id="siteseeing_id" name="siteseeing_id" value="">
                                <span class="text-danger"><?php echo form_error('siteseeing_id'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload_file" onchange="preview_image(this);" name="images[]" multiple>
                                        <label class="custom-file-label" for="upload_file">Choose file</label>
                                    </div>
                                </div>
                                <!-- //Image preview -->
                                <div id="image_preview">
                                </div>
                                <span class="text-danger"><?php echo form_error('images'); ?></span>
                            </div>
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="detail">Details</label>
                                            <textarea class="textarea" id="detail" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <span class="text-danger"><?php echo form_error('detail'); ?></span>
                                </div>
                            </section>
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
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="traveller_choice" name="traveller_choice">
                                    <label for="traveller_choice" class="custom-control-label">Traveller choice</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="status" name="status">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
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
<?php if ($siteseeing) {
    foreach ($siteseeing as $key => $s) { ?>
        <div class="modal fade" id="modal-default<?php echo $s->id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/siteseeing/update_siteseeing/<?= $s->siteseeing_details_id ?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Siteseeing Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Siteseeing Edit Form</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="siteseeing_name">Siteseeing Name</label>
                                        <input type="text" class="form-control" id="siteseeing_name" value="<?= $s->siteseeing_name ?>" readonly>
                                        <input type="hidden" id="siteseeing_id" name="siteseeing_id" value="<?= $s->id ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="upload_img<?= $key ?>">Images</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_img<?= $key ?>" onchange="preview_img(this,<?= $key ?>);" name="images[]" multiple>
                                                <label class="custom-file-label" for="upload_img<?= $key ?>">Choose file</label>
                                            </div>
                                        </div>
                                        <!-- //Image preview -->
                                        <div id="siteseeing_images<?= $key ?>">
                                        </div>

                                        <div class="container ">
                                            <div class="card-group row col-md-12 ">
                                                <?php if (!empty($siteseeing_images[$s->siteseeing_details_id])) {
                                                    foreach ($siteseeing_images[$s->siteseeing_details_id] as $key => $img) { ?>
                                                        <div class="card col-md-4 ">
                                                            <input type="checkbox" onchange="edit_status_check(this,<?= $img->id ?>)" value="<?= $img->status ?>" <?php if ($img->status == 1) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?> id="check<?= $key ?>" />

                                                            <label for="edit_Checkbox<?= $key ?>" id="edit_siteseeing_image_preview<?= $key ?>">
                                                                <img src="<?php echo base_url('uploads/siteseeing/' . $img->file); ?>" width="100" height="100"></label>
                                                            <?php echo anchor('admin/siteseeing/delete_multi_img/' .$img->file.'/'. $img->id, 'Delete', 'class="btn btn-danger"'); ?>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo form_error('images'); ?></span>
                                    </div>
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="detail">Details</label>
                                                    <textarea class="textarea" id="detail" name="detail" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $s->description ?></textarea>
                                                </div>
                                                <span class="text-danger" id="check_dtl"></span>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="form-group">
                                        <label for="tags">Tags</label>
                                        <select name="tags[]" id="tags" class="form-control tokenize-sample-demo1" multiple>
                                            <?php if ($siteseeing) {
                                                $tag_id = explode(',', $s->siteseeing_details_tags);
                                                foreach ($tags as $t) {
                                            ?>
                                                    <option value="<?= $t->id ?>" <?php
                                                                                if ($tag_id) {
                                                                                    foreach ($tag_id as $id) {
                                                                                        if ($id == $t->id) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    }
                                                                                } ?>><?= $t->tag_name ?></option>

                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="traveller_choice<?= $key ?>" name="traveller_choice" <?php if ($s->traveller_choice == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                            <label for="traveller_choice<?= $key ?>" class="custom-control-label">Traveller choice</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" <?php if ($s->status == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
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
<?php }
} ?>