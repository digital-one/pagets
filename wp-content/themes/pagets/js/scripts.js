var isTouchDevice = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isTouchDevice.Android() || isTouchDevice.BlackBerry() || isTouchDevice.iOS() || isTouchDevice.Opera() || isTouchDevice.Windows());
    }
};




$(function(){

//variables

  var isMobileNav = $(window).width() <= 1130,
      isMobile = $(window).width() <= 660,
      $menuItems = $('#nav a'),
      $menuParentLinks = $('#nav li.menu-item-has-children > a'),
      $backButton = $('#nav #mobile-prev'),
      _accordionActive, _accordion;


//accordion plugin



$.fn.accordion = function(options) {

  var defaults = {
    handles: 'dt',
    blocks: 'dd'
    };
var options = $.extend(defaults,options);

    // support multiple elements
    if (this.length > 1){
        this.each(function() { $(this).accordion(options) });
        return this;
    }

    // private variables
       var _this = $(this);
        var _handles = $(options.handles,_this);
        var _blocks = $(options.blocks,_this);
    // ...

    // private methods
    var foo = function() {
        // do something ...
    }
    // ...

    // public methods        
    this.initialize = function() {

        _blocks.each(function(){
        if(!$(this).hasClass('active')){
        $(this).hide();
        }
        })

        _handles.each(function(){

          $(this).on('click',function(e){
          e.preventDefault();
          e.stopPropagation();

          if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).next(options.blocks).removeClass('active');
            $(this).next(options.blocks).slideUp(100,function(){
             })
          } else {
            _handles.removeClass('active');
            _blocks.removeClass('active').hide();
            $(this).addClass('active');
            $(this).next(options.blocks).slideDown(200,function(){
           $(this).addClass('active');
            });
          }
        })
      })
  return this;
    };

    this.destroyAccordion = function() {
      console.log('destroy accordion')
      $(options.blocks).removeAttr('style').removeClass('active');
      $(options.handles).off('click').removeClass('active');
    };
    
    return this.initialize();
}


/*
========


$.fn.accordion = function(options){
  
  var defaults = {
    handles: 'dt',
    blocks: 'dd'
    };
var options = $.extend(defaults,options);
  return this.each(function(){
    var $this = this;
    var $handles = $(options.handles,$this);
    var $blocks = $(options.blocks,$this);

$(options.blocks).each(function(){
  if(!$(this).hasClass('active')){
    $(this).hide();
  }
})

$this.destroyAccordion = function() {
  console.log('destroy accordion')
  $(options.blocks).removeAttr('style').removeClass('active');
  $(options.handles).off('click').removeClass('active');
};


 $handles.each(function(){

  $(this).on('click',function(e){
    e.preventDefault();
    e.stopPropagation();

    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $(this).next(options.blocks).removeClass('active');
      $(this).next(options.blocks).slideUp(100,function(){
    })
    } else {
      $handles.removeClass('active');
      $blocks.removeClass('active').hide();
      $(this).addClass('active');
      $(this).next(options.blocks).slideDown(200,function(){
           $(this).addClass('active');
      });
    }
  })
  })


//

})
}
===================
*/


//slider and carousels

	$('#slider').slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 5000,
  		arrows: true
	});

	$('#carousel').slick({
  		dots: true,
  		arrows: true,
  		infinite: true,
  		speed: 300,
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		responsive: [
    	{
      		breakpoint: 1024,
      		settings: {
        	slidesToShow: 2,
        	slidesToScroll: 1,
        	infinite: true,
        	dots: true
      	}
    },
    	
    	{
      	breakpoint: 480,
      	settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    	}
 	 ]
	});

//accordion

$('.accordion').accordion();


/*
	var $handles = $('.accordion dt');
	var $blocks = $('.accordion dd');
	$handles.eq(0).addClass('active');
	$blocks.eq(0).slideDown(200);
	$handles.on('click',function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$(this).next('dd').slideUp(100);
		} else {
			$(this).addClass('active');
			$(this).next('dd').slideDown(200);
		}
	})
*/

// selectbox replacement

