!function(o){o.fn.viewportChecker=function(e){var a={classToAdd:"visible",classToRemove:"invisible",classToAddForFullView:"full-visible",removeClassAfterAnimation:!1,offset:100,repeat:!1,invertBottomOffset:!0,callbackFunction:function(o,e){},scrollHorizontal:!1,scrollBox:window}
o.extend(a,e)
var t=this,s=o(a.scrollBox).height(),l=o(a.scrollBox).width(),n=-1!=navigator.userAgent.toLowerCase().indexOf("webkit")||-1!=navigator.userAgent.toLowerCase().indexOf("windows phone")?"body":"html"
return this.checkElements=function(){var e,i
a.scrollHorizontal?(e=o(n).scrollLeft(),i=e+l):(e=o(n).scrollTop(),i=e+s),t.each(function(){var t=o(this),l={},n={}
if(t.data("vp-add-class")&&(n.classToAdd=t.data("vp-add-class")),t.data("vp-remove-class")&&(n.classToRemove=t.data("vp-remove-class")),t.data("vp-add-class-full-view")&&(n.classToAddForFullView=t.data("vp-add-class-full-view")),t.data("vp-keep-add-class")&&(n.removeClassAfterAnimation=t.data("vp-remove-after-animation")),t.data("vp-offset")&&(n.offset=t.data("vp-offset")),t.data("vp-repeat")&&(n.repeat=t.data("vp-repeat")),t.data("vp-scrollHorizontal")&&(n.scrollHorizontal=t.data("vp-scrollHorizontal")),t.data("vp-invertBottomOffset")&&(n.scrollHorizontal=t.data("vp-invertBottomOffset")),o.extend(l,a),o.extend(l,n),!t.data("vp-animated")||l.repeat){0<(l.offset+"").indexOf("%")&&(l.offset=parseInt(l.offset)/100*s)
var n=l.scrollHorizontal?t.offset().left:t.offset().top,d=l.scrollHorizontal?n+t.width():n+t.height(),r=Math.round(n)+l.offset,c=l.scrollHorizontal?r+t.width():r+t.height()
l.invertBottomOffset&&(c-=2*l.offset),i>r&&c>e?(t.removeClass(l.classToRemove),t.addClass(l.classToAdd),l.callbackFunction(t,"add"),i>=d&&n>=e?t.addClass(l.classToAddForFullView):t.removeClass(l.classToAddForFullView),t.data("vp-animated",!0),l.removeClassAfterAnimation&&t.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){t.removeClass(l.classToAdd)})):t.hasClass(l.classToAdd)&&l.repeat&&(t.removeClass(l.classToAdd+" "+l.classToAddForFullView),l.callbackFunction(t,"remove"),t.data("vp-animated",!1))}})},("ontouchstart"in window||"onmsgesturechange"in window)&&o(document).bind("touchmove MSPointerMove pointermove",this.checkElements),o(a.scrollBox).bind("load scroll",this.checkElements),o(window).resize(function(e){s=o(a.scrollBox).height(),l=o(a.scrollBox).width(),t.checkElements()}),this.checkElements(),this}}(jQuery)