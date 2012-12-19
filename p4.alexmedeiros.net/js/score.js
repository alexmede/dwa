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
				$('#dice_num').html(data['dice_num']);
				//$('#total').html(data['total']);
							
			},
		});
	});