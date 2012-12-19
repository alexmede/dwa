<h2 class="project_title"><img class="image" src="/img/title.png" alt="Dice Roll"></h2>
<div id="name_box">
	<br>
	<form id="form" name="score" method="POST" action="/score/submit">
		<div id="inputs">
			<input id="name" type="text" name="player_name" value="ENTER YOUR NAME" maxlength="16" size="18">
			<input id="submit" type="submit" value="SUBMIT">
		</div>
		<div id="post">
		</div>
	</form>
</div>

<div id="loading_box">
	<br>
	<img class="image" src="/img/ajax-loader.gif">
</div>

<div id="finished_box">
	<br>
	<strong>SCORE SUBMITTED!</strong>
	<p><span id='view'>View Scores</span><span id='again'>Roll Again</span></p>
</div>

<div id="score_box">
	
</div>

<div class="content">
	<div id="dice_roll">
		<div id="board">
			<br><br>
			<div id="bg">BG Color: <span id="red" class="felt"> Red </span> <span id="green" class="felt">Green</span> <span id="blue" class="felt">Blue</span></div>
			<div id="settings">
				<p class="text">Choose how many dice to roll:</p>
				<span class="num"><input type="radio" name="number" value="1" checked>1</span>
				<span class="num"><input type="radio" name="number" value="2">2</span>
				<span class="num"><input type="radio" name="number" value="3">3</span>
				<span class="num"><input type="radio" name="number" value="4">4</span>
				<span class="num"><input type="radio" name="number" value="5">5</span>
				<span class="num"><input type="radio" name="number" value="6">6</span>
				<span class="num"><input type="radio" name="number" value="7">7</span>
				<span class="num"><input type="radio" name="number" value="8">8</span>
				<span class="num"><input type="radio" name="number" value="9">9</span>
				<span class="num"><input type="radio" name="number" value="10">10</span>
			</div>
			<br><br>
			<input id="roll" type="button" name="roll" value="ROLL!"><br>
			<input id="submit_score" type="submit" name="submit_score" value="Submit Score">
			
			<br><br>

			<div id="total_text">TOTAL: <span></span></div>
			<br><br>
			<div id="dice"></div>
		</div>
	</div>
	<br>
	<p>Proposal: <a href="http://alexmedeiros.net/dwa/p4/proposal.html" title="Project 4">Dice Roll Extended</a></p>
</div>