<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Packages</a></li>
              <li class="breadcrumb-item active">ADD Package</li>
            </ol>
          </div>
        </div>
        <div class="text-right">
        	<a href="<?php echo base_url('admin/packages/add_package') ?>" class="btn btn-success">Add Package</a>
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
                <h3 class="card-title">Package DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Package ID</th>
                    <th>Package Name</th>
                    <th>Popular Name</th>
                    <th>Main Images</th>
                    <th>Ratings</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($package_dtl as $key=>$p){ ?>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$p->package_id?></td>
                    <td><?=$p->package_name?></td>
                    <td><?=$p->popular_name?></td>
                    <td><img src="<?php echo base_url();?>uploads/package/<?=$p->file?>" width="100px" height="100px" style="border-radius:50%"></td>
                    <td><?=$p->ratings?></td>
                    <td>
                      <a href="<?php echo base_url('admin/packages/edit_packages/'); ?><?=$p->id?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                      <?php if($p->status == 1){ ?>
                        <a href="<?php echo base_url('admin/packages/update_status/1/'); ?><?=$p->id?>" class="btn btn-sm  btn-outline-danger"><i class="fa fa-ban"></i></a>
                      <?php } else { ?> 
                        <a href="<?php echo base_url('admin/packages/update_status/0/'); ?><?=$p->id?>" class="btn btn-sm btn-outline-success"><i class="fa fa-check-square" ></i></a>
                      <?php } ?>
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