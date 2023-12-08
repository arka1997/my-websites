<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Banner Image Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">BannerTable</li>
          </ol>
        </div>
      </div>
      <div class="text-right">
        <a href="<?php echo base_url('admin/banner_upload/add_banner') ?>" class="btn btn-success">Add Banner Images</a>
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
              <h3 class="card-title">Banner table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Images</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <?php foreach ($banner_img as $key => $b) { ?>
                  <tbody>
                    <tr>
                      <td><?= ++$key ?></td>
                      <td><img src="<?php echo base_url('uploads/banner/' . $b->images); ?>" width="250" height="150"></td>
                      <td style="text-align: center;"><?php if ($b->status == 0) { ?>
                          <a href="<?php echo base_url('admin/banner_upload/update_status/1/' . $b->id); ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-eye"></i></a>
                        <?php } else { ?>
                          <a href="<?php echo base_url('admin/banner_upload/update_status/0/' . $b->id); ?>" class="btn btn-sm btn-outline-warning"><i class="fas fa-eye-slash"></i></a>
                        <?php } ?>
                      </td>
                      <td style="text-align: center;">
                        <?php if ($b->details == "") { ?>
                          <a href="javascript:void(0)" onclick="add_banner_details(<?= $key ?>)" class="btn btn-sm  btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"> Detail</i></a>
                        <?php } else { ?>
                          <a href="javascript:void(0)" onclick="edit_banner_details(<?= $key ?>)" class="btn btn-sm  btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"> Edit</i></a>
                        <?php } ?>
                        <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/banner_upload/delete_banner_img/' . $b->id); ?>')" class="btn btn-sm  btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  </tbody>
                  <!-- Modal starts For ADD details to banner images-->
                  <div class="modal fade" id="viewModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <!-- form start -->
                        <form  class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/banner_upload/add_banner_details/<?= $b->id ?>" enctype="multipart/form-data">

                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>View Banner Details</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id="banner_details<?= $key ?>">
                            <section class="content">
                              <div class="row">
                                <div class="col-md-12">
                                  <!-- /.card-header -->
                                  <div class="card-body pad">
                                    <div class="mb-3">
                                      <p class="">
                                        <b>Banner Details</b>
                                      </p>
                                      <textarea class="textarea" name="details" id="details<?= $key ?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                  </div>
                                  <span class="text-danger"><?php echo form_error('details'); ?></span>
                                </div>
                              </div>
                            </section>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Model1 Ends -->
                  <!-- Modal starts For ADD details to banner images-->
                  <div class="modal fade" id="editModal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <!-- form start -->
                        <form  class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/banner_upload/add_banner_details/<?= $b->id ?>" enctype="multipart/form-data">

                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><strong>View Banner Details</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id="edit_banner_details<?= $key ?>">
                            <section class="content">
                              <div class="row">
                                <div class="col-md-12">
                                  <!-- /.card-header -->
                                  <div class="card-body pad">
                                    <div class="mb-3">
                                      <p class="">
                                        <b>Banner Details</b>
                                      </p>
                                      <textarea class="textarea" name="details" id="edit_details<?= $key ?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$b->details?></textarea>
                                    </div>
                                  </div>
                                  <span class="text-danger"><?php echo form_error('details'); ?></span>
                                </div>
                              </div>
                            </section>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Model1 Ends -->
                <?php } ?>
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

<script>
  // Calling Banner Details Modal
  function add_banner_details(id) {
    $('#viewModal' + id).modal({
      'show': true
    });

  }
</script>
<script>
  // Customer Enquiry Details Modal
  function edit_banner_details(id) {
    // console.log(id);
    $('#editModal' + id).modal({
      'show': true
    });
  }
</script>
