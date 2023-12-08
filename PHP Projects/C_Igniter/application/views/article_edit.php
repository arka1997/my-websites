<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?=base_url('botstrap/css/bootstrap.css')?>"> -->
    <?=link_tag('botstrap/css/bootstrap.css')  ?> <!-- this is another way of linking css tags in CI-->
    <title>ADD ARTICLES</title>
</head>
<body>
<br>
<div class="container">
<div class="jumbotron">ADD ARTICLES</div>
<?php if($error=$this->session->flashdata('')): //fetching the session key value and storing it in error, and displaying error message ?>
<div class="row">
<div class="col-lg-3 col-sm-5">
<div class="alert alert-danger">
<?php echo $error; ?>
</div>
</div>
</div>
<?php endif; ?>
<?php echo form_hidden('user_id',$this->session->userdata('id'));//here we fetching the session value and stored in user_id ?>
    <?php  foreach($data as $val): ?>
    <?php echo form_open("users/edit_article/{$val->id}"); ?>
    <?php //echo form_hidden('id',$val->id) //for sending the edit id?>
    <div class="form-group col-sm-5 col-xl-3">
        <label for="title" >USER ID </label>
        <?php if($user_id=$this->session->flashdata('ids')): ?> <!-- here the flash data session is stored in user_id, and the value is shown in user_id table-->
        <?php echo form_input(['class'=>'form-control','id'=>'user_id','name'=>'user_id','value'=>$user_id]); ?>
        <?php endif;?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <label for="title" >ADD TITLE </label>
        <?php echo form_input(['class'=>'form-control','id'=>'title','name'=>'title','placeholder'=>'add title','value'=>$val->article_title]); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('ADD BODY'); ?>
        <?php echo form_textarea(['class'=>'form-control','id'=>'texts','name'=>'texts','placeholder'=>'ADD BODY','value'=>$val->article_text]); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_button(['class'=>'form-control btn btn-success','type'=>'submit','content'=>'UPDATE']); ?>
    </div>
    <?php endforeach; ?>
    <div class="gg">
    <p class="btn-info">&copy Debanjan Sarkar</p>
    </div>
    </div>
</body>
</html>