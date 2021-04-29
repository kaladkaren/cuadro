<!DOCTYPE html>
<html>
<head>
	<title>Cuadro</title>
    <!-- <script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.css">
</head>
<style type="text/css">
	
</style>
<body>
<form role="form" method="post" action="add" id="order-details" enctype="multipart/form-data">
<input type="text" name="customer_name" placeholder="Enter your Name"><br>
<input type="email" name="customer_email" placeholder="Enter Mailing Address"><br>
<input type="text" name="customer_number" placeholder="Enter Contact Number"><br>
<select name="order_type">

	<?php if (count($res) > 0 ): ?>

        <?php $i = 1; foreach ($res as $key => $value): ?>
            <option><?php echo $value->frame_type;?></option>
        <?php endforeach; ?>


    <?php else: ?>
        <p>empty</p>
    <?php endif; ?>
	
</select><br>
<textarea name="customer_address" placeholder="Address"></textarea><br>
<input type="file" name="order_images[]" multiple accept="image/*" id="imageCropFileInput"><br>
<input type="submit" value="Place Order">

</form>
<input type="hidden" id="profile_img_data">
<div class="img-preview"></div>
<div id="galleryImages"></div>
<div id="cropper">
  <canvas id="cropperImg" width="0" height="0"></canvas>
  <button class="cropImageBtn" id="cropImageBtn">Crop</button>
</div>


<?php if ($flash_msg = $this->session->flash_msg): ?>
    <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.js"></script>
<script src="<?php echo base_url('public/admin/js/custom/') ?>cropper.js"></script>
</body>
</html>