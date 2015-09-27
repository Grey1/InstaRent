<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<form action="#" method="POST" role="form">
			<legend>Form title</legend>
		
		
				
				<input type="file" id="image"/> <br>
				<button type="submit" class="btn btn-info">Upload</button> &nbsp
				<button type="button" class="btn btn-danger">Cancel</button>  <br>

				
				


		
		
			
		
		</form>

		<!-- jQuery -->
		<script src="jquery.js"></script>

		<script type="text/javascript">
			$(document).on('submit','form',function(e){
				e.preventDefault();
				$form = ($this);
				uploadImage($form);

			});

			function uploadImage($form){
				var formData = new FormData($form[0]);
			}





		</script>
		<!-- Bootstrap JavaScript -->
		<script src="bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>