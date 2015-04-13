!function(t){var e;window.UIkit&&(e=t(UIkit)),"function"==typeof define&&define.amd&&define("uikit-sortable",["uikit"],function(){return e||t(UIkit)})}(function(t){"use strict";function e(t,e){var n=t.parentNode;if(e.parentNode!=n)return!1;for(var o=t.previousSibling;o&&9!==o.nodeType;){if(o===e)return!0;o=o.previousSibling}return!1}function n(t,e){var n=e;if(n==t)return null;for(;n;){if(n.parentNode===t)return n;if(n=n.parentNode,!n||!n.ownerDocument||11===n.nodeType)break}return null}function o(t){t.stopPropagation&&t.stopPropagation(),t.preventDefault&&t.preventDefault(),t.returnValue=!1}var a,s,r,i,l,d="ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch,p=!d&&function(){var t=document.createElement("div");return"draggable"in t||"ondragstart"in t&&"ondrop"in t}();return p=!1,t.component("sortable",{defaults:{warp:!1,animation:150,threshold:10,childClass:"uk-sortable-item",placeholderClass:"uk-sortable-placeholder",overClass:"uk-sortable-over",draggingClass:"uk-sortable-dragged",dragMovingClass:"uk-sortable-moving",dragCustomClass:"",handleClass:!1,stop:function(){},start:function(){},change:function(){}},boot:function(){t.ready(function(e){t.$("[data-uk-sortable]",e).each(function(){var e=t.$(this);if(!e.data("sortable")){t.sortable(e,t.Utils.options(e.attr("data-uk-sortable")))}})}),t.$html.on("mousemove touchmove",function(e){if(l){var n=e.originalEvent.targetTouches?e.originalEvent.targetTouches[0]:e;(Math.abs(n.pageX-l.pos.x)>l.threshold||Math.abs(n.pageY-l.pos.y)>l.threshold)&&l.apply()}if(a){s||(s=!0,a.show(),a.$current.addClass(a.$sortable.options.placeholderClass),a.$sortable.element.children().addClass(a.$sortable.options.childClass),t.$html.addClass(a.$sortable.options.dragMovingClass));var o=a.data("mouse-offset"),r=parseInt(e.originalEvent.pageX,10)+o.left,i=parseInt(e.originalEvent.pageY,10)+o.top;a.css({left:r,top:i}),i<t.$win.scrollTop()?t.$win.scrollTop(t.$win.scrollTop()-Math.ceil(a.height()/2)):i+a.height()>window.innerHeight+t.$win.scrollTop()&&t.$win.scrollTop(t.$win.scrollTop()+Math.ceil(a.height()/2))}}),t.$html.on("mouseup touchend",function(){!s&&i&&(location.href=i.attr("href")),l=i=!1})},init:function(){function e(e){return function(o){var a=d&&o.touches&&o.touches[0]||{},s=a.target||o.target;if(d&&document.elementFromPoint&&(s=document.elementFromPoint(o.pageX-document.body.scrollLeft,o.pageY-document.body.scrollTop)),t.$(s).hasClass(c.options.childClass))e.apply(s,[o]);else if(s!==f){var r=n(f,s);r&&e.apply(r,[o])}}}function u(){p||(d?f.addEventListener("touchmove",y,!1):(f.addEventListener("mouseover",b,!1),f.addEventListener("mouseout",$,!1)),f.addEventListener(d?"touchend":"mouseup",w,!1),document.addEventListener(d?"touchend":"mouseup",E,!1),document.addEventListener("selectstart",o,!1))}function h(){p||(d?f.removeEventListener("touchmove",y,!1):(f.removeEventListener("mouseover",b,!1),f.removeEventListener("mouseout",$,!1)),f.removeEventListener(d?"touchend":"mouseup",w,!1),document.removeEventListener(d?"touchend":"mouseup",E,!1),document.removeEventListener("selectstart",o,!1))}var c=this,f=this.element[0],v=null,m=null;Object.keys(this.options).forEach(function(t){-1!=String(c.options[t]).indexOf("Class")&&(c.options[t]=c.options[t])}),p?this.element.children().attr("draggable","true"):this.element.on("mousedown touchstart","a[href]",function(e){e.ctrlKey||e.metaKey||e.shiftKey||(i=t.$(this),e.preventDefault())}).on("click","a[href]",function(e){return e.ctrlKey||e.metaKey||e.shiftKey?void 0:(i=t.$(this),e.stopImmediatePropagation(),!1)});var g=e(function(e){s=!1,r=!1;{var n=t.$(e.target);c.element.children()}if(d||2!=e.button){if(c.options.handleClass){var o=n.hasClass(c.options.handleClass)?n:n.closest("."+c.options.handleClass,f);if(!o.length)return}if(!n.is(":input")){e.dataTransfer&&(e.dataTransfer.effectAllowed="move",e.dataTransfer.dropEffect="move",e.dataTransfer.setData("Text","*")),v=this,a&&a.remove();var i=t.$(v),h=i.offset();l={pos:{x:e.pageX,y:e.pageY},threshold:c.options.threshold,apply:function(){a=t.$('<div class="'+[c.options.draggingClass,c.options.dragCustomClass].join(" ")+'"></div>').css({display:"none",top:h.top,left:h.left,width:i.width(),height:i.height(),padding:i.css("padding")}).data("mouse-offset",{left:h.left-parseInt(e.pageX,10),top:h.top-parseInt(e.pageY,10)}).append(i.html()).appendTo("body"),a.$current=i,a.$sortable=c,u(),c.options.start(this,v),c.trigger("start.uk.sortable",[c,v]),l=!1}},p||e.preventDefault()}}}),C=e(function(t){return v?(t.preventDefault&&t.preventDefault(),!1):!0}),b=e(t.Utils.debounce(function(){if(!v||v===this)return!0;var e=c.dragenterData(this);return c.dragenterData(this,e+1),0===e&&(t.$(this).addClass(c.options.overClass),c.options.warp||c.moveElementNextTo(v,this)),!1}),40),$=e(function(){var e=c.dragenterData(this);c.dragenterData(this,e-1),c.dragenterData(this)||(t.$(this).removeClass(c.options.overClass),c.dragenterData(this,!1))}),w=e(function(e){if("drop"===e.type&&(e.stopPropagation&&e.stopPropagation(),e.preventDefault&&e.preventDefault()),r||c.options.warp){if(c.options.warp){var n=v.nextSibling;this.parentNode.insertBefore(v,this),this.parentNode.insertBefore(this,n),t.Utils.checkDisplay(c.element.parent())}c.options.change(this,v),c.trigger("change.uk.sortable",[c,v])}}),E=function(){v=null,m=null,c.element.children().each(function(){1===this.nodeType&&(t.$(this).removeClass(c.options.overClass).removeClass(c.options.placeholderClass).removeClass(c.options.childClass),c.dragenterData(this,!1))}),t.$("html").removeClass(c.options.dragMovingClass),h(),c.options.stop(this),c.trigger("stop.uk.sortable",[c]),a.remove(),a=null},y=e(function(e){return v&&v!==this&&m!==this?(c.element.children().removeClass(c.options.overClass),m=this,c.options.warp?t.$(this).addClass(c.options.overClass):c.moveElementNextTo(v,this),o(e)):!0});p?(f.addEventListener("dragstart",g,!1),f.addEventListener("dragenter",b,!1),f.addEventListener("dragleave",$,!1),f.addEventListener("drop",w,!1),f.addEventListener("dragover",C,!1),f.addEventListener("dragend",E,!1)):f.addEventListener(d?"touchstart":"mousedown",g,!1)},dragenterData:function(e,n){return e=t.$(e),1==arguments.length?parseInt(e.attr("data-child-dragenter"),10)||0:void(n?e.attr("data-child-dragenter",Math.max(0,n)):e.removeAttr("data-child-dragenter"))},moveElementNextTo:function(n,o){r=!0;var a=this,s=t.$(n).parent().css("min-height",""),i=e(n,o)?o:o.nextSibling,l=s.children(),d=l.length;return a.options.warp||!a.options.animation?(o.parentNode.insertBefore(n,i),void t.Utils.checkDisplay(a.element.parent())):(s.css("min-height",s.height()),l.stop().each(function(){var e=t.$(this),n=e.position();n.width=e.width(),e.data("offset-before",n)}),o.parentNode.insertBefore(n,i),t.Utils.checkDisplay(a.element.parent()),l=s.children().each(function(){var e=t.$(this);e.data("offset-after",e.position())}).each(function(){var e=t.$(this),n=e.data("offset-before");e.css({position:"absolute",top:n.top,left:n.left,"min-width":n.width})}),void l.each(function(){var e=t.$(this),n=(e.data("offset-before"),e.data("offset-after"));e.css("pointer-events","none").width(),setTimeout(function(){e.animate({top:n.top,left:n.left},a.options.animation,function(){e.css({position:"",top:"",left:"","min-width":"","pointer-events":""}).removeClass(a.options.overClass).attr("data-child-dragenter",""),d--,d||(s.css("min-height",""),t.Utils.checkDisplay(a.element.parent()))})},0)}))},serialize:function(){var e,n=[];return this.element.children().each(function(){e=t.$.extend({},t.$(this).data()),n.push(e)}),n}}),t.sortable});