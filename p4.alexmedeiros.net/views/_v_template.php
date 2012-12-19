<!DOCTYPE html>
<html>
<head>

	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="/js/jquery.form.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>
	
	<link rel="icon" type="image/png" href="/favicon.png" />

</head>

<body>

<h1 id="home"><a href="http://alexmedeiros.net/" title="Home">alexmedeiros.net</a></h1>

<div id="nav">
	<ul>
		<li><a href="http://alexmedeiros.net/dwa/p1/" title="Project 1">Project 1</a></li>
		<li><a href="http://p2.alexmedeiros.net/" title="Project 2">Project 2</a></li>
		<li><a href="http://alexmedeiros.net/dwa/p3/" title="Project 3">Project 3</a></li>
		<li><a href="http://p4.alexmedeiros.net/" title="Project 4">Project 4</a></li>
	</ul>
</div>

<div id="vert">
	<div id="horiz">
		<?=$content;?>
	</div>
</div>

</body>
</html>