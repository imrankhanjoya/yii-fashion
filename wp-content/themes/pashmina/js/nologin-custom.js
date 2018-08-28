

 setTimeout(function(){ 
    
    var footprint = getCookie("footprint");
    if(footprint !== 'true'){
        jQuery('#yourFootPrints').modal({show: 'true'}); 
    }
    setCookie("footprint",'true',50000);
},10000);
   