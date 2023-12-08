<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Food Menu form</h4>
                  <p class="card-description" style="color:red">
                  <?php echo validation_errors(); ?>
                  </p>
                  <?php echo form_open_multipart('resturant/update_insert_menu_form/'.$resturant->id); ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Food Item</label>
                      <input type="text" class="form-control" name="food_item" id="exampleInputName1" placeholder="Food Item" value="<?=$resturant->food_item?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Food Price</label>
                      <input type="text" class="form-control" name="food_price" id="exampleInputEmail3" placeholder="Food Price" value="<?=$resturant->food_price?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Food type</label>
                      <input type="text" class="form-control" name="food_type" id="exampleInputPassword4" placeholder="Food type" value="<?=$resturant->food_type?>">
                    </div>
                    <div class="form-group col-sm-5 col-lg-6">
                        <label >File upload</label>
                       <input type="file" name="image" class="form-control btn btn-info">
                       <img src="<?php echo base_url('upload/'.$resturant->food_image)?>" width="10%" height="5%">
                    </div>
                    <div class="form-group col-sm-5 col-lg-6">
                        <label>File uploads</label>
                        <?php echo form_input(['class'=>'form-control btn btn-info','type'=>'file','id'=>'file','name'=>'images[]','placeholder'=>'Upload Images','multiple'=>'']); ?>
                        <?php foreach($images as $d): ?>
                          <div class="form-group col-sm-5 col-lg-6">
                          <?php echo anchor('Resturant/delete_multi_img/'.$d->food_images,'Delete','class="btn btn-danger"'); ?>
                        <img src="<?php echo base_url('upload/test/'.$d->food_images); ?>" width="30%" height="25%">
                      </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Food Desc</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </div>
              </div>
            </div>

               
<!-- // Array
// (
//     [resturant] => stdClass Object
//         (
//             [id] => 17
//             [food_item] => tandoori
//             [food_price] => 5465
//             [food_image] => BeautyPlus_20170622104549_save.jpg
//             [food_type] => chinese
//             [description] => gfhh
//         )

//     [images] => Array
//         (
//             [0] => stdClass Object
//                 (
//                     [id] => 38
//                     [food_item_id] => 17
//                     [food_images] => IMG_20180903_155734.jpg
//                 )

//             [1] => stdClass Object
//                 (
//                     [id] => 39
//                     [food_item_id] => 17
//                     [food_images] => IMG_20180903_155750 - Copy.jpg
//                 )

//         )

// ) -->