
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Customer Comments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo  base_url()?>admin/customer_comments/">Customer Comments</a></li>
                            <li class="breadcrumb-item active">Add Customer Comments</li>
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
                                    <h3 class="card-title">Customer Comments Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="forms-sample-add_menu" method="post"  action="<?php echo base_url();?>admin/customer_comments/insert_customer_comments" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="testimonial_details">Testimonial Details</label>
                                            <input type="text" class="form-control" id="testimonial_details" name="testimonial_details"  placeholder="Enter Testimonial Details">
                                            <span class="text-danger"><?php echo form_error('testimonial_details'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name">
                                            <span class="text-danger"><?php echo form_error('customer_name'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position(currently doing what)</label>
                                            <input type="text" class="form-control" id="position" name="position" placeholder="Enter role in your organization">
                                            <span class="text-danger"><?php echo form_error('position'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" id="company" name="company" placeholder="Enter company" >
                                            <span class="text-danger"><?php echo form_error('company'); ?></span>
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

    <!-- <script>
    function bb(val){
    }
    $('.toastsDefaultWarning').click(function() {
    $(document).Toasts('create', {
    class: 'bg-warning',
    title: 'Toast Title',
    subtitle: 'Subtitle',
    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
    });
    </script>
    -->