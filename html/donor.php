<!DOCTYPE html>
<html lang = "en">

<head>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<!-- The following 3 meta tags *must* come first! -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first! -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/custom.css" rel="stylesheet"> 
	<!-- load our css after bootstrap -->
	<title>Donee Page</title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container topbar">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Donation database</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">Sign Up</a></li>
				<li><a href="#home">Home</a></li>
				<li class="active"><a href="#donate">Donate</a></li>
				<li><a href="#getinvolved">Get Involved</a></li>
				<li class="dropdown"><a href="#about">About Us</a>
					<ul class="dropdown-menu">
						<li><a href="#contact">Contact Us</a></li>
						<li><a href="#newsletter">Newsletter</a></li>
					</ul>
				</li>
				<li><a href="#request">Request Services</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container">
	<h3>Item Donation Form</h3> <br>
	<form action="donor.php">
		<table class="table table-striped">

			<tr>
				<th>Item</th>
				<th>Category</th>
				<th>Quantity</th>
			</tr>

			<tr>
				<td>
				<select name='request'>
					<option selected>Select item</option>
					<option>Shirts</option>
					<option>Shorts</option>
					<option>Food item 1</option>
					<option>Food item 2</option>
				</select>
				</td>
				<td>{Autopopulate category here}</td>
				<td><input type="number" value="item1" name="first" min="0" scale="1"></td>
			</tr>
		</table>
		<hr>
		<div class="form-group">
			<label for="specialRequests" class="col-sm-2 control-label">Special Donations</label>
			<div class="col-sm-10">
				<input type="text" class="form-control input" name="specialRequests" placeholder="[Name of special item not available above]">
				<input type="number" class="form-control input" value="item1" min="0" scale="1" placeholder="[Number of item]">
			</div>

		</div>
		<hr> <br>
		
		<input type="submit" value="Pledge Donation">
	</form>
</div>

<script type="text/javscript" source="js/bootstrap.min.js"></script>

</body>
</html>
