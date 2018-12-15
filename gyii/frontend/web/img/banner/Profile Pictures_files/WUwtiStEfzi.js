if (self.CavalryLogger) { CavalryLogger.start_js(["c4kM6"]); }

__d("MStoriesDisplayUtils",["CSS","DOM","MStoriesID","cx"],(function(a,b,c,d,e,f,g,h,i,j){"use strict";var k={toggleChromeBar:function(a,b){b||(b=document.getElementsByClassName("_129-")[0]),b&&(a?h.show(b):h.hide(b)),k.toggleSoftKeyTray(a)},toggleSoftKeyTray:function(a){var b=document.getElementById("kaios_tray");b&&(a?h.show(b):h.hide(b))},toggleLoadingScreen:function(a,b){var c=document.getElementById(i.LOADING_SCREEN);c&&(a?(g.removeClass(c,"hidden_elem"),b&&g.addClass(c,"full_loading_screen")):(g.addClass(c,"hidden_elem"),b&&g.removeClass(c,"full_loading_screen")))}};e.exports=k}),null);
__d("FBKeyframesProject",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({ADS_ANIMATOR:"ads_animator",AWESOME_TEXT_POSTS:"awesome_text_posts",AWESOME_TEXT_STORIES:"awesome_text_stories",BALLOT:"ballot",CIVIC_PROPOSAL:"civic_proposal",CULTURAL_MOMENTS_QP:"cultural_moments_qp",CULTURAL_MOMENTS_QP_TOOL:"cultural_moments_qp_tool",DIGITAL_LITERACY:"digital_literacy",ELECTION_PHOTO_FORWARD:"election_photo_forward",FACEBOOK_STORIES:"facebook_stories",FEEDBACK_REACTIONS:"feedback_reactions",FUN_FACTS:"fun_facts",FUNDRAISER:"fundraiser",GOODWILL_AR_BIRTHDAY:"goodwill_ar_birthday",GOODWILL_MC:"goodwill_mc",ILLUSTRATION_KIT_TEMPLATE:"illustration_kit_template",KEYFRAMES_UICE:"keyframes_uice",KEYFRAMES_UNIT_TEST:"keyframes_unit_test",LIFE_EVENTS:"life_events",MESSAGING_REACTIONS:"messaging_reactions",MLE_REACTIONS:"mle_reactions",NT_EXAMPLES:"nt_examples",PAGE_SURFACE:"page_surface",PIXELCLOUD:"pixelcloud",PRIVACY_BASICS:"privacy_basics",RECRUITING_DELIGHT:"recruiting_delight",SOCIAL_PLAYER:"social_player",TEXT_DELIGHTS:"text_delights",TIME_IN_APP:"time_in_app",VIDEO_HOME_SOCIAL_GLYPH:"video_home_social_glyph",VOTER_REGISTRATION_DRIVE:"voter_registration_drive",YOUTH_PORTAL:"youth_portal"})}),null);
__d("once",[],(function(a,b,c,d,e,f){"use strict";__p&&__p();function a(a){var b=g(a);for(var c in a)Object.prototype.hasOwnProperty.call(a,c)&&(b[c]=a[c]);return b}function g(a){__p&&__p();var b=a,c;a=function(){if(b){for(var a=arguments.length,d=new Array(a),e=0;e<a;e++)d[e]=arguments[e];c=b.apply(this,d);b=null}return c};return a}e.exports=a}),null);
__d("MStoriesToast",["CSS","DOM","FBKeyframesProject","FBLogger","Keyframes","MStoriesStratcomEvents","Run","Stratcom","cx","fbt","promiseDone"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q){"use strict";__p&&__p();var r=1e3,s=500;function t(){this.$2=[],this.$4=function(){this.$1&&(h.remove(this.$1),this.$1=null),this.$2=[],t.$3=null}.bind(this),m.onLeave(this.$4)}t.getInstance=function(){this.$3||(this.$3=new t());return this.$3};t.prototype.showToast=function(a,b,c){__p&&__p();this.$1&&(this.$2.forEach(function(a){return clearTimeout(a)}),h.remove(this.$1),this.$1=null);c&&n.invoke(l.MEDIA_PAUSE_WITH_COVER,null);this.$1=h.create("div",null,a);a=b===null||b===void 0?r:b;n.invoke(l.TOAST_SHOWING,null);h.appendContent(document.body,this.$1);this.$2=[setTimeout(function(){this.$1&&g.addClass(this.$1,"_1ufk")}.bind(this),a),setTimeout(function(){h.remove(this.$1),c&&n.invoke(l.THREAD_MODAL_HIDE,null),n.invoke(l.TOAST_HIDING,null),this.$1=null}.bind(this),a+s)]};t.showDefaultToast=function(a,b){a=h.create("div",{className:"_3fcy"},a);a=h.create("div",{className:"_30l6 bottom"},a);t.getInstance().showToast(a,b)};t.showReplySentSuccessToast=function(a,b){b===void 0&&(b=!0);var c=null;a?c=h.create("div",{className:"_30l3"},a):c=h.create("div",{className:"_30l4"});a=h.create("div",{className:"_30l5"},p._("Reply Sent"));c=h.create("div",{className:"_30l6"},[c,a]);t.getInstance().showToast(c,r,b)};t.showReactionSentSuccessToast=function(a,b){var c=h.create("div",{className:"_6kiw"});n.invoke(l.MEDIA_PAUSE_WITH_COVER,null);n.invoke(l.TOAST_SHOWING,null);q(k.requestRenderer(a,{projectName:i.FACEBOOK_STORIES,assetName:b}),function(a){h.appendContent(document.body,c),h.appendContent(c,a.getElement()),a.play(),setTimeout(function(){h.remove(c),n.invoke(l.TOAST_HIDING,null),n.invoke(l.THREAD_MODAL_HIDE,null)},s)},function(a){j("fb_stories_web").catching(a).warn("Cannot load mtouch reaction animation")})};t.showReplySentFailedToast=function(){var a=h.create("div",{className:"_30l7"}),b=h.create("div",{className:"_30l5"},p._("Sent Failed"));a=h.create("div",{className:"_30l6"},[a,b]);t.getInstance().showToast(a,r)};e.exports=t}),null);
__d("XGraphQLBatchAPIController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/api/graphqlbatch/",{queries:{type:"String"},batch_name:{type:"String"},scheduler:{type:"Enum",enumType:1},shared_params:{type:"String"},fb_api_req_friendly_name:{type:"String"},uft_request_id:{type:"String"}})}),null);
__d("WebGraphQL-core",["ActorURI","Deferred","FBLogger","WebGraphQLConfig","XGraphQLBatchAPIController","XHRRequest","createChunkedResponseParser","getAsyncParams","getSameOriginTransport"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){"use strict";__p&&__p();function p(a){__p&&__p();var b=a.getURIBuilder().getURI(),c={exec:function(a,b){return c.execAll([a],b)[0]},execAll:function(a,c){__p&&__p();var d={},e={};a=a.map(function(a,b){b="o"+b;d[b]={doc_id:a.__getDocID(),query_params:a.__getVariables()};a=new h();e[b]=a;return a.getPromise()});var f=babelHelpers["extends"]({},n("POST"));c&&c.actorID!=null&&(f[g.PARAMETER_ACTOR]=c.actorID);c=c&&c.batchName?{batch_name:c.batchName}:{};c=new l(b).setMethod("POST").setTransportBuilder(o).setRequestHeader("Content-Type","application/x-www-form-urlencoded").setData(babelHelpers["extends"]({},c,f,{queries:JSON.stringify(d)})).setResponseHandler(m(function(a,b,c){__p&&__p();try{var d=JSON.parse(a);Object.keys(d).forEach(function(a){var b=e[a];if(b){a=d[a];a.errors?b.reject(a):a.data?b.resolve(a.data):b.reject({data:{},errors:[{message:"Unexpected response received from server.",severity:"CRITICAL",response:a}]})}})}catch(b){i("webgraphql").catching(b).mustfix("Bad response: %s%s",a.substr(0,250),a.length>250?"[truncated]":"")}c&&Object.keys(e).forEach(function(a){e[a].isSettled()||e[a].reject({data:{},errors:[{message:"No response received from server.",severity:"CRITICAL"}]})})})).setTimeout(j.timeout).setTimeoutHandler(function(){Object.keys(e).forEach(function(a){e[a].isSettled()||e[a].reject({data:{},errors:[{message:"Request timed out.",severity:"CRITICAL"}]})})}).setErrorHandler(function(a){Object.keys(e).forEach(function(b){e[b].isSettled()||e[b].reject({data:{},errors:[{message:a&&a.message||"Transport error.",severity:"CRITICAL",error:a}]})}),a instanceof Error?i("webgraphql").catching(a).mustfix("WebGraphQL error"):i("webgraphql").mustfix("Unknown WebGraphQL error")});c.send();return a},__forController:p};return c}e.exports=p(k)}),null);
__d("WebGraphQL",["WebGraphQL-core"],(function(a,b,c,d,e,f){e.exports=b("WebGraphQL-core")}),null);
__d("XFBStoriesArchiveViewerController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/stories/archive/viewer/",{card_id:{type:"FBID",required:!0}})}),null);
__d("XMStoriesSettingsController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/stories/settings/",{})}),null);
__d("XWebGraphQLMutationController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/webgraphql/mutation/",{query_id:{type:"FBID"},variables:{type:"String"},doc_id:{type:"FBID"}})}),null);
__d("MFBStoriesSigil",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({EMPTY_BUCKET_CONFIRM_BUTTON:"m-stories-empty-bucket-confirm",EMPTY_BUCKET_CONFIRM_BACKWARDS_BUTTON:"m-stories-empty-bucket-confirm-backwards",SETTINGS_BACK_BUTTON:"m-stories-settings-back-button",PRIVACY_SELECTOR:"m-stories-privacy-selector",PRIVACY_SELECTOR_CHANGE_FAILED_CONFIRM_BUTTON:"m-stories-privacy-selector-change-failed-confirm",PRIVACY_SELECTOR_CHANGE_CANCEL_BUTTON:"m-stories-privacy-selector-change-cancel",PRIVACY_SELECTOR_CHANGE_CONFIRM_BUTTON:"m-stories-privacy-selector-change-confirm",MUTED_STORIES_BACK_BUTTON:"m-stories-muted-stories-back-button",MUTED_STORIES_MUTE_BUTTON:"m-stories-muted-stories-mute-button",MUTED_STORIES_UNMUTE_BUTTON:"m-stories-muted-stories-unmute-button",STORIES_ARCHIVE_BACK_BUTTON:"m-stories-archive-back-button",STORIES_ARCHIVE_SETTINGS_BUTTON:"m-stories-archive-settings-button",STORIES_ARCHIVE_TOGGLE_MODE_BUTTON:"m-stories-archive-toggle-mode-button",VIEWER_CLOSE_STORY_BUTTON:"m-stories-close-story-button",VIEWER_DELETE_THREAD_CANCEL:"m-stories-delete-cancel",VIEWER_DELETE_THREAD_CONFIRM:"m-stories-delete-confirm",VIEWER_MUTE_BUCKET_CANCEL:"m-stories-mute-cancel",VIEWER_MUTE_BUCKET_CONFIRM:"m-stories-mute-confirm",VIEWER_NEXT_BUCKET_BUTTON:"m-stories-next-button",VIEWER_OPTIONS_BUTTON:"m-stories-options",VIEWER_OPTION_MENU:"m-stories-option-menu",VIEWER_OPTION_MENU_DELETE_THREAD:"m-stories-option-delete",VIEWER_OPTION_MENU_MUTE:"m-stories-option-mute",VIEWER_OPTION_MENU_REPORT:"m-stories-option-report",VIEWER_OPTION_MENU_STORY_SETTINGS:"m-stories-option-story-settings",VIEWER_PREV_BUCKET_BUTTON:"m-stories-prev-button",VIEWER_SEEN_SUMMARY_ANCHOR:"m-stories-viewer-seen-summary-anchor",VIEWER_REPLY_EMOJI:"m-stories-reply-emoji-li",VIEWER_REPLY_INPUT:"m-stories-reply-input",VIEWER_REPLY_REACTION:"m-stories-reply-reaction-li",VIEWER_REPLY_SEND_BUTTON:"m-stories-reply-send-button",VIEWER_RESHARE_BUTTON:"m-stories-reshare-buttton",VIEWER_THREAD_MEDIA:"m-stories-thread-media",VIEWER_ADD_STORY_BUTTON:"m-stories-viewer-add-story-button",PRODUCTION_CLOSE_PREVIEW_BUTTON:"m-stories-production-close-preview-button",PRODUCTION_SHARE_BUTTON:"m-stories-production-share-button",PRODUCTION_PREVIEW_STORY_SETTINGS:"m-stories-production-preview-setting",PRODUCTION_ADD_TEXT_BUTTON:"m-stories-production-add-text-button",PRODUCTION_TEXT_EDIT_FIELD:"m-stories-production-text-edit-field",PRODUCTION_PREVIEW_CONTROLS_CONTAINER:"m-stories-production-preview-controls-container",PRODUCTION_TEXT_OVERLAY_CONTROLS_CONTAINER:"m-stories-production-text-overlay-controls-container",PRODUCTION_TEXT_OVERLAY:"m-stories-production-text-overlay",PRODUCTION_REMOVE_OVERLAY_ICON:"m-stories-production-remove-overlay-icon",PRODUCTION_ADD_TEXT_BUTTON_LABEL:"m-stories-production-add-text-button-label",PRODUCTION_ALIGN_TEXT_BUTTON:"m-stories-production-align-text-button",PRODUCTION_TEXT_HIGHLIGHT_BUTTON:"m-stories-production-text-highlight-button",PRODUCTION_COLOR_PICKER:"m-stories-production-color-picker",ARCHIVE_CARD:"m-stories-archive-card",PRODUCTION_EFFECTS_BUTTON:"m-stories-production-effects-button",PRODUCTION_EFFECTS_CONTROLS:"m-stories-production-effects-controls",PRODUCTION_EFFECTS_TRAY:"m-stories-production-effects-tray",ARCHIVE_INTRO_DIALOG_CONFIRM:"m-stories-archive-intro-dialog-confirm",ARCHIVE_INTRO_DIALOG_SETTING:"m-stories-archive-intro-dialog-setting",ARCHIVE_SETTING_BACK_BUTTON:"m-stories-archive-setting-back-button"})}),null);
__d("WebGraphQLLegacyHelper",["invariant"],(function(a,b,c,d,e,f,g){"use strict";e.exports={getURI:function(a){var b=a.controller,c=a.docID,d=a.queryID;a=a.variables;c!=d&&(c||d)!=null||g(0,5819,c,d);b=b.getURIBuilder();d?b.setFBID("query_id",d):b.setFBID("doc_id",c);a&&b.setString("variables",JSON.stringify(a));return b.getURI()}}}),null);
__d("base62",[],(function(a,b,c,d,e,f){"use strict";__p&&__p();var g="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";function a(a){if(!a)return"0";var b="";while(a>0)b=g[a%62]+b,a=Math.floor(a/62);return b}e.exports=a}),null);
__d("WebGraphQLMutationBase",["CurrentUser","WebGraphQLLegacyHelper","XWebGraphQLMutationController","base62","invariant"],(function(a,b,c,d,e,f,g,h,i,j,k){"use strict";__p&&__p();var l=0;function a(a){this.$1=a}a.prototype.__getVariables=function(){return this.$1};a.prototype.__getDocID=function(){return this.constructor.__getDocID()};a.__getController=function(){return i};a.__getDocID=function(){k(0,1804)};a.getURI=function(a){return h.getURI({controller:this.__getController(),docID:this.__getDocID(),variables:{data:babelHelpers["extends"]({client_mutation_id:j(l++),actor_id:g.getID()},a)}})};e.exports=a}),null);