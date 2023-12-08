<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?=base_url('botstrap/css/bootstrap.css')?>"> -->
    <?=link_tag('botstrap/css/bootstrap.css')  ?> <!-- this is another way of linking css tags in CI-->
    <title>Log In Form</title>
</head>
<body>
<br>
<div class="jumbotron">Log In Form</div>
<?php if($error=$this->session->flashdata('Login_Failed')): //fetching the session key value and storing it in error, and displaying error message ?>
<div class="row">
<div class="col-lg-3 col-sm-5">
<div class="alert alert-danger">
<?php echo $error; ?>
</div>
</div>
</div>
<?php endif; ?>
    <?php echo form_open('users/username_check') ?>
    <div class="form-group col-sm-5 col-xl-3">
        <label for="email" >Email: </label>
        <!-- <input type="email" class="form-control" id="email" name="email"> -->
        <?php echo form_input(['class'=>'form-control','id'=>'email','name'=>'email','placeholder'=>'Email']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <!-- <label for="password" >Password: </label> -->
        <?php echo form_label('Password'); ?>
        <!-- <input type="password" class="form-control" id="pswrd" name="pswrd"> -->
        <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'password','name'=>'pswrd','placeholder'=>'Only numbers please']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <!-- <button type="submit" class="form-control btn btn-danger">SUBMIT</button> -->
        <?php echo form_button(['class'=>'form-control btn btn-danger','type'=>'submit','content'=>'SUBMIT']); ?>
    </div>
    <div class="gg">
    <?php echo anchor('users/reg_i','Sign Up?','class="link-class"'); ?>
    </div>
    <p class="btn-info">&copy Debanjan Sarkar</p>
</body>
</html>