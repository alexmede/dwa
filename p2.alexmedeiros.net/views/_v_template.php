<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
	
	<link rel="icon" type="image/png" href="/favicon.png" />
	
</head>

<body>	
	
	<h1 id='home'><a href='http://alexmedeiros.net/' title='Home'>alexmedeiros.net</a></h1>
	<div id='nav'>
		<ul>
		
		<? if($user): ?>
		<!-- Menu for users who are logged in -->
			<li><a href='/posts/add'>New Post</a></li>
			<li><a href='/posts/'>All Posts</a></li>
			<li><a href='/posts/users'>Following</a></li>
			<li><a href='/posts/random'>Random!</a></li>
			<li><a href='/users/profile'>My Profile</a></li>
			<li><a href='/users/directory'>All Users</a></li>
			<li><a href='/users/logout'>Logout</a></li>
		
		
		<? else: ?>
		<!-- Menu options for users who are not logged in -->
			<li><a href='/users/login'>Login</a></li>
			<li><a href='/users/signup'>Sign up</a></li>
		
		<? endif; ?>
		</ul>
	</div>
	
	<br>
	<div id='vert'>
		
		<div id='horiz'>
	<?=$content;?>
		</div>
	
	</div>
</body>
</html>