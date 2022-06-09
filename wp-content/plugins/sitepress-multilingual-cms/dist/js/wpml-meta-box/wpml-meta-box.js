var WPMLMetaBox=function(t){var e={};function n(r){if(e[r])return e[r].exports;var u=e[r]={i:r,l:!1,exports:{}};return t[r].call(u.exports,u,u.exports,n),u.l=!0,u.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var u in t)n.d(r,u,function(e){return t[e]}.bind(null,u));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=2)}([function(t,e){t.exports=function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}},function(t,e){function n(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}t.exports=function(t,e,r){return e&&n(t.prototype,e),r&&n(t,r),t}},function(t,e,n){t.exports=n(3)},function(t,e,n){"use strict";n.r(e),n.d(e,"refresh",(function(){return b}));var r=n(0),u=n.n(r),i=n(1),a=n.n(i);function o(t){return null!=t&&"object"==typeof t&&!0===t["@@functional/placeholder"]}function c(t){return function e(n){return 0===arguments.length||o(n)?e:t.apply(this,arguments)}}function s(t){return function e(n,r){switch(arguments.length){case 0:return e;case 1:return o(n)?e:c((function(e){return t(n,e)}));default:return o(n)&&o(r)?e:o(n)?c((function(e){return t(e,r)})):o(r)?c((function(e){return t(n,e)})):t(n,r)}}}var l=Array.isArray||function(t){return null!=t&&t.length>=0&&"[object Array]"===Object.prototype.toString.call(t)};var f=c((function(t){return!!l(t)||!!t&&("object"==typeof t&&(!function(t){return"[object String]"===Object.prototype.toString.call(t)}(t)&&(1===t.nodeType?!!t.length:0===t.length||t.length>0&&(t.hasOwnProperty(0)&&t.hasOwnProperty(t.length-1)))))})),p=function(){function t(t){this.f=t}return t.prototype["@@transducer/init"]=function(){throw new Error("init not implemented on XWrap")},t.prototype["@@transducer/result"]=function(t){return t},t.prototype["@@transducer/step"]=function(t,e){return this.f(t,e)},t}();var d=s((function(t,e){return function(t,e){switch(t){case 0:return function(){return e.apply(this,arguments)};case 1:return function(t){return e.apply(this,arguments)};case 2:return function(t,n){return e.apply(this,arguments)};case 3:return function(t,n,r){return e.apply(this,arguments)};case 4:return function(t,n,r,u){return e.apply(this,arguments)};case 5:return function(t,n,r,u,i){return e.apply(this,arguments)};case 6:return function(t,n,r,u,i,a){return e.apply(this,arguments)};case 7:return function(t,n,r,u,i,a,o){return e.apply(this,arguments)};case 8:return function(t,n,r,u,i,a,o,c){return e.apply(this,arguments)};case 9:return function(t,n,r,u,i,a,o,c,s){return e.apply(this,arguments)};case 10:return function(t,n,r,u,i,a,o,c,s,l){return e.apply(this,arguments)};default:throw new Error("First argument to _arity must be a non-negative integer no greater than ten")}}(t.length,(function(){return t.apply(e,arguments)}))}));function h(t,e,n){for(var r=n.next();!r.done;){if((e=t["@@transducer/step"](e,r.value))&&e["@@transducer/reduced"]){e=e["@@transducer/value"];break}r=n.next()}return t["@@transducer/result"](e)}function y(t,e,n,r){return t["@@transducer/result"](n[r](d(t["@@transducer/step"],t),e))}var g="undefined"!=typeof Symbol?Symbol.iterator:"@@iterator";function m(t,e,n){if("function"==typeof t&&(t=function(t){return new p(t)}(t)),f(n))return function(t,e,n){for(var r=0,u=n.length;r<u;){if((e=t["@@transducer/step"](e,n[r]))&&e["@@transducer/reduced"]){e=e["@@transducer/value"];break}r+=1}return t["@@transducer/result"](e)}(t,e,n);if("function"==typeof n["fantasy-land/reduce"])return y(t,e,n,"fantasy-land/reduce");if(null!=n[g])return h(t,e,n[g]());if("function"==typeof n.next)return h(t,e,n);if("function"==typeof n.reduce)return y(t,e,n,"reduce");throw new TypeError("reduce: list must be array or iterable")}function v(t,e){return Object.prototype.hasOwnProperty.call(e,t)}var b,w,k=Object.prototype.toString,j=function(){return"[object Arguments]"===k.call(arguments)?function(t){return"[object Arguments]"===k.call(t)}:function(t){return v("callee",t)}}(),_=!{toString:null}.propertyIsEnumerable("toString"),x=["constructor","valueOf","isPrototypeOf","toString","propertyIsEnumerable","hasOwnProperty","toLocaleString"],S=function(){return arguments.propertyIsEnumerable("length")}(),B=function(t,e){for(var n=0;n<t.length;){if(t[n]===e)return!0;n+=1}return!1},O="function"!=typeof Object.keys||S?c((function(t){if(Object(t)!==t)return[];var e,n,r=[],u=S&&j(t);for(e in t)!v(e,t)||u&&"length"===e||(r[r.length]=e);if(_)for(n=x.length-1;n>=0;)v(e=x[n],t)&&!B(r,e)&&(r[r.length]=e),n-=1;return r})):c((function(t){return Object(t)!==t?[]:Object.keys(t)})),I=s((function(t,e){return m((function(n,r){return n[r]=t(e[r],r,e),n}),{},O(e))})),D=function(){function t(e,n){u()(this,t),this.wpData=e,this.ajax=n,this.lastIsSaving=!1,this.duplicate=null}return a()(t,[{key:"init",value:function(t){var e=this;this.duplicate=t,this.wpData&&this.wpData.subscribe((function(){return e.refreshOnSavingMetaBoxes()}))}},{key:"isSavingMetaBoxes",value:function(){return!!this.wpData.select("core/edit-post")&&this.wpData.select("core/edit-post").isSavingMetaBoxes()}},{key:"refreshOnSavingMetaBoxes",value:function(){var t=this.isSavingMetaBoxes();t===this.lastIsSaving||t||(this.refreshMetaBox(),this.refreshAdminLanguageSwitcher()),this.lastIsSaving=t}},{key:"refreshMetaBox",value:function(){var t=this,e=document.getElementById("icl_document_language_dropdown");if(e){var n={post_id:document.getElementById("post_ID").value,action:"wpml_get_meta_boxes_html",nonce:e.getAttribute("data-metabox-refresh-nonce")};this.ajax.post(n,"form").then((function(e){Array.from(document.getElementById("icl_div").children).forEach((function(t,n){t.classList.contains("inside")&&(document.getElementById("icl_div").children[n].innerHTML=e)})),t.duplicate.init(),document.dispatchEvent(new Event("WPMLLanguagesMetaBoxesRefreshed"))}))}}},{key:"refreshAdminLanguageSwitcher",value:function(){var t=document.getElementById("icl_document_language_dropdown");if(t){var e=function(t,e){var n=document.getElementById("wp-admin-bar-WPML_ALS_"+e);n&&n.getElementsByTagName("a")[0].setAttribute("href",t.url)},n={post_id:document.getElementById("post_ID").value,action:"wpml_get_admin_ls_links",nonce:t.getAttribute("data-admin-ls-refresh-nonce")};this.ajax.post(n,"form").then((function(t){return I(e,JSON.parse(t).data)}))}}}]),t}(),E=function(){function t(e,n){u()(this,t),this.refresh=e,this.ajax=n}return a()(t,[{key:"init",value:function(){var t=this,e=document.querySelector("#icl_translate_options");if(e){this.dupesInputs=e.querySelectorAll('input[name="icl_dupes[]"]');for(var n=0;n<this.dupesInputs.length;n++)this.dupesInputs[n].onchange=function(){return t.duplicateClickHandler()};this.makeDuplicatesButton=document.querySelector("#icl_make_duplicates"),this.makeDuplicatesButton&&(this.makeDuplicatesButton.onclick=function(){return t.makeDuplicateClickHandler()})}}},{key:"duplicateClickHandler",value:function(){this.getCheckedLangs().length>0?(this.makeDuplicatesButton.style.display="block",this.makeDuplicatesButton.disabled=!1):(this.makeDuplicatesButton.style.display="none",this.makeDuplicatesButton.disabled=!0)}},{key:"makeDuplicateClickHandler",value:function(){var t=this,e={action:this.makeDuplicatesButton.dataset.action,nonce:this.makeDuplicatesButton.dataset.nonce,post_id:this.makeDuplicatesButton.dataset.postId,langs:this.getCheckedLangs().join(",")};this.makeDuplicatesButton.insertAdjacentHTML("afterend",icl_ajxloaderimg),this.ajax.post(e,"form").then((function(){t.refresh.refreshMetaBox(),t.refresh.refreshAdminLanguageSwitcher()}))}},{key:"getCheckedLangs",value:function(){for(var t=[],e=0;e<this.dupesInputs.length;e++)this.dupesInputs[e].checked&&t.push(this.dupesInputs[e].value);return t}}]),t}(),M=function(){function t(e){u()(this,t),this.ajaxUrl=e}return a()(t,[{key:"post",value:function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"json",n="",r=null,u=new URL(this.ajaxUrl,document.location);switch(e){case"json":n="application/json";break;case"form":n="application/x-www-form-urlencoded; charset=utf-8"}return u.searchParams.toString()?Object.keys(t).map((function(e){return u.searchParams.append(e,t[e])})):r=Object.keys(t).map((function(e){return e+"="+t[e]})).join("&"),fetch(u,{method:"POST",body:r,headers:{"Content-Type":n},credentials:"same-origin"}).then((function(t){if(t.ok)switch(e){case"json":return t.json();case"form":return t.text();default:return t}throw new Error("Invalid Request")})).catch((function(t){console.log("There has been a problem with your fetch operation: ",t.message)}))}}]),t}();window.addEventListener("DOMContentLoaded",(function(){b=new D(wp.data,new M(ajaxurl)),(w=new E(b,new M(ajaxurl))).init(),b.init(w)}))}]);