var OneSignal = window.OneSignal || [];
    var userDeviceToken = '';

    OneSignal.push(["init", {
    //appId: "9f21cd44-b6e7-4a3f-b49e-d52c2fd781c0",
    appId: "5863de63-7d93-4b6a-a10a-6ce8e2e15c3a",
    autoRegister: true,
    welcomeNotification: {disable: true},
    notifyButton: {enable: false}
    }]);
    OneSignal.push(function () {
        console.log("check for user"+getCookie('closepush'));
        // Occurs when the user's subscription changes to a new value.
        OneSignal.on('subscriptionChange', function (isSubscribed) {
            console.log("The user's subscription state is now:", isSubscribed);
            OneSignal.getUserId(function (userId) {
                console.log("User ID:", userId);
                
                if(userDeviceToken=='') {
                   userDeviceToken = userId;
                   
                }
                // (Output) OneSignal User ID: 270a35cd-4dda-4b3f-b04e-41d7463a2316
            });
            jQuery("#pushNotificaton").modal('hide');
            jQuery(".push-my-div").hide();

        });

        OneSignal.isPushNotificationsEnabled(function (isEnabled) {
            if (isEnabled) {
                OneSignal.push(function () {
                    OneSignal.getUserId(function (userId) {
                        console.log("User ID:", userId);
                        userDeviceToken = userId;
                        
                    });
                });
                //jQuery("#pushNotificaton").modal('show');
                jQuery(".push-my-div").hide();
            }else{
                if(getCookie('closepush')==null){
                    jQuery("#pushNotificaton").modal('show');
                }
                jQuery(".push-my-div").show();
            }
        });
    });

    function mypush(){
        OneSignal.push(["registerForPushNotifications"]);
    }
    function mypushclose(){
        jQuery("#pushNotificaton").modal('hide');
        setCookie("closepush",true,50000);
    }

    function setCookie(key, value,ctime) {
            var expires = new Date();
            expires.setTime(expires.getTime() + ctime);
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }