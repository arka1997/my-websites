<html lang="en">
<head>
<?=link_tag('botstrap/css/bootstrap.css') ?>
</head>
<body>
<?php if(count($data)): ?>
<!-- now fetching the received data (i.e., table data) from users.php -->
<?php foreach($data as $val): ?>
    <div class="jumbotron">
        <h1 style="text-align:center">WELCOME <?=$val->name;?></h1>
    </div>
    <div class="container" style="margin-top:40px">
    <div class="row btn btn-dark">
        <?php echo form_open('users/gg'); ?>
        <?php echo form_button(['type'=>'submit','content'=>'ADD ARTICLE','class'=>'btn btn-light']);?>
    </div>
    </div>
<div class="container" style="margin-top:50px;">
<div class="table">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>EMAIL</th>
            <th>SUBJECT</th>
            <th>ACTION</th>
            <th>DESTROY</th>
        </tr>
    </thead>
<tbody>
    <tr>
        <td><?= $val->id; ?></td>
        <td><?= $val->name; ?></td>
        <td><?= $val->email;?></td>
        <td><?= $val->subject;?></td>
        <td><a href="#" class="btn btn-primary">EDIT</a></td>
        <td><a href="#" class="btn btn-info">DELETE</a></td>
    </tr>
</tbody>

</table>
<tr><?php endforeach; ?>
    <?php endif; ?>
    <div class="row btn btn-dark">
        <?php echo anchor('users/chng_pswrd_view','Change Password',"class='btn btn-info'"); ?>
    </div>
    <br>
    <br>
    <?php  echo anchor('users/sess_destroy','Log Out','class="class-link btn btn-warning"')?>
</tr>
</div>
</div>
</body>
</html>