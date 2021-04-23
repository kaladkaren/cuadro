<!DOCTYPE html>
<html>
<head>
	<title>Cuadro</title>
    <!-- <script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script> -->
</head>
<body>
<form role="form" method="post" action="addOrder" id="order-details" enctype="multipart/form-data">
<input type="text" name="customer_name" placeholder="Enter your Name"><br>
<input type="email" name="customer_email" placeholder="Enter mailing address"><br>
<input type="text" name="customer_contactnum" placeholder="Enter Contact Number"><br>
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
<input type="file" name="order_images[]" multiple accept="image/*"><br>

</form>







<!-- <button id="facebookUpload">Upload your Photos for Facebook</button>
<script type="text/javascript" src="https://api.filestackapi.com/filestack.js"></script>
	
<script>
	filepicker.setKey("AfLddltxlRFyI7PzHfgR4z");
	
	document.getElementById('facebookUpload').onclick = function(){

		filepicker.pick(
		{
			mimetype: 'image/*',
			services: ['COMPUTER','FACEBOOK','INSTAGRAM'],
			maxFiles: 100
		},
		function(Blob){
			console.log(JSON.stringify(Blob));
		}
		);
	};	
</script> -->

</body>
</html>