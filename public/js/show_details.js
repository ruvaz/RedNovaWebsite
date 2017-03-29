
$(window).load(function () {
    var h = $('.prodimg img').outerHeight();
    $('.prodimg').css('height', h + 1);          
    $('.auth-txt').css('height', h + 1);
   
    manageCarrouselHeight();
});
	
$(window).resize(function () {

    var h = $('.prodimg img').outerHeight();
        $('.prodimg').css('height', h + 1);
        $('.auth-txt').css('height', h + 1);
        
    manageCarrouselHeight();
    ManageFelxSlidertitle();
    
    
    $html = $('#mp-menu').html();
    $('#mp-menu').remove();
    $nav = $('<nav id="mp-menu" class="mp-menu mp-cover">');
    $nav.html($html);
    $('#mp-pusher').prepend($nav);
    
    _mp = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
        type: 'cover'
    });

    if ($('body').hasClass('mp-pushed-body')) 
        _mp._openMenu();
    
});		

$(window).load(function () {
  $('.flexslider').flexslider({
      prevText: "",
      smoothHeight: true,
      slideshowSpeed: 20000,
      nextText: "",
      animation: "slide",
      start: function (slider) {
          $('body').removeClass('loading');

          if ($(window).width() < 768) {                         
              ManageFelxSlidertitle();
          }

          $(".slides li").each(function () {                         
              $(this).find('h1').show();                         
          });          

      }
  });

  var whatwedo = $('.wrapper.we-do-hld.clearfix');
  if (whatwedo != undefined)
  {
      $('.wrapper.we-do-hld.clearfix').addClass('home-what-we-do');
  }
});
	
window.addEventListener('orientationchange', doOnOrientationChange);

$(document).ready(function () {
	
    setTimeout(function () {
        manageCarrouselHeight();                
    }, 1000);
    
    $(window).on("orientationchange", function (event) {
		ManageFelxSlidertitle();
	});
	
	if ($(".sectionAuthor").length > 0) {               
        $(".sectionAuthor").removeClass().addClass("sectionAuthor wrapper awards-hld clearfix");
        $(".sectionAuthor").parent().addClass('alt-row');               
    }

    $(".prodimg").click(function () {	            	
        $(".prodimg").each(function () {
            $(this).addClass('de-active-img');
        });
        if ($(this).hasClass('de-active-img')) {
            if ($(this).children('a').hasClass('clicktoclose')) {
                $(".prodimg").each(function () {
                    $(this).removeClass('de-active-img');
                });
            }
            else {
                $(this).removeClass('de-active-img')
            }
        }
    });
        
    manageCarrouselHeight();
	
	$('.red-col').bind('click', function () {	
	    makeShort();
	});
	
	$('.menu-link').bind('click', function (e) {
	
	    e.preventDefault();
	
	    if ($(this).parent().find('.subMenu').is(':visible')) {
	
	        window.location = $(this).attr('href');
	
	    }
	
	});
	function makeTall() {
	
	    clearTimeout($.data(this, 'timer'));
	    //$('.subMenu', this).stop(true, true).slideDown(500);
	
	    var posLeft = $(this).position().left;
	    $('ul', this).css('margin-left', posLeft + 'px');
	    $('.subMenu', this).stop(true, true).slideDown(500, function () {
	        //$('ul', this).css('margin-left',posLeft+'px');
	
	    });
	}
	function makeShort() {
	    $.data(this, 'timer', setTimeout($.proxy(function () {
	        if (!$('.subMenu', this).hasClass('subMenuBLock')) {
	            $('.subMenu', this).stop(true, true).slideUp(150);
	        }
	    }, this), 200));
	
	}
	$('.cbp-hrmenu ul li').hoverIntent({
	    over: makeTall,
	    out: makeShort
	
	});
	
	if ($('.fancybox').length > 0) {
	
	    $('.fancybox').fancybox({});
	}
	        
	var ua = navigator.userAgent;
	var iscrome = false;
	if (ua.lastIndexOf('Chrome/') > 0) {
	
	    iscrome = true; 
	}
	//Javascript Browser Detection - Mobile
	var ismobile = false;
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(ua)) {
	            ismobile = true;
	        };
	   
	        if (iscrome && !ismobile) {
	
	            if($('html').hasClass('no-csstransforms3d'))
	    {
	        $('html').removeClass('no-csstransforms3d').addClass('csstransforms3d');
	        }
	    }
	
	});
	
	if ($('#back-to-top').length) {
	var scrollTrigger = 100, // px
	backToTop = function () {
	    var scrollTop = $(window).scrollTop();
	    if (scrollTop > scrollTrigger) {
	        $('#back-to-top').addClass('show');
	    } else {
	        $('#back-to-top').removeClass('show');
	    }
	};
	backToTop();
	$(window).on('scroll', function () {	
	    backToTop();
	});
	
	$('#back-to-top').on('click', function (e) {
	    e.preventDefault();
	    $('html,body').animate({
	            scrollTop: 0
	        }, 700);
    });
    
}


function manageCarrouselHeight() {
    if ($(".carousel-caption .wrapper").length > 0) {
        $(".static-img .carousel-caption .wrapper").show(); //shows image carousel which is display none from code behind
        var v1 = $(".carousel-caption .wrapper").height();
        var v2 = $(".banner-hld.static-img img").height();
        var captionheight = $(".carousel-caption .wrapper .macCaption").height();
        var v3 = v2 - v1;
        v3 = v3 / 2;
        if (captionheight > 89) {
            $(".carousel-caption .wrapper").css('margin-top', '+' + v3 - 15 + 'px');                    
        }
        else {
            $(".carousel-caption .wrapper").css('margin-top', '+' + v3 + 'px');
        } 

    }
    ManageFelxSlidertitle() 
    
}		  
		  
