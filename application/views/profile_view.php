<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("style/style.css");?>">
</head>
<body>
<div id="container">
	<h1>CodeIgniter Sign In With <?php echo $social;?></h1>

	<div id="body">
		<p>My Profile</p>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><?php echo $user_profile['id'];?></td>
			</tr>
			<!-- <tr>
				<td>Name</td>
				<td>:</td>
				<td><?php //echo $user_profile['name'];?></td>
			</tr> -->
			<tr>
				<td>First Name</td>
				<td>:</td>
				<td><?php echo $user_profile['given_name'];?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>:</td>
				<td><?php echo $user_profile['family_name'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $user_profile['email'];?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $user_profile['gender'];?></td>
			</tr>
			<tr>
				<td>Photo</td>
				<td>:</td>
				<td><img src="<?php echo $user_profile['picture'];?>" width="200"></td>
			</tr>
		</table>
		
		<p><a href="<?php echo base_url('home/logout');?>" class="btn btn-sm btn-primary">Sign Out</a></p>
	
	</div>
</div>

</body>
</html>