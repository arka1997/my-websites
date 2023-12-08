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
<div class="jumbotron">
        <h1 style="text-align:center">CART ITEMS</h1>
    </div>

    <div class="container" style="margin-top:50px;">
<div class="table">
<?php  echo form_button('','Cart >('.$prod['count'].')','class="class-link btn btn-dark"')?>

<table>
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>  Product_ID  </th>
            <th>   Item_Name  </th>
            <th>   Item_Price </th>
            <th>   Image_name </th>
            <th>  Item_Details</th>
            <th>   Item_Qty   </th>
            <th>   Subtotal   </th>
            <th>   Discount   </th>
            <th>Discount_Price</th>
            <th>    UPDATE    </th>
            <th>    DESTROY   </th>
        </tr>
    </thead>
<tbody>
    <?php // echo "<pre>";print_r($arr);
    foreach($arr as $key): 
    
    ?>
    <tr>
        <td><?=$key['product_id']?>        </td>
        <td><?=$key['name']?>              </td>
        <td><?=$key['price']?>             </td>
        <td><?=$key['img_model_name']?>    </td>
        <td><?=$key['details']?>           </td>
        <td><?=$key['qty']?>               </td>
        <td><?=$key['subtotal']?>          </td>
        <td><?=$key['discount']?>%          </td>
        <td><?=$key['discount_price']?>          </td>
        <td><a href="#" class="btn btn-primary">UPDATE</a></td>
        <td><a href="#" class="btn btn-info">DELETE</a></td>
    </tr>
    <?php endforeach; ?>
    <?php  echo anchor('My_Controller/sess_destroy','Log Out','class="class-link btn btn-warning"')?>
 <br>
</tbody>
</table>
<?php echo anchor('My_Controller/','BACK','class="class-link btn btn-success"'); ?>
</div>
</div>

</body>
</html>