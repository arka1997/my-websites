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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tags</li>
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
                <h3 class="card-title">Tags  <a href="<?php echo base_url('admin/tags/add_tags'); ?>" class="btn btn-sm btn-outline-success">Add</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Tags Name</th>
                    <th>Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach($val as $d){ ?>
                        <tr>
                          <td><?php echo $i?></td>
                          <td><?php echo $d->tag_name?></td>
                          <td>
                            <?php 
                            if($d->status ==1){
                              echo "Active";
                            }
                            else {
                              echo "Deactive";
                            }
                          ?>
                          </td>
                        
                          <td style="text-align: center;">
                            <a href="<?php echo base_url('admin/tags/edit_tags/'.$d->id); ?>"  class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/tags/delete_tags/'.$d->id); ?>')" class="btn btn-sm  btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                        </tr>
                    <?php $i++;} ?>
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