$('#filters select').selectBox().change(function () {
  var _type = $('#filters select#type').val(),
      _category = $('#filters select#category').val();
    location.href='/news-events/archive/type/'+_type+'/category/'+_category+'/'
});

$('.gform_wrapper select').selectBox();

//$('select').selectBox();

//masonry

if($('#news-events-archive').length){
var msnry = new Masonry( '#news-events-archive #posts', {
  itemSelector: 'article'
});
}

moreListPostsClick = function(e){
    e.preventDefault();
    console.log('more')
$('#memorials a.more-posts').off('click', moreListPostsClick);
var $url = $(this).attr('href'),
$element = '.post-list',
$this = $(this);
$(this).addClass('loading');
   $.get($url).done(function(data){
         $('#memorials a.more-posts').on('click', moreListPostsClick);
        $(this).removeClass('loading');
              var $obj = $(data).find($element);
              var $btn = $(data).find('.more-posts');
             // $this.replaceWith($btn);
            $this.attr('href',$btn.attr('href')); //update the paging link
             $this.attr('class',$btn.attr('class'));
              var $items = $obj.children();
              $($element).append($items);
         });

}

$('#memorials a.more-posts').on('click', moreListPostsClick);

morePostsClick = function(e){
  e.preventDefault();
  $('a.more-posts').off('click', morePostsClick);
  var $url = $(this).attr('href'),
  $element = '#posts',
  $this = $(this);
  $(this).addClass('loading');

      $.get($url).done(function(data){
          $('a.more-posts').on('click', morePostsClick);
        $(this).removeClass('loading');
              var $obj = $(data).find($element);
              var $btn = $(data).find('.more-posts');
             // $this.replaceWith($btn);
            $this.attr('href',$btn.attr('href')); //update the paging link
             $this.attr('class',$btn.attr('class'));
              var $items = $obj.children();

               $container.append($items).masonry('appended',$items);
         });
}

initMasonry = function(){
  //if($('#enlightenment').length){
    $container = $('#news-events-archive #posts'); //masonry element
    $container.masonry({
      itemSelector: 'article',
      isAnimated: !Modernizr.csstransitions
    });
  $('a.more-posts').on('click', morePostsClick);
//} 
}
if($('#news-events-archive #posts').length){
  initMasonry();
}


showTopTierNav = function(){
 
    $('#nav ul a').show();
  $childParentLinks = $('li.menu-item-has-children li')
  $('#nav ul li').hide().not($childParentLinks).show();
  $backButton.hide();
   $('.donate').show();
  $('#nav ul:first li')
}
updateBackButtonLink = function(elm){
  $backButton.off('click').on('click',function(e){
    e.preventDefault();
    console.log(elm)
 if(elm.length)
    elm.trigger( "click" );
 else
    showTopTierNav();
  })
}

destroyMobileMenu = function(){
  $menuParentLinks.off('click');
  $('#nav').removeAttr('style')
}

activateMobileMenu = function(){
console.log('activate mobile menu')
  var $subMenu,
      $hiddenLinks,
      $allLinks = $('#nav ul li'),
      $backButton = $('#nav #mobile-prev');
  $('#mobile-controls a').off('click').on('click',function(e){
  e.preventDefault();
  var $panel = $('#'+$(this).attr('rel')),
      $parent = $(this).parent('li');
  if($parent.hasClass('active')){
    $panel.hide();
   $parent.removeClass('active');
  } else {
    $('.panel').hide();
    $('#mobile-controls li').removeClass('active');
    $panel.show();
    $parent.addClass('active');
  }
})

$menuParentLinks.off('click').on('click',function(e){
      e.preventDefault()
      //e.stopPropagation();
      $('.donate').hide();
      $('#nav ul a').show();
      var $parentLI = $(this).parent('li');
      $allLinks.css({display:'none'});
$backButton.show();
        var $hasNextTier = $('li.menu-item-has-children', $parentLI).length ? true : false;
  $childParentLinks =  $hasNextTier ? $('li.menu-item-has-children li',$parentLI) : '' //if menu has a further tier, dont show next tier menu, only the link
   $subMenuLinks = $('li',$parentLI).not($childParentLinks); 
  $parents = $parentLI.parents('li.menu-item-has-children');  
      _prevParent = $('a:first',$($parents[$parents.length-1]));
  updateBackButtonLink($(_prevParent));
      $parents.each(function(){
        $(this).show();
        $('a:first',$(this)).hide();
      })
      $parentLI.show();
      $(this).hide();
      $subMenuLinks.show();
    
    })

}


