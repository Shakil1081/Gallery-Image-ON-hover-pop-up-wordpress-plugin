var time2;
jQuery(document).ready(function(aa){
aa("ul.hoverbox li a").mouseover(function(e){
var th = aa(this);
clearTimeout(time2);
time2 = setTimeout(function(){ aa(th).trigger('click'); },830);
}).mouseout(function(){
clearTimeout(time2);
});
aa(".mfp-content").live("mouseout",function(){
aa(".mfp-close").trigger("click");
});
aa("ul.hoverbox").magnificPopup({
          delegate: 'a',
          type: 'image',
          closeOnContentClick: false,
          closeBtnInside: false,
          mainClass: 'mfp-with-zoom mfp-img-mobile',
          image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('title');
            }
          },
          gallery: {
            enabled: true
          },
          zoom: {
            enabled: true,
            duration: 300, // don't foget to change the duration also in CSS
            opener: function(element) {
              return element.find('img');
            }
          }
          
        });

});