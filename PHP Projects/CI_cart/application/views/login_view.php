<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?=link_tag('botstrap/css/bootstrap.css') ?>
</head>
<body>
<?php echo form_open('Login_controller/login_submit');    ?>
    <div class="col-lg-6">
        <?php echo form_label('Email') ?>
    <?php echo form_input(['type'=>'email','id'=>'email','name'=>'email','class'=>'form-control']);    ?>
    </div>
    <div class="col-lg-6">
    <?php echo form_label('PASSWORD') ?>
    <?php echo form_input(['type'=>'password','id'=>'pswrd','name'=>'pswrd','class'=>'form-control']);    ?>
    </div>
    <br>
    <div class="col-sm-3">
    <?php echo form_button(['type'=>'submit','content'=>'LOG IN','id'=>'btn','name'=>'btn','class'=>'btn btn-success']);    
    ?>
    </div>
</body>
</html>