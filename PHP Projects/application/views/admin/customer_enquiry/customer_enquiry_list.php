<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enquiry Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Enquiry Table</li>
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
                <h3 class="card-title">Enquiry Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Query Id</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Email Id</th>
                    <th>Contact</th>
                    <th>Location</th>
                    <th>Tour Date</th>
                    <th>Destination</th>
                    <th>Est Budget</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <?php if($enquiry_dtl != ""){ ?>
                  <?php foreach($enquiry_dtl as $key=>$e){ ?>
                  <tbody>
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$e->query_id?></td>
                    <td><?=$e->date?></td>
                    <td><?=$e->customer_name?></td>
                    <td><?=$e->email_id?></td>
                    <td><?=$e->contact?></td>
                    <td><?=$e->location?></td>
                    <td><?=$e->tour_date?></td>
                    <td><?=$e->destinations?></td>
                    <td><?=$e->est_budget?></td>
                    <td><?php if($e->status == 1) { ?>
                        <a href="javascript:void(0)" onclick="view_notes('<?php echo $e->id;?>')" class="btn btn-sm btn-outline-success" data-target="#noteModal">View Note</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('admin/customer_enquiry/add_notes/'.$e->id); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-plus">Add Note</i></a>
                            <?php } ?>
                     <a href="javascript:void(0)" onclick="get_enquiry_details('<?php echo $e->id;?>')" class="btn btn-sm  btn-outline-info" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     </td>
                  </tr>ннн
                  </tbody>
                <?php } } ?>
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
  <!-- Modal starts -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>View Enquiry Details</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="enquiry_data">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal starts -->
<div class="modal fade" id="viewModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notes">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
