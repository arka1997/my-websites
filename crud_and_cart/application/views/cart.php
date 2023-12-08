<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/style.css" />
    <title>Cart</title>
</head>
<body>    
    <div class="container p-5">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <?php if($this->session->userdata('login') ==''){ ?>
                        <div class="col-md-6"><button class="btn btn-info" type="button" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i></button></div>
                    <?php }else{ ?>
                        <div class="col-md-6"><button class="btn btn-info" type="button"><i class="fa fa-user"></i>&nbsp;&nbsp;Welcome <?=$this->session->login->email?></button></div>
                    <?php } ?>  
                    <div class="col-md-6 text-right">
                        <a href="<?=base_url()?>Cart/cart"><button class="btn btn-info" type="button"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;( <?php echo $total_product?> )</button></a>
                        <button class="btn btn-info" type="button"><i class="fa fa-money"></i>&nbsp;&nbsp;( Rs. <?php echo number_format($total_amount, 2);?> )</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Cart</div>
            <div class="card-body">
                <div class="row">
                    <?php foreach($details as $items){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid2">
                                <div class="product-image2"> <a href="#"><img class="pic-1" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561643954/img-1.jpg"> <img class="pic-2" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1561643955/img1.2.jpg"> </a>
                                    <ul class="social">
                                        <li><a href="<?=base_url()?>Cart/remove/<?=$items['row_id']?>" data-tip="Remove"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><?php echo $items['name'] ?></h3> <span class="price">Rs <?php echo $items['price'];?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php  echo anchor('Cart/sess_destroy','Log Out','class="class-link btn btn-warning"')?>
        </div>
    </div>
</body>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?=base_url()?>Login/login_submit" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="john@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="******">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</html>