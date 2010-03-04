
$(document).ready(function(){
	if($('#efed-result-admin-form #edit-type').val()=='match'){
		$('#efed-result-admin-form #edit-match-id-wrapper').show();
		$('#efed-result-admin-form #edit-title-wrapper').hide();
		
	}else{
		$('#efed-result-admin-form #edit-match-id-wrapper').hide();
		$('#efed-result-admin-form #edit-title-wrapper').show();
	}
	
	$('#efed-result-admin-form #edit-type').change(function() {
		if($(this).val()=='match'){
			$('#efed-result-admin-form #edit-match-id-wrapper').show();
			$('#efed-result-admin-form #edit-title-wrapper').hide();			
		}else{
			$('#efed-result-admin-form #edit-match-id-wrapper').hide();
			$('#efed-result-admin-form #edit-title-wrapper').show();
		} 		
	})
	
	$('.block-efed_result ul').jcarousel({
		scroll: 1
	}); 
});