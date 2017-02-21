<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			text-align:left;
			color: #333;
			font:Georgia, "Times New Roman", Times, serif;
			font-size:14px;
			margin:20px;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			color:#333;
			text-decoration:none;
		}
		a:hover { text-decoration:underline; }
		h1 {
			font-size: 32px;
			margin: 10px 0;
		}
		h3 {
			margin: 5px 0;
		}
	</style>
</head>
<body>
	<div>
		<h1>Mobilink API</h1>
    
    <ul>
      <li><a href="<?php echo URL::to('/') ?>">Home</a></li> 
      <li><a href="<?php echo URL::to('/orders') ?>">Orders</a></li> 
      <li><a href="<?php echo URL::to('/sales') ?>">Sales</a></li>
      <li><a href="<?php echo URL::to('/users') ?>">Users</a></li>
      <li><a href="<?php echo URL::to('/accounts') ?>">Accounts</a></li>
      <li><a href="<?php echo URL::to('/product-selection') ?>">Product Selection</a></li>
    </ul>
    
    <hr />
      
		<?php echo url();?>/locator/api/service/v1/orders/USER/ROWS/PAGE/TYPE/VALUE/VALUE2
    <br /><strong>USER</strong> {<strong>all</strong>: for all users, <strong>id</strong>: for specfic user}
    <br /><strong>ROWS</strong> { No of rows to display i.e 10, 20 .. }
    <br /><strong>PAGE</strong> { Which page to display i.e 1, 2 .. }
    <br /><strong>TYPE</strong> { Used in filter records; value could be type, status, status_service .. }
    <br /><strong>VALUE</strong> { Used in filter records; this should contain valid type value store in database like Upgrade, SAF Generation, Start Date .. }
    <br /><strong>VALUE2</strong> { Used in filter records; valid End Date in 2015-03-20 format .. }
    
    <hr />
    
	</div>
</body>
</html>
