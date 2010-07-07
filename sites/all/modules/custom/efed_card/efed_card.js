

$(document).ready(function(){	 
    $('#efed-card-admin-match-manage-form .stable_members').hide();
   
    $('#efed-card-admin-match-manage-form #edit-id').change(function() {
        $('#efed-card-admin-match-manage-form .stable_members').hide();
        if($(this).val()!='null'){
            $('#efed-card-admin-match-manage-form #stable_'+$(this).val()).show();
        }		
    })

    $('.block-efed_card ul').jcarousel({
        scroll: 1
    }); 
});
	



