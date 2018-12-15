if (self.CavalryLogger) { CavalryLogger.start_js(["ravCS"]); }

__d("MAjaxifyFormTypes",[],(function(a,b,c,d,e,f){e.exports={PAGELOAD:"pageload",NOCACHE:"nocache",CACHE:"cache"}}),null);
__d("MAjaxify",["CSS","DOM","ErrorUtils","LoadingIndicator","MAjaxifyFormTypes","MHistory","MLegacyDataStore","MPageCache","MPageControllerPath","MRequest","MRequestTypes","Stratcom","URI"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s){__p&&__p();var t={postprocess:function(a){n.addCachedIUIResponse(o.getRequestPath(),a.response)}};function u(a,b){return(" "+a.className+" ").indexOf(" "+b+" ")>-1}function v(a,b){while(a&&!u(a,b))a=a.parentNode;return a}function w(event,a,b,c,d){__p&&__p();c=c||"async_elem";event&&(event.preventDefault(),event.stopPropagation());if(a){var e=v(a,c)||a,f=c+"_saving";if(u(e,f))return!1;g.conditionClass(e,c+"_preprocess",!0);a=function(a){g.conditionClass(e,c,!a),g.conditionClass(e,f,a),r.invoke(a?"m:ajax:saving:start":"m:ajax:saving:complete",null,e)};b.listen("start",a.bind(null,!0));b.listen("finally",a.bind(null,!1))}b.setType(q.INDEPENDENT);for(var a=0,h=d.length;a<h;a++){var i=d[a];for(var j in i)b.listen(j,i[j])}b.send();return!1}var x=["input","textarea","select","button","object"];function y(a,b){for(var c=0;c<x.length;c++){var d=h.scry(a,x[c]);for(var e=0;e<d.length;e++){var f=m.get(d[e]);b?(f.wasDisabled=d[e].disabled,d[e].disabled=!0):d[e].disabled=f.wasDisabled}}}function z(a,b,c){__p&&__p();this.start=function(){if(c)return;y(a,!0)},this.process=function(b){if(c)return;y(a,!1);a.reset();if(document.createEvent&&a.dispatchEvent){b=document.createEvent("HTMLEvents");b.initEvent("reset",!0,!0);a.dispatchEvent(b)}},this.error=this.fail=function(c){y(a,!1),b==k.PAGELOAD&&j.hide()},this.postprocess=function(a){b==k.PAGELOAD&&j.hide(),b==k.CACHE&&t.postprocess(a),r.invoke("m:ajax:complete")}}var A=null;document.addEventListener("click",function(event){var a=event.target;(a.tagName==="INPUT"||a.tagName==="BUTTON")&&a.type=="submit"&&(A=a)},!0);function B(event,a,b,c,d){return w(event,a,b,c,d?[t].concat(d):[t])}function a(event,a,b,c){return!a||(event.which||event.button)>=2?!0:B(event,event.target,new p(a),b,c)}function b(event,a,b,c,d,e,f,g,m){__p&&__p();m===void 0&&(m=!1);return i.guard(function(){__p&&__p();if(!a||!a.action)return!0;var i=h.convertFormToDictionary(a);A&&(i[A.name]=A.value,A=null);var n=new p(a.action);n.processResponseAfterPageTransitions=m;n.addData(i);n.setMethod(a.method||"POST");g&&n.setFailureLogging(g);var o=null;if(c===k.PAGELOAD){if(a.method.toUpperCase()==="GET"){i=new s(a.action).addQueryData(i);l.pushState(i)}j.show()}else o=e?null:d||a;f||(f=[]);f.push(new z(a,c,e));r.invoke("MAjaxify.form.ajax.start","",n);return w(event,o,n,b,f)},"MAjaxify.form")()}f.ajaxify=B;f.form=b;f.link=a}),null);
__d("MUFICommentReplyLink",["DOM","MAjaxify","MParent","MRequest","MUFIConfig","MUFIInlineRepliesFunnelLogConfig","Stratcom","SubscriptionsHandler","ge"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){"use strict";__p&&__p();var p="feed-ufi-comments",q=l.MUFIInlineReplyComposerFunnelLogger;function a(a){var b=a.composerID,c=a.placeholderID,d=a.node,e=a.loadComposerURI,f=a.loggingTargetFBID,h=a.replyAuthorName,i=a.replyAuthorID;k.canReactToComment&&(d.href&&d.setAttribute("data-uri",d.href),d.removeAttribute("href"));var j=new n();j.addSubscriptions(g.listen(d,"click",null,function(event){r({composerID:b,placeholderID:c,loadComposerURI:e,loggingTargetFBID:f,replyAuthorName:h,replyAuthorID:i,onPreventDefault:function(){event.prevent()}})}),g.listen(d,"mousedown",null,function(event){m.invoke("MCommentComposer:replyButtonClick",null,{composerID:b})}),m.listen("m:page:unload",null,function(){j.release()}),m.listen("m:feed-ufi-flyout:reset",null,function(){j.release()}))}function b(a){var b=new n();b.addSubscriptions(m.listen("obj:finally",null,function(c){c=g.scry(a,"*","mufi-composer")[0];c&&c.focus&&c.focus();b.release()}))}function r(a){__p&&__p();var b=a.composerID,c=a.placeholderID,d=a.loadComposerURI,e=a.loggingTargetFBID;a=a.onPreventDefault;e&&q&&q.logReplyClicked(e);e=o(b);b=e&&g.scry(e,"*","mufi-composer")[0];if(b){a();i.bySigil(e,p)?m.invoke("MUFICommentReplyLink:show-inline-composer",null,{composerRoot:e}):b.focus();return}e=o(c);if(e&&d){a();h.ajaxify(null,e,new j(d),null);return}}e.exports={initInlineRepliesWithMention:a,focusOrLoadInlineReplyComposerWithMention:r,bindFocusInlineReplyComposerAfterPageFinish:b}}),null);
__d("Keys",[],(function(a,b,c,d,e,f){"use strict";e.exports=Object.freeze({BACKSPACE:8,TAB:9,RETURN:13,SHIFT:16,CTRL:17,ALT:18,PAUSE_BREAK:19,CAPS_LOCK:20,ESC:27,SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40,INSERT:45,DELETE:46,ZERO:48,ONE:49,TWO:50,THREE:51,FOUR:52,FIVE:53,SIX:54,SEVEN:55,EIGHT:56,NINE:57,A:65,B:66,C:67,D:68,E:69,F:70,G:71,H:72,I:73,J:74,K:75,L:76,M:77,N:78,O:79,P:80,Q:81,R:82,S:83,T:84,U:85,V:86,W:87,X:88,Y:89,Z:90,LEFT_WINDOW_KEY:91,RIGHT_WINDOW_KEY:92,SELECT_KEY:93,NUMPAD_0:96,NUMPAD_1:97,NUMPAD_2:98,NUMPAD_3:99,NUMPAD_4:100,NUMPAD_5:101,NUMPAD_6:102,NUMPAD_7:103,NUMPAD_8:104,NUMPAD_9:105,MULTIPLY:106,ADD:107,SUBTRACT:109,DECIMAL_POINT:110,DIVIDE:111,F1:112,F2:113,F3:114,F4:115,F5:116,F6:117,F7:118,F8:119,F9:120,F10:121,F11:122,F12:123,NUM_LOCK:144,SCROLL_LOCK:145,SEMI_COLON:186,EQUAL_SIGN:187,COMMA:188,DASH:189,PERIOD:190,FORWARD_SLASH:191,GRAVE_ACCENT:192,OPEN_BRACKET:219,BACK_SLASH:220,CLOSE_BRAKET:221,SINGLE_QUOTE:222})}),null);
__d("DeviceBasedLoginRedesignChooserUser",["EventListener","Keys"],(function(a,b,c,d,e,f,g,h){a={attachHandlerToElement:function(a,b){g.listen(a,"click",function(){b.submit()}),g.listen(a,"keyup",function(a){a.keyCode===h.RETURN&&b.submit()})}};e.exports=a}),null);
__d("MMultiPhotoUploaderAttachmentState",[],(function(a,b,c,d,e,f){__p&&__p();var g={SENDING:"sending",POLLING_TAG_SUGGESTIONS:"polling",UPLOADED:"uploaded",ERROR:"error"};g.getDefaultState=function(){var a={};for(var b in g){if(!Object.prototype.hasOwnProperty.call(g,b)||typeof g[b]!=="string")continue;a[g[b]]=0}return a};e.exports=g}),null);
__d("FRXFunnelLoggerUtil",["CurrentUser"],(function(a,b,c,d,e,f,g){a={getSessionKey:function(a){var b=g.getAccountID();if(a==null)return b;else return b+"#"+a}};e.exports=a}),null);
__d("FRXFunnelTag",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({ENTRY_POINT:"entry_point",IS_FROM_TAG_SEARCH:"is_from_tag_search",IS_FRX:"is_frx",IS_NFX:"is_nfx",IS_NT:"is_nt",IS_REPORTED:"is_reported",OBJECT_ID:"object_id",SURFACE:"surface",TAG_EXPERIMENT_GROUP:"tag_experiment_group",ACTION_EXPERIMENT_GROUP:"action_experiment_group"})}),null);
__d("MFRXWebFunnelLogger",["Event","FRXFunnelLoggerUtil","FRXFunnelTag","Stratcom","WebFunnelLogger"],(function(a,b,c,d,e,f,g,h,i,j,k){__p&&__p();var l={startcomListeners:[],get:function(a,b){b=h.getSessionKey(b);return new k("FRXMSiteFunnelDefinition").setAction(a).setSessionKey(b)},createFunnelTagList:function(a,b,c){return[i.ENTRY_POINT+": "+a,i.IS_FRX+": true",i.OBJECT_ID+": "+b,i.SURFACE+": "+c]},attachClickLogging:function(a,b,c,d,e){g.listen(a,"click",function(a){a=l._getLoggerForXHP(b,c,d,e);a.log()})},removeStratcomListeners:function(){__p&&__p();for(var a=l.startcomListeners,b=Array.isArray(a),c=0,a=b?a:a[typeof Symbol==="function"?Symbol.iterator:"@@iterator"]();;){var d;if(b){if(c>=a.length)break;d=a[c++]}else{c=a.next();if(c.done)break;d=c.value}d=d;d.remove()}l.startcomListeners=[]},attachStratcomClickLogging:function(a,b,c,d,e){a=j.listen("click",a,function(event){var a=l._getLoggerForXHP(b,c,d,e);a.log();j.removeCurrentListener()});l.startcomListeners.push(a)},logEvent:function(a,b,c,d){a=l._getLoggerForXHP(a,b,c,d);a.log()},_getLoggerForXHP:function(a,b,c,d){__p&&__p();a=l.get(a,b);if(c!=null){b=Object.entries(c);for(var c=0;c<b.length;c++){var e=b[c],f=e[0];e=e[1];a.addActionPayload(f,e)}}d!=null&&a.setFunnelTags(d);return a}};e.exports=l}),null);
__d("InitMAjaxify",["MAjaxify","MLegacyDataStore","MLinkHack","MRequest","Stratcom"],(function(a,b,c,d,e,f,g,h,i,j,k){__p&&__p();var l={};function m(a){l[a]=l[a]||new RegExp("(^|\\s+)"+a+"(\\s+|$)");return l[a]}function a(a,b){a=a.className||"";return a.match(m(b))}k.listen("click","ajaxify",function(event){__p&&__p();event.prevent();var a=event.getNode("ajaxify"),b=a.getAttribute("data-ajaxify-class"),c=a.getAttribute("data-confirm-text");if(c&&!confirm(c))return;var d=h.get(a);if(d.loading)return;d.loading=!0;c=function(){d&&(d.loading=d.request=null),d=null};var e=function(){k.invoke("m:ajax:complete")};c={"finally":c,postprocess:e};e=i.remove(a);var f=a.getAttribute("data-ajaxify-href")||a.getAttribute("href");if(a.getAttribute("data-method")==="post"){var l=new j(f);l.setAutoRetry(!0);d.request=l;g.ajaxify(event.getRawEvent(),a,l,b,null)}else g.link(event.getRawEvent(),f,b,c);e&&i.add(a)})}),null);
__d("MUFICommentLikeLink",["DOM","MLiveData","MUFIReactionsUtils","MUFIRequest","Stratcom","Style","SubscriptionsHandler","UFIReactionTypes"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n){__p&&__p();function a(a){"use strict";this.likeLink=a.likeLink,this.requestID=a.requestID,this.feedbackTargetID=a.feedbackTargetID,this.feedbackTarget=h.get(a.feedbackTargetID),this.subscriptions=new m(),this.subscriptions.addSubscriptions(g.listen(this.likeLink,"click",null,this.onClick.bind(this)),this.feedbackTarget.listen("change",this.onChange.bind(this)),k.listen("m:page:unload",null,this.onUnload.bind(this))),this.likeLink.href&&(this.likeLink.setAttribute("data-uri",this.likeLink.href),this.likeLink.removeAttribute("href"))}a.prototype.onChange=function(){"use strict";__p&&__p();if(this.feedbackTarget.getData().request_id===this.requestID)return;var a=this.feedbackTarget.getData();a=a.viewerreaction;a&&!n.reactions[a]&&(a=null);var b,c;!a?(b="",c=n.reactions[n.LIKE].display_name):(b=n.reactions[a].color,c=n.reactions[a].display_name);g.setContent(this.likeLink,c);l.set(this.likeLink,"color",b)};a.prototype.onClick=function(event){"use strict";__p&&__p();event.prevent();var a=this.feedbackTarget.getData(),b=a.has_viewer_liked,c=(a.comment_id||a.ft_ent_identifier).split("_")[1],d=b?n.NONE:n.LIKE,e=event.getNode("tag:a");e||(e=event.getNode("tag:div"));if(!e)return;k.hasSigil(this.likeLink,"kaios-like-react-trigger")&&b&&event.stop();b=j.getURI(e.getAttribute("href")||e.getAttribute("data-uri"));b.addQueryData("reaction_comment_id",c);b.addQueryData("viewer_reaction",d);j.send(this.feedbackTargetID,i.getReactionDataForComment(a,d),b)};a.prototype.onUnload=function(){"use strict";this.subscriptions&&this.subscriptions.release()};e.exports=a}),null);
__d("MUFICommentReactionBadge",["CSS","DOM","MLiveData","Stratcom","SubscriptionsHandler","UFIReactionIcons","UFIReactionTypes","createIxElement","cx"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){__p&&__p();var p=3,q=16,r=m.ordering.reduce(function(a,b,c){a[b]=c;return a},{});function a(a){"use strict";this.feedbackTarget=i.get(a.feedbackTargetID),this.reactionBadge=a.reactionBadge,this.requestID=a.requestID,this.subscriptions=new k(),this.subscriptions.addSubscriptions(this.feedbackTarget.listen("change",this.onChange.bind(this)),j.listen("m:page:unload",null,this.onUnload.bind(this)))}a.prototype.onChange=function(){"use strict";__p&&__p();if(this.feedbackTarget.getData().request_id===this.requestID)return;var a=this.feedbackTarget.getData(),b=a.reactioncountmap,c=m.ordering.filter(function(a){a=b[a];return a&&a["default"]>0}).sort(function(a,c){var d=b[a]["default"],e=b[c]["default"];return d===e?r[a]-r[c]:e-d}).slice(0,p).map(function(a,b){b=n(l[a][q]);a=h.create("span",{className:"_4edl"});h.appendContent(a,b);return a});g.conditionClass(this.reactionBadge,"_4edm",!!a.reactioncount);h.setContent(this.reactionBadge.firstChild,c);h.setContent(this.reactionBadge.lastChild,a.reactioncountreduced)};a.prototype.onUnload=function(){"use strict";this.subscriptions&&this.subscriptions.release()};e.exports=a}),null);
__d("MUFISutro",["CSS","cx"],(function(a,b,c,d,e,f,g,h){"use strict";a={commentRepliesExpanded:function(a){a=document.getElementById(a);a&&g.addClass(a,"_2a_l")}};e.exports=a}),null);
__d("MUfiNewCommentScroll",["DOM","MViewport","$","setTimeoutAcrossTransitions"],(function(a,b,c,d,e,f,g,h,i,j){__p&&__p();a=function(a){__p&&__p();var b=!0;if(!window.FW_ENABLED){var c=g.scry(document,"*","m-composer");b=c&&c.length<=1}if(b&&!!a.commentID){var d=i(a.commentID);j(function(){h.scrollToNode(d)},0)}};f.main=a}),null);
__d("debounceCore",["TimeSlice"],(function(a,b,c,d,e,f,g){__p&&__p();function a(a,b,c,d,e){__p&&__p();c===void 0&&(c=null);d===void 0&&(d=setTimeout);e===void 0&&(e=clearTimeout);var f;function h(){for(var e=arguments.length,i=new Array(e),j=0;j<e;j++)i[j]=arguments[j];h.reset();var k=g.guard(function(){f=null,a.apply(c,i)},"debounceCore");k.__SMmeta=a.__SMmeta;f=d(k,b)}h.reset=function(){e(f),f=null};h.isPending=function(){return f!=null};return h}e.exports=a}),null);
__d("CommentPrivacyValue",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({DEFAULT_PRIVACY:0,OWNER_OR_COMMENTER:1,FRIENDS_ONLY:2,FRIENDS_AND_POST_OWNER:3,SIDE_CONVERSATION:4,SIDE_CONVERSATION_AND_POST_OWNER:5,GRAPHQL_MULTIPLE_VALUE_HACK_DO_NOT_USE:-1})}),null);
__d("FRXDiglossiaQE",["Event","FRXDiglossiaExperiment","QE2Logger"],(function(a,b,c,d,e,f,g,h,i){var j="frx_diglossia_experiments",k={maybeExposeOnClick:function(a){g.listen(a,"click",function(a){k.maybeExpose()})},maybeExpose:function(){h.isEligibleForDiglossia&&k.expose()},expose:function(){i.logExposureForUser(j)}};e.exports=k}),null);