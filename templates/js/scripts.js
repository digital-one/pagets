$(function(){

//slider and carousels

	$('#slider').slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 2000,
  		arrows: false
	});

	$('#carousel').slick({
  		dots: false,
  		arrows: true,
  		infinite: true,
  		speed: 300,
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		responsive: [
    	{
      		breakpoint: 1024,
      		settings: {
        	slidesToShow: 3,
        	slidesToScroll: 1,
        	infinite: true,
        	dots: true
      	}
    },
    	{
      		breakpoint: 600,
      		settings: {
        	slidesToShow: 2,
        	slidesToScroll: 1
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

// selectbox replacement

$('select').selectBox();

//masonry

if($('#news-events-archive').length){
var msnry = new Masonry( '#news-events-archive #posts', {
  itemSelector: 'article'
});
}

});