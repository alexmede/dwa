<form class='content' method='POST' action='/users/p_login'>

	Email<br>
	<input type='email' name='email' autofocus='autofocus'>
	<br><br>
	
	Password<br>
	<input type='password' name='password'>
	<br><br>
	
	<input type='submit' value='Log in'>
	<br><br>
	<? if($error): ?>
		<div class='error'>
			Incorrect Email and/or Password.
		</div>
		<br>
	<? endif; ?>
	

</form>