<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Destination Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DestinationTables</li>
            </ol>
          </div>
        </div>
        <div class="text-right">
        	<a href="<?php echo base_url('admin/destinations/add_destination') ?>" class="btn btn-success">Add Destination</a>
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
                <h3 class="card-title">Destination table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Dest ID</th>
                    <th>Dest Name</th>
                    <th>Popular Name</th>
                    <!-- <th>Images</th>
                     <th>Ratings</th>-->
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <?php 
                  foreach($val as $key=>$d){ ?>
                  <tbody>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$d->destination_id?>
                    </td>
                    <td><?=$d->destination_name?></td>
                    <td><?=$d->popular_name?></td>
                    <td style="text-align: center;">
                      <a href="<?php echo base_url('admin/destinations/edit_destination/'.$d->id); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                      <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/destinations/delete_destination/'.$d->id); ?>')" class="btn btn-sm  btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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