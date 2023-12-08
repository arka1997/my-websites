<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Food Menu form</h4>
                  <p class="card-description" style="color:red">

                  <?php echo validation_errors(); ?>

                  </p>

                  <?php echo form_open_multipart('Resturant/insert_menu_form'); ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Food Item</label>
                      <input type="text" class="form-control" name="food_item" id="exampleInputName1" placeholder="Food Item">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">Food Price</label>
                      <input type="text" class="form-control" name="food_price" id="exampleInputEmail3" placeholder="Food Price">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword4">Food type</label>
                      <input type="text" class="form-control" name="food_type" id="exampleInputPassword4" placeholder="Food type">
                    </div>

                    <div class="form-group col-sm-5 col-lg-6">
                        <label >File upload</label>
                        <?php echo form_input(['class'=>'form-control btn btn-warning','type'=>'file','id'=>'file','name'=>'image','placeholder'=>'Upload Image']); ?>
                    </div>

                    <div class="form-group col-sm-5 col-lg-6">
                        <label>File uploads</label>
                        <?php echo form_input(['class'=>'form-control btn btn-info','type'=>'file','id'=>'file','name'=>'images[]','placeholder'=>'Upload Images','multiple'=>'']); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Food Desc</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Submit</button>

                </div>
              </div>
            </div>