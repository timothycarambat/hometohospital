
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./main');
require('./infinite');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var ua = window.navigator.userAgent;
var iOS = !!ua.match(/iPad/i) || !!ua.match(/iPhone/i);

if(iOS) {
  $(document).click((e) => {
    var target = e.target

    if(target.className.includes('drawer-button') || target.parentElement.className.includes('drawer-button')) {
      $('.mdl-container').addClass('ios-hide')
    } else if ($(target).hasClass('mdl-layout__obfuscator')) {
      $('.mdl-container').removeClass('ios-hide')
    }
  })
}
