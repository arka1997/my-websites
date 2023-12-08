<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customized Package Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CustomPackage_table</li>
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
                <h3 class="card-title">Customized Package table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Full Name</th>
                    <th>Emaile</th>
                    <th>Mobile No.</th>
                    <th>Travellers</th>
                    <th>Location</th>
                    <th>Source Railway station</th>
                    <!-- <th>Images</th>
                     <th>Ratings</th>-->
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <?php 
                  foreach($customize_package as $key=>$c){ ?>
                  <tbody>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$c->name?></td>
                    <td><?=$c->email?></td>
                    <td><?=$c->phone?></td>
                    <td><?=$c->travellers?></td>
                    <td><?=$c->location?></td>
                    <td><?=$c->source_rail_station?></td>
                    <td style="text-align: center;">
                      <!-- <a href="<?php echo base_url('admin/destinations/edit_destination/'.$d->id); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a> -->
                      <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/customize_package_info/delete_customize_package/'.$c->id); ?>')" class="btn btn-sm  btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                  </tr>
                  </tbody>
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