// search overlay
refreshSearchOverlay = function(){
  var $width = $('#header .container').width(),
      $screenWidth = $(window).width(),
      $left = ($screenWidth - $width)/2;
  $('#search-overlay').css({
    width: $width+'px',
    left: $left+'px'
  })
  $('a#overlay-close').css({
    right: $left+'px'
  })
}
searchOverlay = function(status){
  switch(status){
    case 'show':
    searchOverlay('hide');
    $("body").append('<div id="overlay"></div>');
    $('body').append('<form id="search-overlay" method="post" action="/" class="container"><label for="s">What are you looking for?</label><input type="text" name="s" id="s" placeholder="Type and hit enter to search" /></form>');
    $('body').append('<a id="overlay-close">Close</a>');
    $('#search-overlay input').focus();
        $("#overlay").css({
          height: $(document).height()
      });
        refreshSearchOverlay();

    break;
    case 'hide':
$('#overlay').remove();
$('#search-overlay').remove();
$('#overlay-close').remove();
    break;
  }
}
$('body').on('click','a#overlay-close',function(e){
  searchOverlay('hide');
})
$('li.search-btn a').on('click',function(e){
  e.preventDefault();
  searchOverlay('show');
})
$(window).on('resize',function(){
  refreshSearchOverlay();
})

replaceFileFields =function(){

     $fileFields = $('input[type=file]');
     $fileFields.each(function(){
    
          $(this).wrap('<div class="file-selector-wrapper" />');

          $(this).css({
               opacity:0,
               cursor:'pointer',
               zIndex: 9999,
               position: 'relative',
          });

var $wrapper = $(this).parent('.file-selector-wrapper');
$wrapper.append('<div class="dummy button">Select</div>');
$wrapper.before(' <img class="preview" src="#" alt="" />');
var $buttonWidth= $('.dummy.button',$wrapper).outerWidth();
var $buttonHeight= $('.dummy.button',$wrapper).outerHeight();

$('.preview').hide().css({
     width:'40%',
     height: 'auto'
});

     $wrapper.css({
          position: 'relative',
          height: $buttonHeight+'px',
          width: $buttonWidth+'px',
          overflow: 'hidden'
          })
    
     $('.dummy.button').css({
          position:'absolute',
          left: '0px',
          top: '0px',
          zIndex:999
     })
        $(this).change(function (e){
      
             input = e.currentTarget;
       var filename = $(this).val();
       $wrapper.next('.selected-file').html(filename);

                   var reader = new FileReader(); //show preview of selected image
                    reader.onload = function(e) {
                    $('.preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
           
  
     });

     })

}

replaceImage = function(){
  var _images = $('.replace-img');
  _images.each(function(){
    var _mobileSrc =$(this).attr('data-mobilesrc'),
        _desktopSrc = $(this).attr('data-desktopsrc'),
        _currentSrc = $(this).attr('src');
    if(isMobile){
       if(_currentSrc!=_mobileSrc){
        $(this).attr('src',_mobileSrc);
      }
    } else {
         if(_currentSrc!=_desktopSrc){
        $(this).attr('src',_desktopSrc);
      }
    }
  })
}

updateMenu = function(){
  isMobileNav = $(window).width() <= 1130;
  isMobile = $(window).width() <= 660;
  if(isMobileNav){
    activateMobileMenu();
  } else {
    destroyMobileMenu();
  }

  if(isMobile){
    if(!_accordionActive){
  _accordion = $('#index').accordion({
      handles: 'h3',
      blocks: 'span'
    })
    _accordionActive = true;
  }
  } else {
    if(_accordionActive){
    _accordion.destroyAccordion();
    _accordionActive = false;
   }
 }
 replaceImage();
 
}
replaceFileFields();
updateMenu();

$(window).on('resize',updateMenu);


});