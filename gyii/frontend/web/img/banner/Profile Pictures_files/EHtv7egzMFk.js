if (self.CavalryLogger) { CavalryLogger.start_js(["D8Lox"]); }

__d("MGenericJewel",["CSS","Event","MHistory","MJewels","MParent","MViewport","ScriptPath","Stratcom","SubscriptionsHandler"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){__p&&__p();var p={};function a(a,b,c,d){__p&&__p();if(p[a])return;var e=new o();p[a]=e;var f,q;e.addSubscriptions(h.listen(b,"click",function(b){k.bySigil(b.target,"icon")&&(b.preventDefault(),!f?(i.pushSoftState(a),n.invoke("MGenericJewel::clicked",a,{open:!0})):a===j.SEARCH&&n.invoke("m:chrome:tab:show",a,{open:!0}),m.set("topbar_"+a))}),n.listen("m:history:change",null,function(d){var e=d.getData().soft===a;!e&&(f||q)&&n.invoke("m:chrome:tab:hide",a);g.conditionClass(b,"popoverOpen",e);c&&!r&&(g.conditionClass(c,"popover_hidden",!e),g.conditionClass(c,"popover_visible",e),e&&(c.style.minHeight=l.getUseableHeight()+"px"));e&&!f&&(n.invoke("m:chrome:tab:show",a),g.addClass(b,"noCount"),g.removeClass(b,"hasCount"));q=d.getData().soft===void 0;f=e}));var r=!1;a===j.SEARCH&&c&&e.addSubscriptions(n.listen("m:graph-search:rendered",null,function(){g.conditionClass(c,"popover_hidden",!0),r=!0}));d&&e.addSubscriptions(n.listen("m:page:unload",null,function(){e.release(),p[a]=void 0}))}e.exports={init:a}}),null);
__d("MJewelSet",["MViewport","Popover","ScriptPath","Stratcom"],(function(a,b,c,d,e,f,g,h,i,j){__p&&__p();var k={_haveInitializedJewels:!1,init:function(){if(k._haveInitializedJewels)return;k._haveInitializedJewels=!0;j.listen("m:viewport:orientation-change",null,k._onOrientationChange);j.listen("m:jewel:flyout:open",null,k._onJewelOpen)},_onJewelOpen:function(event){var a=event.getData();i.set("topbar_"+a.jewel)},_onOrientationChange:function(){setTimeout(function(){var a=h._activePopover;if(!a)return;g.getHeight()+"px"!==a.flyout.style.minHeight&&a.refreshConstraints()},800)}};e.exports=k}),null);
__d("XFeedNewStoriesBadgeController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/feed/badge/",{})}),null);
__d("MOutOfFeedNewStoriesPolling",["Arbiter","ArbiterToken","MPageController","MRequest","Stratcom","TimeSlice","XFeedNewStoriesBadgeController","setTimeoutAcrossTransitions"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){"use strict";__p&&__p();var o=null,p=0,q=!1,r=new g(),s=9,t=15e3;function u(){if(p>s)return;clearTimeout(o);o=n(l.guard(function(){v()},"Feed jewel count polling",{propagationType:l.PropagationType.ORPHAN}),t)}function v(){var a=m.getURIBuilder().getURI();a=new j(a);a.listen("done",function(a){x(a.payload.count)});a.listen("finally",function(){a=null,u()});a.send()}function w(){x(0),clearTimeout(o),o=null}function x(a){p=a,r.inform("MOutOfFeedNewStoriesPolling/updateCount",{count:a},"state")}function a(a){y();return r.subscribe("MOutOfFeedNewStoriesPolling/updateCount",a)}function y(){if(q)return;q=!0;k.listen("m:homepage:load",null,function(){w()});k.listen("m:homepage:unload",null,function(){u()});i.isHomeishPath(location.href)||u()}e.exports={addPollingListener:a,MAX_COUNT:s}}),null);
__d("MFeedJewel",["CSS","DOM","MHistory","MJewel","MJewels","MOutOfFeedNewStoriesPolling","MPageController","MURI","ScriptPath","Stratcom","SubscriptionsHandler","$","formatNumber","qex","throttle"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u){__p&&__p();var v,w,x,y,z=null;function A(a){g.conditionClass(y,"popoverOpen",!0)}function B(a){g.conditionClass(y,"popoverOpen",!1)}function C(){if(x)return;x=new q();x.addSubscriptions(h.listen(r(j.JEWEL_NAV_NODE_ID),"click","feed",G));x.addSubscriptions(p.listen("m:history:change",null,E))}function D(){x&&x.release(),x=null}function E(a){a=a.getData().soft;for(var b=0,c=Object.keys(k);b<c.length;b++)if(k[c[b]]===a){B();return}A()}function F(a){var b=t._("782462");if(b)return new n(a.replace("/home.php","/")).normalize().removeQueryData(i.SOFT_STATE_KEY).toString();else return new n(a).normalize().toString()}function G(a){var b=a.getNode("icon").getAttribute("href"),c=H(),d=t._("719515"),e=F(b),f=F(i.getPath());e===f?(a.kill(),i.hasSoftState()&&t._("782463")?i.popSoftState(i.getState()):c(!0)):d&&(a.kill(),c(!1,b));o.set("topbar_feed")}function H(){if(z)return z;var a=t._("719515"),b=function(a,b){a?m.reload({reloaded:!0}):m.load(b)};a?z=u(b,a):z=b;return z}function I(a){var b=s.withMaxLimit(a,l.MAX_COUNT);h.setContent(v,b);g.conditionClass(y,"noCount",a===0);g.conditionClass(y,"hasCount",a>0);g.conditionClass(y,"largeCount",b.length>1)}function a(a,b){__p&&__p();if(w)return;w=!0;y=a;v=h.find(y,"span","count");p.listen("m:homepage:load",null,function(){A(),C()});p.listen("m:homepage:unload",null,function(){B(),D()});b&&C();v&&l.addPollingListener(function(a,b){return I(b.count)})}e.exports={init:a}}),null);
__d("XNotificationJewelContentController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/mobile/notifications/jewel/content/",{spinner_id:{type:"String",required:!0}})}),null);
__d("MNotificationsJewel",["Arbiter","DOM","EventListener","MJewel","MJewelFlyout","MJewels","MLogState","MRequest","MURI","Popover","Stratcom","XNotificationJewelContentController","invariant","throttle"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t){"use strict";__p&&__p();var u="notif_",v="/notifications.php",w,x,y,z=!1,A={},B=!1;function C(){w||s(0,2795),g.subscribe("m:jewels:init-counts",D,"all"),x=w.listen("jewel_click",F),w.listen("cleared",H),z||(z=!0,q.listen("m_notification",null,J),q.listen("m:jewel-set:notifications-jewel:refresh-flyout",null,L.refreshNotificationsConstraints),q.listen("notifications_read",null,K),q.listen("notifications_seen",null,K),q.listen("m:jewel:flyout:open",null,E))}function D(event,a){var b=a.unread_notification_ids;a=a.notification_count;b&&(A=b);a&&w&&(w.reregisterListeners(),w.updateCount(a,H))}function E(event){var a=event.getData();if(a.jewel!=="notifications")return;I()}function F(){w||s(0,2795),x&&(x.remove(),x=null),new n("/a/jewel_notifications_log.php").addData({click_type:"jewel_click",count:w.getCount()}).send()}function G(a){return u+a}function H(){x&&(x.remove(),x=null);var a=A;A={};var b=[];for(var c in a)b.push(c);a=new n(new o("/a/jewel_notifications_read.php").toString());a.addData({ids:b,count:b.length,seen:!0});a.send()}function I(){w||s(0,2795);var a=w._getContentsElement(),b="notifications-flyout-loading";if(q.hasSigil(a,b)){b=r.getURIBuilder().setString("spinner_id",a.getAttribute("id")).getURI();y||(y=new n(b),y.listen("finally",function(){y=null}),y.send())}}function J(event){__p&&__p();w||s(0,2795);var a=event.getData();if(a&&a.data){if(a.data.type==="friend_confirmed")return;!w.isOpen()&&!A[a.data.alert_id]&&w.setCount(a.data.unread+w.getCount());k.removeMenuContent(G(a.data.alert_id));A[a.data.alert_id]=!0;w.isOpen()&&H();B||I()}}function K(event){__p&&__p();w||s(0,2795);var a=event.getData();if(!a)return;var b=event.getType()=="notifications_read";if(a.alert_ids){var c=0;for(var d=0;d<a.alert_ids.length;d++)A[a.alert_ids[d]]&&(delete A[a.alert_ids[d]],b&&k.updateMenuColor(G(a.alert_ids[d]),!0,!1),c++);d=w.getCount();w.setCount(d-c)}else{w.setCount(0);if(b)for(var e in A)k.updateMenuColor(G(e),!0,!1);A={}}}var L={initJewel:function(a){w=j.create("notifications",{pos:m.CLICK_POSITION_NOTIFICATIONS_FLYOUT,softState:l.NOTIFICATIONS,noPopover:!!a.noFlyout,additionalPaths:[v]}),B=!!a.noFlyout,C()},refreshNotificationsConstraints:function(){p.getInstance("notifications_flyout").refreshConstraints()},refreshNotificationsConstraintsOnImageLoad:function(){var a=document.getElementById("notifications_flyout");if(!a)return;L.refreshNotificationsConstraints();var b=t(L.refreshNotificationsConstraints,500);h.scry(a,"img","notif_thumb").forEach(function(a){var c=i.listen(a,"load",function(){c.remove(),b()})})}};e.exports=L}),null);
__d("PageLoadEvents",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({NAV_STARTED:"nav_started",FIRST_PAINT:"first_paint",JEWELS_VISIBLE:"jewels_visible",TTI:"tti",E2E:"e2e",NAVIGATION:"navigation",VISIBILITY_CHANGE:"visibility_change",ILLEGAL_TRANSITION:"illegal_transition"})}),null);
__d("MPageLoadClientMetricsCallbacks",["MHistory","NavigationMetrics","PageLoadEvents","Run","Stratcom","SubscriptionsHandler"],(function(a,b,c,d,e,f,g,h,i,j,k,l){"use strict";__p&&__p();var m=new l();function n(){m.release()}function o(b,c,d){return h.addRetroactiveListener(h.Events.EVENT_OCCURRED,function(e,f){e!==b?h.removeCurrentListener():f.event===c&&(a.MPageLoadClientMetrics.logEventWithAbsoluteTimestamp(d,f.timestamp),h.removeCurrentListener())})}e.exports={init:function(b){__p&&__p();if(!a.MPageLoadClientMetrics.isEnabled())return;a.MPageLoadClientMetrics.setDisableCallback(n);m.addSubscriptions(o(b.lid,"tti",i.TTI),o(b.lid,"e2e",i.E2E),k.listen("m:page:load-start",null,function(b){a.MPageLoadClientMetrics.logEvent(i.NAVIGATION,void 0,a.MPageLoadClientMetrics.origin+b.getData().path)}),k.listen("m:history:change",null,function(){var b=g.getState();b=b?"soft="+b:g.getPath();a.MPageLoadClientMetrics.logEvent(i.NAVIGATION,void 0,b)}));j.onUnload(function(){a.MPageLoadClientMetrics.disable()})}}}),null);
__d("MPageletTypes",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({CHROME:"chrome",CONTENT:"content"})}),null);
__d("MFirstPageRecorder",["Arbiter","DOM","MDeepCopy","MPageCache","MPageController","MPageHeaderRight","MPageletTypes","MPageTitle","MRequestConfig","MResponseData","MURI","ScriptPath","ServerJS","Stratcom","$","ge"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v){__p&&__p();var w,x=!1,y=!1,z=[],A=new q(k.getRenderedPath()),B,C=[],D=[],E=["m:chrome:schedulable-graph-search","first_response","last_response","MNotificationFlyoutContent","MMessegesFlyoutContent","MFriendRequestsFlyoutContent"];function F(){if(!B)return;j.setCachedPage(A,B);j.clearCachedIUIResponses(A);C.forEach(function(a){j.addCachedIUIResponse(A,a)});y=!0}function G(){__p&&__p();if(x)return;x=!0;var a={ajax_response_token:o.ajaxResponseToken.secret,js:[],css:[],ixData:null,bxData:null,actions:[]},b=u("root").cloneNode(!0),c=[];B=new p({ajax_response_token:o.ajaxResponseToken.secret,js:[],css:[],ixData:[],bxData:[],actions:[{cmd:"script",type:"immediate",fn:function(){h.replace(u("root"),b.cloneNode(!0))}}]});var d=l.getChromeHeaderRightContent();d&&d.length>0&&c.push(function(){var a=document.createDocumentFragment();for(var b=0;b<d.length;b++)a.appendChild(d[0]);l.setup({node:a})});var e=document.title;c.push(function(){n.setTitle(e)});var f=r.getPageInfo();f&&c.push(function(){r.set(f.scriptPath,f.categoryToken,f.extraData)});a.actions=c.map(function(a){return{cmd:"script",type:"onload",fn:a}});C.push(new p(a))}function H(a,b,c){var d={ajax_response_token:o.ajaxResponseToken.secret,js:[],css:[],ixData:null,bxData:null,actions:[]};d.actions=Object.keys(a).map(function(b){return{cmd:"replace",target:b,html:a[b],replaceifexists:!1,allownull:!1}});b&&d.actions.push({cmd:"append",target:"static_templates",html:b,replaceifexists:!0});c&&d.actions.push({cmd:"script",type:"onload",fn:function(){new s().handle(i(c))}});G();C.push(new p(d))}function I(a,b){if(!a||E.includes(a.id))return;y?(H(a.contentMap,a.staticTemplates,a.jsmods),j.addCachedIUIResponse(A,C.pop())):D.push(a)}function J(){B=null,x=!0}function K(){for(var a=0,b=D.length;a<b;a++)H(D[a].contentMap,D[a].staticTemplates,D[a].jsmods);F();D=[];C=[]}function a(a){__p&&__p();if(w)return;w=!0;j.setPageCacheComplete(A,!0);var b=g.subscribe(["pagelet_performing_replayable_actions","pagelet_performing_replayable_actions_failed","all_pagelets_loaded"],function(b,c){switch(b){case"pagelet_performing_replayable_actions":I(c,a);break;case"pagelet_performing_replayable_actions_failed":J();break;case"all_pagelets_loaded":K();break}}),c=g.subscribe(["MRenderingScheduler/pageletSchedule","MRenderingScheduler/dd"],function(a,b){switch(a){case"MRenderingScheduler/pageletSchedule":if(b.pageletConfig.type===m.CONTENT){a=(a={},a[b.id]=b.element?v(b.element).innerHTML:b.content.__html,a);H(a,b.pageletConfig.templates.__html,i(b.pageletConfig.serverJSData))}break;case"MRenderingScheduler/dd":F();break}});z=[b,c]}t.listen("m:page:unload",null,function(){z.forEach(function(a){a&&a.unsubscribe()}),z=[],w=!0,B=null,C=[],D=[],t.removeCurrentListener()});f.startPageletCaching=a}),null);