function balanceSwitch() {
    var cid = $("#efed-shop-buy-form #edit-cid").val();
	$("#efed-shop-buy-form .balance").hide();
	$("#efed-shop-buy-form #balance_"+cid).fadeIn();
}

$(document).ready(function() {
	balanceSwitch();
    $("#efed-shop-buy-form #edit-cid").change(balanceSwitch);
});