<!DOCTYPE html>
<html>
<head>
	<title>Cuadro</title>
	<!-- This script tag includes the Filestack API into your HTML file -->
    <script type="text/javascript" src="https://static.filestackapi.com/v3/filestack.js"></script>
</head>
<body>

	<!-- Button calls function 'pickMark()' onclick now -->
    <input type="BUTTON" value="Pick Watermark" id="pickWatermark" onclick="pickMark()">

    <script>
	    var client = filestack.init("AfLddltxlRFyI7PzHfgR4z")
	   //variable to hold the watermark handle 
	   var watermarkHandle = '';

	   //Function pickMark() will not receive the result object back 
	   function pickMark() {
	      console.log("Picking Watermark");
	      client.pick({
	         accept:'image/*',
	         maxFiles: 1,
	      }).then(function(result) {//Taking the results object in as 'result'
	         //Putting the result in a string, and printing it to the console
	         console.log(JSON.stringify(result));
	         //Sets the watermark handle to the handle of the first file in the result
	         watermarkHandle = result.filesUploaded[0].handle;
	         //Logs the new watermark handle in the console
	         console.log(watermarkHandle);
	      });
	    }

	    function storeWaterMarkedPhoto() {
		 client.storeURL(transformURL).then(function(result) {});
		}
	</script>

    <!-- <script>
        var client = filestack.init("AfLddltxlRFyI7PzHfgR4z");
        //The function pickMark()
        //Function pickMark() will receive the result object back 
		function pickMark() {
		 console.log("Picking Watermark");
		 client.pick({
		 accept:'image/*',
		 maxFiles: 1,
		 }).then(function(result) {
		 console.log(JSON.stringify(result));
		 });
		}
    </script> -->

<!-- <button id="facebookUpload">Upload your Photos for Facebook</button>
<script type="text/javascript" src="https://api.filestackapi.com/filestack.js"></script>

<script>
	filepicker.setKey("AfLddltxlRFyI7PzHfgR4z");
	
	document.getElementById('facebookUpload').onclick = function(){

		filepicker.pick(
		{
			mimetype: 'image/*',
			services: ['COMPUTER','FACEBOOK','INSTAGRAM']
		},
		function(Blob){
			console.log(JSON.stringify(Blob));
		}
		);
	};	
</script> -->

</body>
</html>