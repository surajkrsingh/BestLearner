!function(n){var i={};function o(t){if(i[t])return i[t].exports;var e=i[t]={i:t,l:!1,exports:{}};return n[t].call(e.exports,e,e.exports,o),e.l=!0,e.exports}o.m=n,o.c=i,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)o.d(n,i,function(t){return e[t]}.bind(null,i));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="",o(o.s=2)}([function(t,e,n){"use strict";var i=n(1),o=n.n(i),a={init:function(){this.loadWebFonts()},loadWebFonts:function(){o.a.load({google:{families:["Open Sans:300,400,700"]}})}},r={init:function(){this.setProps()},setProps:function(){var t=$(".bestlearner-back-to-top");$(window).scroll(function(){10<$(this).scrollTop()?t.fadeIn():t.fadeOut()}),t.click(function(){$("body, html").animate({scrollTop:0},500)}),$(document).ready(function(){$(window).scroll(function(){var t=$(document).scrollTop(),e=$(document).height()-$(window).height();$("#progressbar").attr("max",e),$("#progressbar").attr("value",t)})}),$(function(){!function(t){if(void 0!==t&&600<=$(window).width()){var e=t.offset().top,n=$(window);n.on("scroll",function(){n.scrollTop()>=e?t.addClass("sticky-header"):t.removeClass("sticky-header")})}}($(".header__bottom-header"))}),$(".open").on("click",function(){$(".model").addClass("active")}),$(".close-icon").on("click",function(){$(".model").removeClass("active")}),$("#menu-open").on("click",function(){var t=$(this).data("clicks");t?$(".header__bottom-header").removeClass("active"):$(".header__bottom-header").addClass("active"),$(this).data("clicks",!t)}),$("ul.menu-list li.menu-list__item a").each(function(t){window.location.href.includes($("ul.menu-list li.menu-list__item a")[t].href)&&($("ul.menu-list li.menu-list__item a").removeClass("menu-item-active"),$(this).addClass("menu-item-active"))});var e=jQuery(".menu-list__item").children()[0];function o(t){var e=100/document.getElementsByTagName("*").length;if($(t).on()){var n=Number(jQuery("#progress-holder").val())+e;jQuery("#progress-holder").val(n),jQuery("#progress").animate({width:n+"%"},10,function(){"100%"==document.getElementById("progress").style.width&&jQuery("#progress").fadeOut("slow")})}else o(t)}0!==e.lenght&&"home"===e.text.toLowerCase()&&(e.setAttribute("style","font-size:20px;padding:14px 15px;"),e.innerHTML='<i class="fa fa-home" aria-hidden="true"></i>'),document.onreadystatechange=function(t){if("interactive"===document.readyState)for(var e=document.getElementsByTagName("*"),n=0,i=e.length;n<i;n++)o(e[n])}}},s={init:function(){this.setProps()},setProps:function(){jQuery("#bl_subscribe_submit_button").click(function(){var t=jQuery("#bl_subscribe_name").val(),e=jQuery("#bl_subscribe_email").val();return!(""===t||""===e||!/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(e))||(alert("Please enter correct info"),!1)}),jQuery("#save_suggested_article").click(function(){var t=jQuery("#bl_article_title").val(),e=jQuery("#bl_article_description").val(),n=jQuery("#bl_article_category").val();return""!==t&&""!==e&&""!==n||(alert("Please enter correct info"),!1)})}};function c(t,e){for(var n=0;n<e.length;n++){var i=e[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}var l=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,n,i;return e=t,(n=[{key:"init",value:function(){this.activeIndex=0,this.itemList=document.getElementById("primary-slider").getElementsByTagName("figure"),this.itemList[0].className="figure active",this.arrowButton=document.getElementsByClassName("arrow-icon"),this.length=this.itemList.length,this.eventHandlerForNext(),this.eventHandlerForPrev(),this.itemList&&this.arrowButton}},{key:"eventHandlerForNext",value:function(){this.arrowButton[1].addEventListener("click",this.nextSlide.bind(this))}},{key:"eventHandlerForPrev",value:function(){this.arrowButton[0].addEventListener("click",this.prevSlide.bind(this))}},{key:"prevSlide",value:function(){var t=Math.abs(this.activeIndex)%this.length,e=t-1;0===t?(e=this.length-1,this.activeIndex=e):this.activeIndex--,this.itemList[t].className="figure de-active",this.itemList[e].className="figure active fade"}},{key:"nextSlide",value:function(t){this.activeIndex++;var e=Math.abs(this.activeIndex)%this.length;if(this.itemList){var n=e-1;0===e&&(n=this.length-1),this.itemList[n].className="figure de-active fade",this.itemList[e].className="figure active fade"}}}])&&c(e.prototype,n),i&&c(e,i),t}());window.setInterval(function(){l.nextSlide()},5e3);var u=l;n.d(e,"a",function(){return a}),n.d(e,"c",function(){return r}),n.d(e,"b",function(){return s}),n.d(e,"d",function(){return u})},function(et,nt,it){var ot;!function(){function i(t,e,n){return t.call.apply(t.bind,arguments)}function o(e,n,t){if(!e)throw Error();if(2<arguments.length){var i=Array.prototype.slice.call(arguments,2);return function(){var t=Array.prototype.slice.call(arguments);return Array.prototype.unshift.apply(t,i),e.apply(n,t)}}return function(){return e.apply(n,arguments)}}function p(t,e,n){return(p=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?i:o).apply(null,arguments)}var s=Date.now||function(){return+new Date};function e(t,e){this.a=t,this.o=e||t,this.c=this.o.document}var c=!!window.FontFace;function l(t,e,n,i){if(e=t.c.createElement(e),n)for(var o in n)n.hasOwnProperty(o)&&("style"==o?e.style.cssText=n[o]:e.setAttribute(o,n[o]));return i&&e.appendChild(t.c.createTextNode(i)),e}function u(t,e,n){(t=t.c.getElementsByTagName(e)[0])||(t=document.documentElement),t.insertBefore(n,t.lastChild)}function n(t){t.parentNode&&t.parentNode.removeChild(t)}function v(t,e,n){e=e||[],n=n||[];for(var i=t.className.split(/\s+/),o=0;o<e.length;o+=1){for(var a=!1,r=0;r<i.length;r+=1)if(e[o]===i[r]){a=!0;break}a||i.push(e[o])}for(e=[],o=0;o<i.length;o+=1){for(a=!1,r=0;r<n.length;r+=1)if(i[o]===n[r]){a=!0;break}a||e.push(i[o])}t.className=e.join(" ").replace(/\s+/g," ").replace(/^\s+|\s+$/,"")}function a(t,e){for(var n=t.className.split(/\s+/),i=0,o=n.length;i<o;i++)if(n[i]==e)return!0;return!1}function f(t,e,n){function i(){r&&o&&(r(a),r=null)}e=l(t,"link",{rel:"stylesheet",href:e,media:"all"});var o=!1,a=null,r=n||null;c?(e.onload=function(){o=!0,i()},e.onerror=function(){o=!0,a=Error("Stylesheet failed to load"),i()}):setTimeout(function(){o=!0,i()},0),u(t,"head",e)}function h(t,e,n,i){var o=t.c.getElementsByTagName("head")[0];if(o){var a=l(t,"script",{src:e}),r=!1;return a.onload=a.onreadystatechange=function(){r||this.readyState&&"loaded"!=this.readyState&&"complete"!=this.readyState||(r=!0,n&&n(null),a.onload=a.onreadystatechange=null,"HEAD"==a.parentNode.tagName&&o.removeChild(a))},o.appendChild(a),setTimeout(function(){r||(r=!0,n&&n(Error("Script load timeout")))},i||5e3),a}return null}function d(){this.a=0,this.c=null}function g(t){return t.a++,function(){t.a--,r(t)}}function m(t,e){t.c=e,r(t)}function r(t){0==t.a&&t.c&&(t.c(),t.c=null)}function w(t){this.a=t||"-"}function y(t,e){this.c=t,this.f=4,this.a="n";var n=(e||"n4").match(/^([nio])([1-9])$/i);n&&(this.a=n[1],this.f=parseInt(n[2],10))}function b(t){var e=[];t=t.split(/,\s*/);for(var n=0;n<t.length;n++){var i=t[n].replace(/['"]/g,"");-1!=i.indexOf(" ")||/^\d/.test(i)?e.push("'"+i+"'"):e.push(i)}return e.join(",")}function _(t){return t.a+t.f}function j(t){var e="normal";return"o"===t.a?e="oblique":"i"===t.a&&(e="italic"),e}function x(t,e){this.c=t,this.f=t.o.document.documentElement,this.h=e,this.a=new w("-"),this.j=!1!==e.events,this.g=!1!==e.classes}function k(t){if(t.g){var e=a(t.f,t.a.c("wf","active")),n=[],i=[t.a.c("wf","loading")];e||n.push(t.a.c("wf","inactive")),v(t.f,n,i)}$(t,"inactive")}function $(t,e,n){t.j&&t.h[e]&&(n?t.h[e](n.c,_(n)):t.h[e]())}function T(){this.c={}}function S(t,e){this.c=t,this.f=e,this.a=l(this.c,"span",{"aria-hidden":"true"},this.f)}function N(t){u(t.c,"body",t.a)}function C(t){return"display:block;position:absolute;top:-9999px;left:-9999px;font-size:300px;width:auto;height:auto;line-height:normal;margin:0;padding:0;font-variant:normal;white-space:nowrap;font-family:"+b(t.c)+";font-style:"+j(t)+";font-weight:"+t.f+"00;"}function P(t,e,n,i,o,a){this.g=t,this.j=e,this.a=i,this.c=n,this.f=o||3e3,this.h=a||void 0}function E(t,e,n,i,o,a,r){this.v=t,this.B=e,this.c=n,this.a=i,this.s=r||"BESbswy",this.f={},this.w=o||3e3,this.u=a||null,this.m=this.j=this.h=this.g=null,this.g=new S(this.c,this.s),this.h=new S(this.c,this.s),this.j=new S(this.c,this.s),this.m=new S(this.c,this.s),t=C(t=new y(this.a.c+",serif",_(this.a))),this.g.a.style.cssText=t,t=C(t=new y(this.a.c+",sans-serif",_(this.a))),this.h.a.style.cssText=t,t=C(t=new y("serif",_(this.a))),this.j.a.style.cssText=t,t=C(t=new y("sans-serif",_(this.a))),this.m.a.style.cssText=t,N(this.g),N(this.h),N(this.j),N(this.m)}w.prototype.c=function(t){for(var e=[],n=0;n<arguments.length;n++)e.push(arguments[n].replace(/[\W_]+/g,"").toLowerCase());return e.join(this.a)},P.prototype.start=function(){var o=this.c.o.document,a=this,r=s(),t=new Promise(function(n,i){!function e(){var t;s()-r>=a.f?i():o.fonts.load((t=a.a,j(t)+" "+t.f+"00 300px "+b(t.c)),a.h).then(function(t){1<=t.length?n():setTimeout(e,25)},function(){i()})}()}),n=null,e=new Promise(function(t,e){n=setTimeout(e,a.f)});Promise.race([e,t]).then(function(){n&&(clearTimeout(n),n=null),a.g(a.a)},function(){a.j(a.a)})};var L={D:"serif",C:"sans-serif"},I=null;function O(){if(null===I){var t=/AppleWebKit\/([0-9]+)(?:\.([0-9]+))/.exec(window.navigator.userAgent);I=!!t&&(parseInt(t[1],10)<536||536===parseInt(t[1],10)&&parseInt(t[2],10)<=11)}return I}function A(t,e,n){for(var i in L)if(L.hasOwnProperty(i)&&e===t.f[L[i]]&&n===t.f[L[i]])return!0;return!1}function B(t){var e,n=t.g.a.offsetWidth,i=t.h.a.offsetWidth;(e=n===t.f.serif&&i===t.f["sans-serif"])||(e=O()&&A(t,n,i)),e?s()-t.A>=t.w?O()&&A(t,n,i)&&(null===t.u||t.u.hasOwnProperty(t.a.c))?F(t,t.v):F(t,t.B):setTimeout(p(function(){B(this)},t),50):F(t,t.v)}function F(t,e){setTimeout(p(function(){n(this.g.a),n(this.h.a),n(this.j.a),n(this.m.a),e(this.a)},t),0)}function Q(t,e,n){this.c=t,this.a=e,this.f=0,this.m=this.j=!1,this.s=n}E.prototype.start=function(){this.f.serif=this.j.a.offsetWidth,this.f["sans-serif"]=this.m.a.offsetWidth,this.A=s(),B(this)};var W=null;function M(t){0==--t.f&&t.j&&(t.m?((t=t.a).g&&v(t.f,[t.a.c("wf","active")],[t.a.c("wf","loading"),t.a.c("wf","inactive")]),$(t,"active")):k(t.a))}function t(t){this.j=t,this.a=new T,this.h=0,this.f=this.g=!0}function H(t,e){this.c=t,this.a=e}function D(t,e){this.c=t,this.a=e}function z(t,e){this.c=t||"https://fonts.googleapis.com/css",this.a=[],this.f=[],this.g=e||""}Q.prototype.g=function(t){var e=this.a;e.g&&v(e.f,[e.a.c("wf",t.c,_(t).toString(),"active")],[e.a.c("wf",t.c,_(t).toString(),"loading"),e.a.c("wf",t.c,_(t).toString(),"inactive")]),$(e,"fontactive",t),this.m=!0,M(this)},Q.prototype.h=function(t){var e=this.a;if(e.g){var n=a(e.f,e.a.c("wf",t.c,_(t).toString(),"active")),i=[],o=[e.a.c("wf",t.c,_(t).toString(),"loading")];n||i.push(e.a.c("wf",t.c,_(t).toString(),"inactive")),v(e.f,i,o)}$(e,"fontinactive",t),M(this)},t.prototype.load=function(t){this.c=new e(this.j,t.context||this.j),this.g=!1!==t.events,this.f=!1!==t.classes,function(o,t,e){var n=[],i=e.timeout;a=t,a.g&&v(a.f,[a.a.c("wf","loading")]),$(a,"loading");var a;var n=function(t,e,n){var i,o=[];for(i in e)if(e.hasOwnProperty(i)){var a=t.c[i];a&&o.push(a(e[i],n))}return o}(o.a,e,o.c),r=new Q(o.c,t,i);for(o.h=n.length,t=0,e=n.length;t<e;t++)n[t].load(function(t,e,n){var i,l,u,f,h,d;l=r,u=t,f=e,h=n,d=0==--(i=o).h,(i.f||i.g)&&setTimeout(function(){var t=h||null,e=f||{};if(0===u.length&&d)k(l.a);else{l.f+=u.length,d&&(l.j=d);var n,i=[];for(n=0;n<u.length;n++){var o=u[n],a=e[o.c],r=l.a,s=o;if(r.g&&v(r.f,[r.a.c("wf",s.c,_(s).toString(),"loading")]),$(r,"fontloading",s),(r=null)===W)if(window.FontFace){var s=/Gecko.*Firefox\/(\d+)/.exec(window.navigator.userAgent),c=/OS X.*Version\/10\..*Safari/.exec(window.navigator.userAgent)&&/Apple/.exec(window.navigator.vendor);W=s?42<parseInt(s[1],10):!c}else W=!1;r=W?new P(p(l.g,l),p(l.h,l),l.c,o,l.s,a):new E(p(l.g,l),p(l.h,l),l.c,o,l.s,t,a),i.push(r)}for(n=0;n<i.length;n++)i[n].start()}},0)})}(this,new x(this.c,t),t)},H.prototype.load=function(r){var e=this,s=e.a.projectId,t=e.a.version;if(s){var c=e.c.o;h(this.c,(e.a.api||"https://fast.fonts.net/jsapi")+"/"+s+".js"+(t?"?v="+t:""),function(t){t?r([]):(c["__MonotypeConfiguration__"+s]=function(){return e.a},function t(){if(c["__mti_fntLst"+s]){var e,n=c["__mti_fntLst"+s](),i=[];if(n)for(var o=0;o<n.length;o++){var a=n[o].fontfamily;null!=n[o].fontStyle&&null!=n[o].fontWeight?(e=n[o].fontStyle+n[o].fontWeight,i.push(new y(a,e))):i.push(new y(a))}r(i)}else setTimeout(function(){t()},50)}())}).id="__MonotypeAPIScript__"+s}else r([])},D.prototype.load=function(t){var e,n,i=this.a.urls||[],o=this.a.families||[],a=this.a.testStrings||{},r=new d;for(e=0,n=i.length;e<n;e++)f(this.c,i[e],g(r));var s=[];for(e=0,n=o.length;e<n;e++)if((i=o[e].split(":"))[1])for(var c=i[1].split(","),l=0;l<c.length;l+=1)s.push(new y(i[0],c[l]));else s.push(new y(i[0]));m(r,function(){t(s,a)})};function q(t){this.f=t,this.a=[],this.c={}}var U={latin:"BESbswy","latin-ext":"çöüğş",cyrillic:"йяЖ",greek:"αβΣ",khmer:"កខគ",Hanuman:"កខគ"},G={thin:"1",extralight:"2","extra-light":"2",ultralight:"2","ultra-light":"2",light:"3",regular:"4",book:"4",medium:"5","semi-bold":"6",semibold:"6","demi-bold":"6",demibold:"6",bold:"7","extra-bold":"8",extrabold:"8","ultra-bold":"8",ultrabold:"8",black:"9",heavy:"9",l:"3",r:"4",b:"7"},K={i:"i",italic:"i",n:"n",normal:"n"},R=/^(thin|(?:(?:extra|ultra)-?)?light|regular|book|medium|(?:(?:semi|demi|extra|ultra)-?)?bold|black|heavy|l|r|b|[1-9]00)?(n|i|normal|italic)?$/;function V(t,e){this.c=t,this.a=e}var X={Arimo:!0,Cousine:!0,Tinos:!0};function Z(t,e){this.c=t,this.a=e}function J(t,e){this.c=t,this.f=e,this.a=[]}V.prototype.load=function(t){var e=new d,n=this.c,i=new z(this.a.api,this.a.text),o=this.a.families;!function(t,e){for(var n=e.length,i=0;i<n;i++){var o=e[i].split(":");3==o.length&&t.f.push(o.pop());var a="";2==o.length&&""!=o[1]&&(a=":"),t.a.push(o.join(a))}}(i,o);var a=new q(o);!function(t){for(var e=t.f.length,n=0;n<e;n++){var i=t.f[n].split(":"),o=i[0].replace(/\+/g," "),a=["n4"];if(2<=i.length){var r;if(r=[],s=i[1])for(var s,c=(s=s.split(",")).length,l=0;l<c;l++){var u;if((u=s[l]).match(/^[\w-]+$/))if(null==(h=R.exec(u.toLowerCase())))u="";else{if(u=null==(u=h[2])||""==u?"n":K[u],null==(h=h[1])||""==h)h="4";else var f=G[h],h=f||(isNaN(h)?"4":h.substr(0,1));u=[u,h].join("")}else u="";u&&r.push(u)}0<r.length&&(a=r),3==i.length&&(r=[],0<(i=(i=i[2])?i.split(","):r).length&&(i=U[i[0]])&&(t.c[o]=i))}for(t.c[o]||(i=U[o])&&(t.c[o]=i),i=0;i<a.length;i+=1)t.a.push(new y(o,a[i]))}}(a),f(n,function(t){if(0==t.a.length)throw Error("No fonts to load!");if(-1!=t.c.indexOf("kit="))return t.c;for(var e=t.a.length,n=[],i=0;i<e;i++)n.push(t.a[i].replace(/ /g,"+"));return e=t.c+"?family="+n.join("%7C"),0<t.f.length&&(e+="&subset="+t.f.join(",")),0<t.g.length&&(e+="&text="+encodeURIComponent(t.g)),e}(i),g(e)),m(e,function(){t(a.a,a.c,X)})},Z.prototype.load=function(r){var t=this.a.id,s=this.c.o;t?h(this.c,(this.a.api||"https://use.typekit.net")+"/"+t+".js",function(t){if(t)r([]);else if(s.Typekit&&s.Typekit.config&&s.Typekit.config.fn){t=s.Typekit.config.fn;for(var e=[],n=0;n<t.length;n+=2)for(var i=t[n],o=t[n+1],a=0;a<o.length;a++)e.push(new y(i,o[a]));try{s.Typekit.load({events:!1,classes:!1,async:!0})}catch(t){}r(e)}},2e3):r([])},J.prototype.load=function(l){var t,e=this.f.id,n=this.c.o,u=this;e?(n.__webfontfontdeckmodule__||(n.__webfontfontdeckmodule__={}),n.__webfontfontdeckmodule__[e]=function(t,e){for(var n=0,i=e.fonts.length;n<i;++n){var o=e.fonts[n];u.a.push(new y(o.name,(a="font-weight:"+o.weight+";font-style:"+o.style,c=s=r=void 0,r=4,s="n",c=null,a&&((c=a.match(/(normal|oblique|italic)/i))&&c[1]&&(s=c[1].substr(0,1).toLowerCase()),(c=a.match(/([1-9]00|normal|bold)/i))&&c[1]&&(/bold/i.test(c[1])?r=7:/[1-9]00/.test(c[1])&&(r=parseInt(c[1].substr(0,1),10)))),s+r)))}var a,r,s,c;l(u.a)},h(this.c,(this.f.api||"https://f.fontdeck.com/s/css/js/")+((t=this.c).o.location.hostname||t.a.location.hostname)+"/"+e+".js",function(t){t&&l([])})):l([])};var Y=new t(window);Y.a.c.custom=function(t,e){return new D(e,t)},Y.a.c.fontdeck=function(t,e){return new J(e,t)},Y.a.c.monotype=function(t,e){return new H(e,t)},Y.a.c.typekit=function(t,e){return new Z(e,t)},Y.a.c.google=function(t,e){return new V(e,t)};var tt={load:p(Y.load,Y)};void 0===(ot=function(){return tt}.call(nt,it,nt,et))||(et.exports=ot)}()},function(t,e,n){"use strict";n.r(e);n(3);var i=n(0);function o(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],o("js",new Date),o("config","UA-138286791-1"),window.$=window.$||jQuery,i.a.init(),i.c.init(),i.b.init()},function(t,e,n){}]);