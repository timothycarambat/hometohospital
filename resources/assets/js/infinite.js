$(function(){
  $('ul.pagination').hide();
      $(function() {
          $('.infinite-scroll').jscroll({
              autoTrigger: true,
              loadingHtml: `<div class="slider">
                            	  <div class="line"></div>
                                <div class="subline inc"></div>
                                <div class="subline dec"></div>
                            </div>`,
              padding: 0,
              nextSelector: '.pagination li.active + li a',
              contentSelector: 'div.infinite-scroll',
              callback: function() {
                  $('ul.pagination').remove();
              }
          });
      });

  btt.addBackToTop()
})
