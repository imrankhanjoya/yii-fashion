

 setTimeout(function(){ 
    
    var footprint = getCookie("footprint");
    if(footprint != 12){
        jQuery('#yourFootPrints').modal({show: 'true'}); 
    }
    setCookie("footprint",12,500000);
},10000);
   