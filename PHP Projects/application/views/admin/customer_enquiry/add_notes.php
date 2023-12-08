<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Note</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo  base_url() ?>admin/packages/index">Note</a></li>
            <li class="breadcrumb-item active">Add Note</li>
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
              <h3 class="card-title">Enquiry Note</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="tags" class="forms-sample-add_menu" method="post" action="<?php echo base_url(); ?>admin/customer_enquiry/insert_notes/<?=$id?>" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <section class="content">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- /.card-header -->
                          <div class="card-body pad">
                            <div class="mb-3">
                              <textarea class="textarea" name="notes" id="notes" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                          </div>
                          <span class="text-danger"><?php echo form_error('notes'); ?></span>
                        </div>
                      </div>
                    </section>
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