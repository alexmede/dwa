$(document).ready(function() {
	
	/* game board background changer */
	$(".felt").click(function() {
	
		$("#dice_roll").css("background-image", "url('/img/"+ $(this).attr('id') +".jpg')");
	
	});
	
	$(".num").click(function() {
	
		$(this).prop("checked",true);
	
	});
	
	/* preload images */
	$.get('/img/red.jpg');
	$.get('/img/blue.jpg');
	$.get('/img/1.png');
	$.get('/img/2.png');
	$.get('/img/3.png');
	$.get('/img/4.png');
	$.get('/img/5.png');
	$.get('/img/6.png');
	
	$("#roll").click(function dice_roll() {

		/* get number of dice from radio button selection */
		var dice_num = $("input:radio[name=number]:checked").val();
		$("#post").html("<input type='hidden' name='dice_num' value='" + dice_num + "'>");
		
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
			$(".die" + roll[i]).html("<img src='/img/" + roll[i] + ".png' alt='" + roll[i] + "'>");
		}
		
		/* display total */
		$("#total_text span").html("<div id='total_num'>" + total + "</div>");
		$("#post").append("<input type='hidden' name='total' value='" + total + "'>");
		
		/* show high score submit button */
		$("#submit_score").show();

	});
	
	/* show name submission box */
	$("#submit_score").click(function() {
	
		$("#name_box").show();
		$("#submit_score").hide();
	
	});
	
	/* remove label from text input on click */
	$("#name").click(function() {
	
		if (this.value == "ENTER YOUR NAME") {
			this.value = "";
		}
	
	});
	
	/* replace label if text input remains blank */
	$("#name").focusout(function() {
	
		if (this.value == "") {
			this.value = "ENTER YOUR NAME";
		}
	
	});
	
	/* reject submission if name not entered */
	$("#submit").click(function() {
		var name = $("#name").val();
		if (name == "ENTER YOUR NAME") {
			return false;
		}
	
	});
	
	/* set up options for ajax and post form */
	var options = {
		type: 'POST',
		url: '/score/submit/',
		beforeSubmit: function() {
			$("#loading_box").show();
		},
		success: function(response) {
			
			$("#finished_box").show();
			
			$("#again").click(function() {
				
				$("#name_box").hide();
				$("#loading_box").hide();
				$("#finished_box").hide();
				
			});
		
		}
	
	};
		
	/* apply ajax to the form with options */
	$('form[name=score]').ajaxForm(options);
	
});