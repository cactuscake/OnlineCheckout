$(document).ready(function() { 
	var steps = $("form").children(".step"); 
	$(steps[0]).show(); 
	var current_step = 0; 
	$("a.next").click(function(){	
			if (current_step == steps.length-2) { 
				$(this).hide(); 
				$("form input[type=submit]").show(); 
			}
			$("a.back").show(); 
			current_step++; 
			changeStep(current_step); 
	});
	
	$("a.back").click(function(){	
		if (current_step == 1) { 
			$(this).hide(); 
		}
		$("form input[type=submit]").hide(); 
		$("a.next").show(); 
		current_step--; 
		changeStep(current_step);
	});
	
	function changeStep(i) { 
		$(steps).hide();
		$(steps[i]).show();
}		
});
