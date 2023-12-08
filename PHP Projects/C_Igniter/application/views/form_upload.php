<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=link_tag('botstrap/css/bootstrap.css')  ?> 
    <title>Document</title>
</head>
<body>
    <h1>FORM VALIDATION & UPLOAD</h1>

    <div class="row">
    <div class="col-lg-6 text text-danger">
    <?php echo validation_errors(); ?>
    </div>
    </div>
    
    <?php echo form_open_multipart('users/form_upload');  ?>
    <?php //echo form_input(['class'=>'form_control','name'=>'upload']) ?>
    <div class="form-group col-sm-5 col-lg-6">
        <label for="email" >Name: </label>
        <!-- <input type="email" class="form-control" id="email" name="email"> -->
        <?php echo form_input(['class'=>'form-control','id'=>'name','name'=>'name','placeholder'=>'name','value'=>set_value('name')]); ?>
    </div>
    <div class="form-group col-sm-5 col-lg-6">
        <label for="email" >Email: </label>
        <!-- <input type="email" class="form-control" id="email" name="email"> -->
        <?php echo form_input(['class'=>'form-control','id'=>'email','name'=>'email','placeholder'=>'Email']); ?>
    </div>
    <div class="form-group col-sm-5 col-lg-6">
        <!-- <label for="password" >Password: </label> -->
        <?php echo form_label('Password'); ?>
        <!-- <input type="password" class="form-control" id="pswrd" name="pswrd"> -->
        <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'password','name'=>'pswrd','placeholder'=>'************']); ?>
    </div>
    <div class="form-group col-sm-5 col-lg-6">
        <!-- <label for="password" >Password: </label> -->
        <?php echo form_label('PASSWORD'); ?>
        <!-- <input type="password" class="form-control" id="pswrd" name="pswrd"> -->
        <?php echo form_input(['class'=>'form-control','type'=>'password','id'=>'password','name'=>'pswrd2','placeholder'=>'************']); ?>
    </div>
    <div class="form-group col-sm-5 col-lg-6">
        <label for="email" >File: </label>
        <!-- <input type="email" class="form-control" id="email" name="email"> -->
        <?php echo form_input(['class'=>'form-control','type'=>'file','id'=>'file','name'=>'file[]','placeholder'=>'file','multiple'=>'']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <!-- <button type="submit" class="form-control btn btn-danger">SUBMIT</button> -->
        <?php echo form_button(['class'=>'form-control btn btn-danger','type'=>'submit','content'=>'SUBMIT']); ?>
    </div>
</body>
</html>