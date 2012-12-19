<button id='refresh-button'>Refresh</button>
<div id="score_box">
	<span id="player_name"></span>
	<span id="dice_num"></span>
	<span id="total"></span>
</div>
<script type='text/javascript'>
		
	$('#refresh-button').click(function() {
	 	
		$.ajax({
			type: 'POST',
			url: '/score/p_score',
			success: function(response) { 

				// For debugging purposes
				console.log(response);
				
				// Example response: {"post_count":"9","user_count":"13","most_recent_post":"May 23, 2012 1:14am"}
				var data = jQuery.parseJSON(response);
				
				// Inject the data into the page
				//$('#player_name').html(data['player_name']);
				//$('#dice_num').html(data['dice_num']);
				$('#total').html(data['total']);
							
			},
		});
	});

</script>