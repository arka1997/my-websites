<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo  base_url()?>admin/tags/index">Tags</a></li>
              <li class="breadcrumb-item active">Add Tags</li>
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
                    <h3 class="card-title">Tags Form</h3>
                  </div>
                  <!-- form start -->
                  <form id="tags" class="forms-sample-add_menu" method="post"  action="<?php echo base_url();?>admin/tags/upload">
                    <div class="card-body">
                      <div class="form-group">
                          <label for="exampleInputFile">Images</label>
                        <div class="input-group">
                          <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file[]">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                          </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
                      
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  