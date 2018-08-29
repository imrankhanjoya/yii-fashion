jQuery(document).ready(function() {

    jQuery("#myComment").submit(function(event){
        
        var data = jQuery(this).serializeArray();

        console.log(data);
        alert(wfp.ajaxurl);
        jQuery.ajax({
            url : wfp.ajaxurl,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'post_disscuss',
                data:data
            },
            success : function( response ) {
                if(response.status==true){
                    
                    jQuery('#startDiscuss').modal('hide');
                }

            }
        });
        event.preventDefault();

    });
   

});