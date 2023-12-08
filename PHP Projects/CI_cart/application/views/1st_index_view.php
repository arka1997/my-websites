<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?=link_tag('botstrap/css/bootstrap.css') ?>
</head>
<body>

<?php if($this->session->userdata('login')==''){ ?>
    <?php  echo anchor('My_Controller/sess_destroy','Log Out','class="class-link btn btn-warning"')?>

    <?php echo anchor('Login_controller/login','LOG IN','class="btn btn-info"'); ?>
    <?php }else{ ?>
        <?php echo anchor('Login_controller/login',$this->session->login->email,'class="btn btn-info"'); ?>
        <?php } ?>
    <?php echo anchor('My_controller/cart','CART','class="btn btn-danger"'); ?>
    <br>
    </br>
    <div class="" style="display:flex">
        <?php foreach($data as $key): ?>
            <div class="col-lg-3 col-sm-3 " style="margin-left:20px">
                <img src="http://localhost/CI_cart/upload/<?=$key->img_name?>" width='280' height='270'>
                <?php //echo form_open("My_controller/add_to_cart") ?>
                <p><?php //echo form_input(['type'=>'hidden','name'=>'id','value'=>$key->id]) ?></p>
                <p>Name:<?=$key->item_name?></p>
                <p>Price:<?=$key->item_price?></p>
                <p>Details:<?=$key->item_details?></p>
                <p>QTY:<?=$key->item_qty?></p>
                <p>DISCOUNT:<?=$key->discount?>%</p>
                <?php // echo form_button(['type'=>'submit','name'=>'btn','class'=>'btn btn-warning','content'=>'ADD TO CART'])?>
                <?php echo anchor("My_controller/add_to_cart/{$key->id}",'ADD TO CART','class="btn btn-warning"'); ?>
                <br>
                <br>
            </div>

        <?php endforeach; ?>
    </div>
</body>
</html>