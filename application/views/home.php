<!DOCTYPE html>
<html>
<head>
	<title>Cuadro</title>
</head>
<body>

<!-- <input type="filepicker" data-fp-apikey="AfLddltxlRFyI7PzHfgR4z" /> -->

<button id="facebookUpload">Upload your Photos for Facebook</button>
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
</script>

</body>
</html>