<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Comments Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CustomerComments_table</li>
            </ol>
          </div>
        </div>
        <div class="text-right">
        	<a href="<?php echo base_url('admin/customer_comments/add_customer_comments') ?>" class="btn btn-success">Add Customer Comments</a>
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
                <h3 class="card-title">Customer Comments table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Testimonial_details</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Company Name</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <?php 
                  foreach($comments as $key=>$c){ ?>
                  <tbody>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$c->testimonial_details?></td>
                    <td><?=$c->customer_name?></td>
                    <td><?=$c->position?></td>
                    <td><?=$c->company?></td>
                    <td style="text-align: center;">
                      <a href="<?php echo base_url('admin/customer_comments/edit_customer_comments/'.$c->id); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                      <a href="javascript:void(0)" onclick="return delete_modal('<?php echo base_url('admin/customer_comments/delete_customer_comments/'.$c->id); ?>')" class="btn btn-sm  btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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