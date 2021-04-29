<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Products Management
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <p>
              <button type="button" class="add-btn btn btn-success btn-sm">Add new Product</button>
            </p>
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Description</th>
                    <th>Product stocks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $value->product_name ?></td>
                        <td><center><img src="<?php echo $value->product_image_f ?>" style="height: 100px; width: 100px;"></center></td>
                        <td><?php echo $value->product_desc ?></td>
                        <td><?php echo $value->product_stock ?></td>
                        <td>
                          <button type="button"
                          data-payload='<?php echo json_encode(['product_id' => $value->product_id, 'product_name' => $value->product_name, 'product_image' => $value->product_image_f, 'product_desc' => $value->product_desc, 'product_stock' => $value->product_stock])?>'
                          class="edit-row btn btn-info btn-xs">Edit</button>
                          <button type="button" data-id='<?php echo $value->product_id; ?>'
                            class="btn btn-delete btn-danger btn-xs">Delete</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <td colspan="4" style="text-align:center">Empty table data</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="post" id="main-form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Product Name">
            </div>
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
              <img src="" alt="" id="preview" />
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
                <input type="file" name="product_image">
                <p class="help-block">Product Image Input here</p>
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <textarea class="form-control" name="product_desc" placeholder="Product Description"></textarea>
            </div>
            <div class="form-group">
              <label >Product Stocks</label>
              <input type="number" class="form-control" name="product_stock" placeholder="In stocks">
            </div>
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <input class="btn btn-info" type="submit" value="Save changes">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script src="<?php echo base_url('public/admin/js/custom/') ?>product_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
