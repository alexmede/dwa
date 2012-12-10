$(document).ready(function() {

	/* game board background changer */
	$(".felt").click(function() {
	
		$("#dice_roll").css("background-image", "url('"+ $(this).attr('id') +".jpg')");
	
	});
	
	$("input:button[name=roll]").click(function dice_roll() {

		/* get number of dice from radio button selection */
		var dice_num = $("input:radio[name=number]:checked").val();
		
		/* debug to determine if dice count is correct on roll */
		//console.log(dice_num);

		/* clear results for reroll */
		$("#dice").html("");

		var roll = new Array();
		/* for each roll generate a (pseudo)random number between 1 and 6 */
		for (i = 0; i < dice_num; i += 1) {
			roll[i] = Math.floor(Math.random() * 6) % 6 + 1;
		}

		/* debug to view roll array */
		//console.log(roll);
			
		/* add total of rolls */
		var total = 0;
		for (i = 0; i < roll.length; i += 1) {
			total += parseInt(roll[i]);
		}
		
		/* debug to view total */
		//console.log(total);
		
		/* concatenate into div and display image per die class */
		for (i = 0; i < roll.length; i += 1) {
			$("#dice").append("<span class='die" + roll[i] + "'>" + roll[i] + "</span>");
			$(".die" + roll[i]).html("<img src='" + roll[i] + ".png' alt='" + roll[i] + "'>");
		}
		
		/* display total */
		$("#total_text span").html("<div id='total_num'>" + total + "</div>");

	});
	
});