
function countChecked() {
    var n = $("#efed-character-move-form input:checked").length;
	var message = n + (n <= 1 ? " is" : " are") + " checked!";
	
	if(!n){
		$('#efed-character-move-form #edit-update').attr("disabled", true);	
	}else{
		$('#efed-character-move-form #edit-update').attr("disabled", false);	
	}
	
	//alert(message);
}

$(document).ready(function(){
	countChecked();
    $("#efed-character-move-form :checkbox").click(countChecked);
});