function ManageFelxSlidertitle() {
  $(".slides li").each(function () {
      var imgheight = $(this).find('img').height();
      var h3height = $(this).find('h1').height();
      var newh3height = parseInt((imgheight + h3height) / 2);
      // $(this).find('h1').css('top', '-' + newh3height + 'px');
  });      
}

function doOnOrientationChange() {

    $html = $('#mp-menu').html();
    $('#mp-menu').remove();
    $nav = $('<nav id="mp-menu" class="mp-menu mp-cover">');
    $nav.html($html);
    $('#mp-pusher').prepend($nav);
    _mp = new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
        type: 'cover'
    });

    if ($('body').hasClass('mp-pushed-body')) {

        _mp._openMenu();
    }
    manageCarrouselHeight();    
}
	
function _ShowDetails(objId) {
    var newid = objId;

    var DV_Number = newid.substring(5);


    var currentDivNo = parseInt(objId.replace("dvImg", ""));
    var totalElem = document.getElementById("sectionImg").getElementsByTagName("div").length;
    var newObjId = "";
    var span = "";

    var arrValue = GetSectionWidthAndItemperRow();
    var sectionWidth = arrValue[0];
    var itemPerRow = arrValue[1];

    var className = $("#" + objId).find('a').attr("class");


    if (className == "clicktoopen") {
        for (var i = 1; i < totalElem; i++) {
            $("#toggleImg" + i).attr("class", "clicktoopen");
        }

        for (var i = 1; i < totalElem; i++) {
            if (DV_Number != i) {
//                    span = document.getElementById("dvImg" + i).getElementsByTagName("span");
//                    span.attr("class", "trans-hover");

                $('#dvImg' + i + ' span').attr("class", "default-color");
            }
        }
        $('#' + objId+ ' span').attr("class", "default-color");
        $("#" + objId).find('a').attr("class", "clicktoclose");
        $('#DIV_toggleImg' + DV_Number).find('a').attr("class", "watch-video");


        //Highliht the images start
        for (var i = 1; i < totalElem; i++) {
            if (document.getElementById("dvImg" + i)) {
                span = document.getElementById("dvImg" + i).getElementsByTagName("span");
                span[0].style.display = "block";
            }
        }
        span = document.getElementById(objId).getElementsByTagName("span");
        span[0].style.display = "none";
        //HighLights the image end

        for (var i = currentDivNo; currentDivNo < totalElem; i++) {
            objId = "#dvImg" + i;
            newObjId = "#dvImg" + (parseInt(i) + 1);

            if ($(newObjId).length == 0) {
                break;
            }

            if ($(newObjId).position().top > $(objId).position().top) {
                break;
            }
        }

        var html = $('#dvDetails').html();


        html = $("#DIV_toggleImg" + DV_Number).html();


        html = "<div id=\"dvDetails\" class=\"culture-gallery-holder\" style=\"display:none;\">" + html + "</div>";
        $('#dvDetails').remove();
        $(objId).after(html);


        $("#dvDetails").slideDown("fast", function () {
            // Animation complete.
             $("#dvDetails .large-screen-limit-width div").each(function(index){
            	id = $(this).attr("id");
            	$(this).attr("id",id.replace("question", "q"));
             });
        });
        
            var target = "#dvImg" + currentDivNo;
            var $target = $(target);
            window.location.hash = target;

    } else {

        //set display none
        for (var i = 1; i < totalElem; i++) {
            if (document.getElementById("dvImg" + i)) {
                span = document.getElementById("dvImg" + i).getElementsByTagName("span");
                span[0].style.display = "none";
            }
        }

        $("#" + objId).find('a').attr("class", "clicktoopen");
        // $("#aVideo").attr("class", "watch-video");

        for (var i = 1; i < totalElem; i++) {
            if (DV_Number != i) {
                //                    span = document.getElementById("dvImg" + i).getElementsByTagName("span");
                //                    span.attr("class", "trans-hover");

                $('#dvImg' + i + ' span').attr("class", "default-color");
            }
        }

        $("#dvDetails").slideUp("fast", function () {
            // Animation complete.            
        });
    }
    $("#dvDetails").find('a').attr("class", "question");        
}

function GetSectionWidthAndItemperRow() {
    var imgDivs = $('#sectionImg').find('.prodimg'); ;
    var totalWidth = 0;
    var itemTop = $("#dvImg1").position().top;
    var i = 0;

    if (imgDivs.length > 1) {
        for (i = 1; i < imgDivs.length; i++) {
            totalWidth += $("#dvImg" + i).width();
            if ($("#dvImg" + i).position().top != itemTop) {
                break;
            }
        }
        i--;
    } else {
        i = 1;
        totalWidth = 0;
    }
    return [totalWidth, i];
}
	
if($('.page-template-page-help').length > 0 && window.location.hash) {
  RDC.jumpToFaq(window.location.hash.replace('#question', 'question'));
}				 

$(document).on('click','a.question',function(e) {		  			  	  
  RDC.jumpToFaq($(this).attr('href').replace('#question', 'q'));		      		      	    
  e.preventDefault();
});