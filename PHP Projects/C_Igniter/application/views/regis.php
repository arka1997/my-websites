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

<div class="jumbotron">REGISTRATION FORM</div>

    <div class="row">
    <div class="col-lg-6 text text-danger">
        <?php echo validation_errors(); ?>
    </div>
    </div>

    <?php echo form_open('users/reg_submit') ?>

    <div class="form-group col-sm-5 col-xl-3">
        <label for="name" >Name: </label>
        <?php echo form_input(['class'=>'form-control','id'=>'name','name'=>'name','placeholder'=>'UserName']); ?>
    </div>

    <div class="form-group col-sm-5 col-xl-3">
        <label for="email" >Email: </label>
        <?php echo form_input(['class'=>'form-control','id'=>'email','name'=>'email','placeholder'=>'Email']); ?>
    </div>

    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('Password'); ?>
        <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'password','name'=>'pswrd','placeholder'=>'Only numbers please']); ?>
    </div>

    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('Confirm_Password'); ?>
        <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'password','name'=>'pswrd2','placeholder'=>'Only numbers please']); ?>
    </div>

    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('Subject'); ?>
        <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'subject','name'=>'subject','placeholder'=>'Subject']); ?>
    </div>

    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('USERTYPE'); ?>
        <?php echo form_input(['class'=>'form-control','type'=>'text','id'=>'usertype','name'=>'usertype','placeholder'=>'Usertype']); ?>
    </div>

    <!-- <div class="form-group col-sm-5 col-xl-3">
        <?php// echo form_input(['class'=>'form-control','type'=>'text','id'=>'usertype','name'=>'usertype','readonly'=>'true','value' => '0']) ?>
    </div> -->

    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_button(['class'=>'form-control btn btn-danger','type'=>'submit','content'=>'SUBMIT']); ?>
    </div>

    <div class="gg">
    <?php echo anchor('users/login_view','Log In','class=" btn btn-success col-sm-2"'); ?>
    </div><br>

    <p class="btn-info">&copy Debanjan Sarkar</p>

</body>
</html>