function disableSubmit() {
    var n = $("#efed-roleplay-view-filter-form #edit-cid").val();
	
	if(n==-1){
		$('#efed-roleplay-view-filter-form #edit-submit').attr("disabled", true);	
	}else{
		$('#efed-roleplay-view-filter-form #edit-submit').attr("disabled", false);	
	}
}

$(document).ready(function() {
	disableSubmit();
    $("#efed-roleplay-view-filter-form #edit-cid").change(disableSubmit);
	
	$('.block-efed_roleplay ul').jcarousel({
		scroll: 1
	}); 
});