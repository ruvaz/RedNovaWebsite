(function( RDC, $, undefined ) {

  /** Public variables **/

  RDC.WEB_ROOT = ((document.location.protocol == 'https:') ? 'https://' : 'http://') + document.location.host;

  /** Public functions **/

  RDC.setIdleTimeout = function(millis, onIdle) {
      var timeout = 0;
      $(startTimer);

      function startTimer() {
          timeout = setTimeout(onExpires, millis);
          $(document).on("mousemove keypress", onActivity);
      }

      function onExpires() {
          timeout = 0;
          onIdle();
      }

      function onActivity() {
          if (timeout) clearTimeout(timeout);
          $(document).off("mousemove keypress", onActivity);
          setTimeout(startTimer, 1000);
      }
  }

  RDC.mainNav = function() {
      if (window.pageYOffset <= 0) {
          $('.main-nav').removeClass('back-colour-1');
      } else {
          $('.main-nav').addClass('back-colour-1');
      }
  };

  RDC.openFileList = function() {
      $('.file-list ol ol').hide();
      $('.file-list .open ol').show();

      $('.file-list').on('click', '.toggle', function(e) {
          $(this).parents('li').toggleClass('open');
          $(this).siblings('ol').toggle();
          e.preventDefault();
      });
  };

  // Given an element ID, animate scroll to its position
  RDC.jumpToFaq = function(id) {  	  	
  	    	  
      var ele = $('[id="' + id + '"]');
            
      $('html,body').animate({scrollTop: ele.offset().top - 100}, 500);
      $('.faq-open').removeClass('faq-open');
      setTimeout(function() {
        ele.addClass('faq-open');
      }, 450);      
  };

}( window.RDC = window.RDC || {}, jQuery ));

// Immediately hide all elements reserved for users with JS disabled
$('.no-js').hide();

$(function() {
  "use strict";

  $('.js-only').show();

  // Instantiate FastClick plugin, removed tablet click delay (can safely be removed)
  FastClick.attach(document.body);

  jQuery.fx.interval = 30; // Set jQuery animation frame speed, increase to improve performance

  RDC.mainNav();

  $(window).scroll(function() {
    RDC.mainNav();
  });

  if ($('.file-list').length > 0) {
    RDC.openFileList();
  }

  // $(document).on('click', '.button.print', function(e) {
    // window.print();
    // e.preventDefault();
  // });

  // $('.button.back').each(function() {
    // $(this).data('location', document.referrer);
  // });
// 
  // $(document).on('click', '.button.back', function(e) {
    // window.location = $(this).data('location');
    // e.preventDefault();
  // });

  if ($('.WS_logout_button').length > 0) {
    RDC.setIdleTimeout($('body').data('timeout') * 60000, function() {
      MEC_webservices.WS_perform_logout();
    });
  }

  $('.file-list-external').on('click', '.header', function() {
    if ($(this).next('.content').html().length > 0) {
      $(this).removeClass('open');
    } else {
      $(this).addClass('open');
    }
  });

  if($('.page-template-page-help').length > 0 && window.location.hash) {
      RDC.jumpToFaq(window.location.hash.replace(/#/g, ''));
  }

  $('.js-faq-nav').on('click', 'a', function(e) {    
      RDC.jumpToFaq($(this).attr('href').replace(/#/g, ''));
      e.preventDefault();
  });
});
