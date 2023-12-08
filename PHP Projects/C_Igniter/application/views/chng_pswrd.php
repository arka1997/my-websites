<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=link_tag('botstrap/css/bootstrap.css')  ?> <!-- this is another way of linking css tags in CI-->
    <title>change pswrd</title>
</head>
<body>
    <h1>CHANGE PASSWORD</h1>
    <?php $id=$this->session->userdata('id'); ?>
    
    <?php echo form_open('users/chng_pswrd/'.$id) ?>
    <div class="form-group col-sm-5 col-xl-3">
    <?php echo form_label('New Password'); ?>
    <?php echo form_input(['class'=>'form-control','id'=>'password','name'=>'new_pswrd','placeholder'=>'New Password']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
    <?php echo form_label('Old Password'); ?>
    <?php echo form_input(['class'=>'form-control','id'=>'password','name'=>'old_pswrd','placeholder'=>'Old Password']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_button(['class'=>'form-control btn btn-danger','type'=>'submit','content'=>'UPDATE']); ?>
    </div>
    </body>
</html>