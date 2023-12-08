<!-- <div class="main-panel">
        <div class="content-wrapper"> -->
          <div class="card">
            <div class="card-body">
            <?php $email= $this->session->userdata('email');?>
              <h4 class="card-title"><?php echo $email;?></h4>
              <?php echo form_open('Employee/index'); ?>
              <!-- <select name="department" class="dropdown_box1 form-group form-control col-sm-5 col-xl-7">
                   <?php //foreach($department as $d) { ?>
                  <?php// echo "<pre>";print_r($param);exit; ?>
                    <option value="<?php// echo $d->id ?>" ><?php // echo $d->department_name ?></option>
                   <?php //} ?>
                   </select> -->
                <div class="row">
                <div class=" col-lg-12">
                <table id="order-listing" class="table dataTable no-footer">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Food Items</th>
                          <th>Food price</th>
                          <th>Food Image</th>
                          <!-- <th>Multiple Food Images</th> -->
                          <th>Food Type</th>
                          <th>Description</th>
                          <th>ACTION</th>
                          <th>DELETE</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                   <?php 
                    if($resturants){
                    foreach($resturants as $r):
                    ?>
                      <tr>
                          <td><?php echo $r->id ?></td>
                          <td><?php echo $r->food_item ?></td>
                          <td><?php echo $r->food_price ?></td>
                          <td><img src="<?php echo base_url('upload/'.$r->food_image)?>"></td>
                          <!-- <td><?php //foreach($multi_img as $s):  ?>
                          <?php //if($r->id==$s->food_item_id): ?>
                          <?php //echo $s->food_images."<br>" ?>
                          <?php //endif; ?> 
                          <?php //endforeach;  ?></td> -->
                          <td><?php echo $r->food_type ?></td>
                          <td><?php echo $r->description ?></td>
                          <td>
                            <?php echo anchor('Resturant/resturant_edit/'.$r->id,'EDIT','class="badge btn-outline-primary badge-info"'); ?>
                          </td>
                          <td>
                          <?php echo anchor('Resturant/resturant_delete/'.$r->id,'DELETE','class="badge btn-outline-success badge-danger"'); ?>
                          </td>
                      </tr>
                      <?php endforeach; } ?>
                      
                    </tbody>
                  </table>
                  <?php echo anchor('Resturant/add_menu_form','ADD','class="btn btn-success"'); ?>
                </div>
                
              </div>
            </div>
          </div>
                   <!-- 
                  </div> 
                   </div>
                   </div>
                   </div>
                   </div> -->