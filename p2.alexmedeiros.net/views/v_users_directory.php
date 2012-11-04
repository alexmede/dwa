<? foreach($directories as $directory): ?>
<div class='post'>
	<h2 class='title'><?=$directory['first_name']?> <?=$directory['last_name']?></h2>
	<div class='content'><?=$directory['email']?></div>
</div>
	<br><br>
	
<? endforeach; ?>