if (self.CavalryLogger) { CavalryLogger.start_js(["OipkK"]); }

__d("MStoriesProductionInfo",[],(function(a,b,c,d,e,f){"use strict";a={_uploadStatus:null,setUploadStatus:function(a){this._uploadStatus=a},getUploadStatus:function(){return this._uploadStatus}};e.exports=a}),null);
__d("MStoriesUploadStatus",[],(function(a,b,c,d,e,f){"use strict";e.exports=Object.freeze({IDLE:0,UPLOADING:1,FAILED:2})}),null);
__d("XMStoriesProductionPreviewController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/stories/preview/",{})}),null);
__d("MStoriesCreation",["Promise","Bootloader","MPageController","MStoriesProductionInfo","MStoriesUploadStatus","UserAgent","XMStoriesProductionPreviewController","fbt","nullthrows"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){__p&&__p();function p(a){return new g(function(b){var c=new FileReader();c.onload=function(event){return b(event.target.result)};c.readAsDataURL(a)})}q.getChosenImage=function(){"use strict";return q.$6?q.$6.$5():null};function q(a){"use strict";__p&&__p();this.$4=null;this.$7=function(a){a=j.getUploadStatus();if(a===k.UPLOADING){h.loadModules(["MStoriesToast"],function(a){a.showDefaultToast(n._("Uploading Story"))},"MStoriesCreation");return}j.setUploadStatus(k.IDLE);this.$3.click()}.bind(this);var b=null,c=0,d=l.isBrowser("Firefox")&&l.isPlatform("Android");this.$2=a.item;this.$3=a.input;q.$6=this;this.$5=function(){return{URI:b,rotate:c}};this.$2.addEventListener("click",this.$7,!0);this.$3&&this.$3.addEventListener("change",function(a){__p&&__p();a=a.target.files;var e=null;for(var f=0;f<a.length;f++)if(a[f].type.match(/^image\//)){e=a[f];break}e!==null&&h.loadModules(["ImageExifRotation","promiseDone"],function(a,f){a.getRotation(e,function(a){c=a,d?f(p(o(e)),function(a){b=a,this.$8()}.bind(this)):(b=URL.createObjectURL(o(e)),this.$8())}.bind(this))}.bind(this),"MStoriesCreation")}.bind(this))}q.prototype.$8=function(){"use strict";var a=m.getURIBuilder().getURI();i.load(a)};q.$6=null;e.exports=q}),null);
__d("MStoriesStratcomEvents",[],(function(a,b,c,d,e,f){"use strict";a={DELETE_BUCKET:"fb:stories:mobile:story:viewer:story:deleted",DELETE_THREAD:"fb:stories:mobile:story:viewer:delete:thread",MUTE_BUCKET:"fb:stories:mobile:story:viewer:story:muted",MEDIA_PAUSE:"m:stories:thread:media:pause",MEDIA_PAUSE_WITH_COVER:"m:stories:thread:media:pause:with:cover",MEDIA_PLAY:"m:stories:thread:media:play",NEXT_BUCKET:"fb:stories:mobile:story:viewer:nextBucket",NEXT_CARD:"fb:stories:mobile:story:viewer:nextCard",PREV_BUCKET:"fb:stories:mobile:story:viewer:prevBucket",THREAD_MODAL_HIDE:"m:stories:card:modal:hide",VIDEO_PLAY:"m:video:player:play",VIDEO_PLAYING:"m:video:player:playing",VIEWER_SHEET_HIDE:"m-stories-viewer-sheet-hide",PRODUCTION_PREVIEW_CONTROLS_HIDE:"m:stories:production:preview-controls:hide",PRODUCTION_PREVIEW_CONTROLS_SHOW:"m:stories:production:preview-controls:show",PRODUCTION_TEXT_CONTROLS_HIDE:"m:stories:production:text-controls:hide",PRODUCTION_TEXT_CONTROLS_SHOW:"m:stories:production:text-controls:show",PRODUCTION_TEXT_OVERLAY_REMOVE:"m:stories:production:text-overlay:remove",PRODUCTION_TEXT_OVERLAY_FOCUS:"m:stories:production:text-overlay:focus",SWIPE_LEFT:"m:stories:swipe:left",SWIPE_RIGHT:"m:stories:swipe:right",SWIPE_DOWN:"m:stories:swipe:down",SWIPE_UP:"m:stories:swipe:up",SWIPE_REPLY:"fb:stories:mobile:story:viewer:swipe:reply",TOAST_SHOWING:"m:stories:toast:showing",TOAST_HIDING:"m:stories:toast:hiding",UPLOAD_FAILED:"m:stories:upload:failed",UPLOAD_SUCCESS:"m:stories:upload:success",OVERLAY_INTERACTION_PAUSE:"m:stories:overlay-interaction:pause",OVERLAY_INTERACTION_PLAY:"m:stories:overlay-interaction:play",SET_BUCKET_IDS_USE_FOR_TESTING_ONLY:"m:stories:set-bucket-ids-use-for-testing-only"};e.exports=a}),null);
__d("MFBStoriesTraySigil",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({POG:"m-stories-tray-pog",POG_CONTAINER:"m-stories-tray-pog-container",POG_PICTURE:"m-stories-tray-pog-picture",ARCHIVE_LINK:"m-stories-tray-archive-link",TRAY_ITEM_PREVIEW:"m-stories-tray-item-preview",RECTANGULAR_ITEM_COUNT:"m-stories-rectangular-item-count",RECTANGULAR_ITEM_COUNT_ERROR:"m-stories-rectangular-item-count-error",RECTANGULAR_ITEM_ADDING_STORY_TITLE:"m-stories-rectangular-item-adding-story-title",RECTANGULAR_ITEM_STORY_ERROR_TITLE:"m-stories-rectangular-item-story-error-title",RECTANGULAR_ITEM_TITLE:"m-stories-rectangular-item-title"})}),null);
__d("MFBStoriesTrayType",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({CIRCULAR:"circular",FBLITE:"fblite",FBLITE_WITH_PROFILE_POG:"fblite_with_profile_pog",MOBILE_THREE_BY_ONE:"mobile_three_by_one"})}),null);
__d("MStoriesDOMUtils",["Bootloader","DOM"],(function(a,b,c,d,e,f,g,h){"use strict";__p&&__p();a={find:function(a,b,c){a=h.scry(a,b,c);if(a.length===0){g.loadModules(["FBLogger"],function(a){a("fbstories").mustfix("Failed to load dom element with tag %s and sigil %s",b,c||"")},"MStoriesDOMUtils");return null}return a[0]}};e.exports=a}),null);
__d("MStoriesGating",["gkx"],(function(a,b,c,d,e,f,g){"use strict";a={genShouldShowTextOverlays:function(){return g("676798")},genShouldShowStoriesEffects:function(){return g("676799")},shouldShowOptimisticPreviews:function(){return g("676800")}};e.exports=a}),null);
__d("MStoriesHideHeaderListener",["Bootloader","MArrays","MStoriesUIConstants","Stratcom","URI"],(function(a,b,c,d,e,f,g,h,i,j,k){"use strict";__p&&__p();var l="m:page:render:start";a={_hideHeaderListener:null,setup:function(){if(this._hideHeaderListener)return;this._hideHeaderListener=j.listen(l,null,function(a){a=new k(a.getData().path);a=a.getPath();h.findPrefix(i.HIDE_HEADER_URLS,a)&&(g.loadModules(["MStoriesDisplayUtils"],function(a){a.toggleChromeBar(!1)},"MStoriesHideHeaderListener"),j.removeCurrentListener(),this._hideHeaderListener=null)}.bind(this))}};e.exports=a}),null);
__d("MStoriesID",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({LOADING_SCREEN:"m-stories-viewer-thread-loading-spinner",PRIVACY_BLACKLIST_DIV:"m-stories-privacy-selector-blacklist",PRODUCTION_ADD_ITEM_DIV:"m-stories-add-item",PRODUCTION_ADD_ITEM_POG:"m-stories-add-item-pog",PRODUCTION_OWNER_ITEM_DIV:"m-stories-owner-bucket",PRODUCTION_OWNER_ITEM_POG:"m-stories-owner-bucket-pog",PRODUCTION_INPUT:"m-stories-production-input",PRODUCTION_ROOT:"m-stories-production-root",TRAY_DIV:"story_tray",PRODUCTION_COLOR_PICKER_PREFIX:"color-picker-",ARCHIVE_INTRO_DIALOG_BOX:"m-stories-archive-intro-dialog-box",PRODUCTION_EFFECTS_PREFIX:"effect-",VIEWER_ANCHOR:"m-stories-viewer-anchor",VIEWER_SHEET_ROOT:"m-stories-viewer-sheet-root"})}),null);
__d("MStoriesProductionTrayUtils",["CSS","MFBStoriesGatingConfig","MFBStoriesTraySigil","MFBStoriesTrayType","MStoriesDOMUtils","MStoriesID","MStoriesProductionInfo","MStoriesUploadStatus","cx"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o){"use strict";__p&&__p();var p={getAnimationPog:function(){var a=document.getElementById(l.PRODUCTION_OWNER_ITEM_POG);return a?a:document.getElementById(l.PRODUCTION_ADD_ITEM_POG)},getUploadingClass:function(){var a=h.trayType;return a===j.FBLITE||a===j.FBLITE_WITH_PROFILE_POG?"_6pvo":"_1zpf"},updateProductionPog:function(){__p&&__p();var a=m.getUploadStatus();if(a===n.UPLOADING){var b=p.getAnimationPog(),c=document.getElementById(l.PRODUCTION_ADD_ITEM_POG),d=document.getElementById(l.PRODUCTION_ADD_ITEM_DIV),e=document.getElementById(l.PRODUCTION_OWNER_ITEM_POG),f=p.getUploadingClass();b&&(g.addClass(b,f),b.id===l.PRODUCTION_OWNER_ITEM_POG?(c&&g.removeClass(c,f),d&&g.addClass(d,"disable")):(e&&g.removeClass(e,f),d&&g.removeClass(d,"disable")))}b=h.trayType;if(b!==j.CIRCULAR){c=document.getElementById(l.PRODUCTION_OWNER_ITEM_DIV);if(c){e=c.getAttribute("data-is-optimistic-item")!=null;f=a===n.UPLOADING||a===n.FAILED;e&&(f?g.removeClass(c,"hidden"):g.addClass(c,"hidden"))}this._updateProductionItemText()}this._updateErrorState()},_updateProductionItemText:function(){__p&&__p();var a=document.getElementById(l.PRODUCTION_OWNER_ITEM_DIV);if(!a)return;var b=k.find(a,"div",i.RECTANGULAR_ITEM_TITLE);a=k.find(a,"div",i.RECTANGULAR_ITEM_ADDING_STORY_TITLE);if(b&&a){var c=m.getUploadStatus();switch(c){case n.UPLOADING:g.addClass(b,"hidden");g.removeClass(a,"hidden");break;default:g.addClass(a,"hidden");g.removeClass(b,"hidden");break}}},_updateErrorState:function(){__p&&__p();var a=m.getUploadStatus(),b=h.trayType;switch(b){case j.FBLITE:case j.FBLITE_WITH_PROFILE_POG:b=document.getElementById(l.PRODUCTION_OWNER_ITEM_DIV);if(b!=null){var c=k.find(b,"div",i.RECTANGULAR_ITEM_COUNT);b=k.find(b,"div",i.RECTANGULAR_ITEM_COUNT_ERROR);c&&b&&(a===n.FAILED?(g.addClass(c,"hiddenByError"),g.removeClass(b,"hidden")):(g.removeClass(c,"hiddenByError"),g.addClass(b,"hidden")))}break;case j.MOBILE_THREE_BY_ONE:c=this.getAnimationPog();a===n.FAILED?g.addClass(c,"_6y1s"):g.removeClass(c,"_6y1s");break;default:b=this.getAnimationPog();b&&(a===n.FAILED?g.addClass(b,"_4ts1"):g.removeClass(b,"_4ts1"));break}}};e.exports=p}),null);
__d("MStoriesTrayInfo",[],(function(a,b,c,d,e,f){"use strict";a={_trayBucketIDs:[],_trayNeedsRefresh:!1,setTrayBucketIDs:function(a){this._trayBucketIDs=a.bucketIDs},getTrayBucketIDs:function(){return this._trayBucketIDs},setTrayNeedsRefresh:function(a){this._trayNeedsRefresh=a},getTrayNeedsRefresh:function(){return this._trayNeedsRefresh}};e.exports=a}),null);
__d("MStoriesTrayUIConstants",[],(function(a,b,c,d,e,f){"use strict";a={REDIRECT_DELAY_IN_MS:20};e.exports=a}),null);
__d("MStoriesTrayAsync",["Bootloader","CSS","DOM","MFBStoriesGatingConfig","MFBStoriesTraySigil","MFBStoriesTrayType","MPageController","MStoriesDOMUtils","MStoriesGating","MStoriesHideHeaderListener","MStoriesID","MStoriesProductionTrayUtils","MStoriesStratcomEvents","MStoriesTrayInfo","MStoriesTrayUIConstants","Run","Stratcom","cx","requireCond","cr:710451","MFBStoriesOptimisticTrayGatedModule"],(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z){__p&&__p();var A=b("MFBStoriesOptimisticTrayGatedModule").module,B="m:page:render:cache:complete-with-replays";a={_currentItemLoading:null,_listeners:[],_spinner:null,updateSpinner:function(a){__p&&__p();this._spinner=a.spinner,this._listeners.length===0&&(this._listeners=[w.listen(B,null,function(){if(!t.getTrayNeedsRefresh())return;g.loadModules(["MStoriesTrayUtils"],function(a){a.refreshTray()},"MStoriesTrayAsync")}),w.listen("click",k.ARCHIVE_LINK,this._openArchive),w.listen("click",k.POG_CONTAINER,function(a){__p&&__p();this._currentItemLoading&&this._setLoadingStateHidden(this._currentItemLoading,!0);var b=a.getNode(k.POG_CONTAINER);if(!b)return;b.id===q.PRODUCTION_OWNER_ITEM_DIV?g.loadModules(["MStoriesProductionTrayAsync"],function(a){if(!b)return;if(a.handleFailedAddToStoryPogSelected())return;this._openViewer(b)}.bind(this),"MStoriesTrayAsync"):this._openViewer(b)}.bind(this)),w.listen(s.UPLOAD_SUCCESS,null,function(a){a=a.getData()||{};A&&A.handleUploadSuccess(a.newThreadID,a.optimisticThreadID)})]),p.setup(),A&&A.initializeOnTrayLoad(),r.updateProductionPog(),v.onLeave(function(){this._destroy()}.bind(this))},_openArchive:function(event){var a=event.getNode(k.ARCHIVE_LINK);if(a!=null){var b=a.getAttribute("data-href");b&&setTimeout(function(){m.load(b,{hideLoadingIndicator:!1})})}},_setLoadingStateHidden:function(a,b){__p&&__p();var c=j.trayType,d=b?h.removeClass:h.addClass;switch(c){case l.CIRCULAR:d(a,"loading");break;case l.FBLITE:case l.FBLITE_WITH_PROFILE_POG:d(a,"_6pvo");break;case l.MOBILE_THREE_BY_ONE:c=n.find(a,"div",k.POG);if(c){if(b&&c.id===q.PRODUCTION_OWNER_ITEM_POG)return;d(c,"_1zpf")}break}},_openViewer:function(a){__p&&__p();this._currentItemLoading=a;var b=j.trayType;b=b!==l.CIRCULAR;if(!b){b=n.find(a,"i",k.POG_PICTURE);b!==null&&i.insertAfter(b,this._spinner)}var c=a.getAttribute("data-href");o.shouldShowOptimisticPreviews()&&a.id===q.PRODUCTION_OWNER_ITEM_DIV&&A&&(c=A.getURI(a));c&&(this._setLoadingStateHidden(a,!1),setTimeout(function(){m.load(c,{hideLoadingIndicator:!0})},u.REDIRECT_DELAY_IN_MS))},_destroy:function(){var a=r.getAnimationPog();a&&h.removeClass(a,r.getUploadingClass());this._listeners.forEach(function(a){return a.remove()});this._listeners=[]}};e.exports=a}),null);
__d("MFeedRefresh",["MHome","MPageController","Stratcom","setTimeoutAcrossTransitions"],(function(a,b,c,d,e,f,g,h,i,j){"use strict";__p&&__p();var k="/home.php",l=!1,m=null,n=null;function o(a){a===void 0&&(a=k),h.forceLoad(a)}function p(){m&&(clearTimeout(m),m=null)}function q(){p();var a=g.isHome();if(!a)return;m=j(function(){g.isHome()&&(p(),o())},n)}function r(a){if(a<=0)return;n=a*60*1e3;i.listen("history:change",null,q);i.listen("history:change-default",null,q);q()}a={init:function(a){if(l)return;r(a.intervalMinutes);l=!0},reloadFeed:o};e.exports=a}),null);
__d("MOnReload",["Event","MHome","MViewport"],(function(a,b,c,d,e,f,g,h,i){"use strict";e.exports={init:function(){g.listen(window,"beforeunload",function(){h.isHome()&&i.scrollToTop()})}}}),null);
__d("Time",[],(function(a,b,c,d,e,f){a={getGMTOffset:function(a){var b=new Date(),c=b.getTimezoneOffset()/30;b=b.getTime()/1e3;a=Math.round((a-b)/1800);b=Math.round(c+a)%48;b>24?b-=Math.ceil(b/48)*48:b<-28&&(b+=Math.ceil(b/-48)*48);return b*30}};e.exports=a}),null);
__d("TimezoneAutoset",["MRequest","Time"],(function(a,b,c,d,e,f,g,h){__p&&__p();var i;a=function(a){if(i)return;i=!0;if(!a.time||a.offset===void 0)return;var b=-h.getGMTOffset(a.time);(a.forceUpdate||b!=a.offset)&&new g(a.uri).setMethod("POST").setData({offset:b,is_forced:a.forceUpdate}).send()};f.main=a}),null);