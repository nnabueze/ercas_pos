<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ErcasAPi</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	Ercas Api Loaded Successfull,This is testing mode !

	<div class='container'>
		<div class='col-md-6 col-md-offset-3'>
			<?php if(! empty($random)):?>
			<div class="alert alert-success">
				<strong>Success!</strong> Indicates a successful or positive action <?php echo $random; ?>.
			</div>
		<?php endif;?>
		<form role="form" method='POST' action='pos/users'>
			<div class="form-group">
				<label for="email">Pos Name:</label>
				<input type="text" name='pos_name' class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="pwd">Username:</label>
				<input type="username" name='username' class="form-control" id="pwd">
			</div>  <div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" name='password' class="form-control" id="pwd">
		</div>

		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
</div>
</body>
</html>