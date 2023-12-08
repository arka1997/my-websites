<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller" style="display:flex;justify-content:center;justify-content:space-around;">
	<?php foreach($card_data as $data): ?>
<div class="card border-warning mb-3" style="max-width: 18rem;border:1px solid;border-radius: 50px">
	<img src="<?php echo base_url('upload/'.$data->food_image)?>" style="margin:0;padding:0;border-radius: 50px;height=200px">
  <div class="card-body text-success">
    <h5 class="card-title text-info"><?=$data->food_item?></h5>
    <p class="card-text"><?=$data->food_type?></p>
    <p class="card-text">$<?=$data->food_price?></p>
    <p class="card-text"><?=$data->description?></p>
  </div>
</div>
<?php endforeach; ?>
</div>
</body>
</html>