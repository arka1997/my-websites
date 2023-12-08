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

<?php// echo form_open_multipart('users/add_article');  ?>

<?php echo form_hidden('user_id',$this->session->userdata('id')); ?>
    <?php echo form_open_multipart('users/add_article') ?>
    <div class="form-group col-sm-5 col-xl-3">
        <label for="title" >USER ID </label>
        <?php if($user_id=$this->session->flashdata('ids')): ?> <!-- here the flash data session is stored in user_id, and the value is shown in user_id table-->
        <?php echo form_input(['class'=>'form-control','id'=>'user_id','name'=>'user_id','value'=>$user_id]); ?>
        <?php endif;?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <label for="title" >ADD TITLE </label>
        <?php echo form_input(['class'=>'form-control','id'=>'title','name'=>'title','placeholder'=>'add title']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('ADD BODY'); ?>
        <?php echo form_textarea(['class'=>'form-control','id'=>'texts','name'=>'texts','placeholder'=>'ADD BODY']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_label('FILE'); ?>
        <?php echo form_upload(['class'=>'','id'=>'texts','name'=>'file']); ?>
    </div>
    <div class="form-group col-sm-5 col-xl-3">
        <?php echo form_button(['class'=>'form-control btn btn-success','type'=>'submit','content'=>'ADD']); ?>
    </div>
    <?php echo anchor('users/sess_destroy','Log Out','class="class-link btn btn-warning"')?>
    <div class="gg">
    <p class="btn-info">&copy Debanjan Sarkar</p>
    </div>
    </div>
    <div class="container" style="margin-top:50px;">
            <h1>SHOW ARTICLE TABLE</h1><br>
        <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User_id</th>
                    <th>Article_Title</th>
                    <th>Article_Text</th>
                    <th>FILE</th>
                    <th>ACTION</th>
                    <th>DESTROY</th>
                </tr>
            </thead>
        <tbody>
        <?php foreach($data as $vals): ?>
            <tr>
                <td><?= $vals->id; ?></td>
                <td><?= $vals->user_id; ?></td>
                <td><?= $vals->article_title;?></td>
                <td><?= $vals->article_text;?></td>
                <td><?= $vals->file;?></td>
                <td><a href="<?=base_url('users/edit/'.$vals->id) ?>"><button class="btn btn-primary" type="button">EDIT</button></a></td>
                <td>
                    <a href="<?=base_url('users/delete/'.$vals->id) ?>"><button type="button" class="btn btn-danger">DELETE</button></a>
                </td>
                <?php
                // form_open('users/delete'),
                // form_hidden('id',$vals->id),
                // //form_button(['class'=>'form-control btn btn-danger','type'=>'submit','content'=>'DELETE']),
                // form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                // form_close();
                ?>
                
            </tr>
        <?php endforeach; ?>
        
        </tbody>
        </table>
        </div>
    </div>
    
</body>
</html>