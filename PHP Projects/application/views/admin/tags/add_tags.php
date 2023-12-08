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
                    <form id="tags" class="forms-sample-add_menu" method="post"  action="<?php echo base_url();?>admin/tags/insert_tags">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputtags">Tags Name</label>
                                <input type="text" class="form-control" id="exampleInputtags" name="tags[]" placeholder="Enter Tags">
                                <span class="text-danger"><?php echo form_error('tags'); ?></span>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputtags">Status</label>
                                <select class="form-control" name="status[]">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                              </div>
                            </div>
                             <div class="col-md-2">
                              <div class="form-group">
                                    <a href="javascript:void(0);" onclick="addTags()" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add </a>
                                  <input type="hidden" id="SlRow" value="1"> 
                              </div>
                            </div> 
                          </div>
                           
                          </div>
                          
                        </div>
                          <span id="AppendData"></span> 
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

    