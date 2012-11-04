<? foreach($posts as $post): ?>
<div class='post'>
	<h2 class='title'><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<div class='content'><?=$post['content']?></div>
</div>
	<br><br>
	
<? endforeach; ?>