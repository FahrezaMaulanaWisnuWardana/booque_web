$(window).scroll(function() {
  var scrollTop = $(window).scrollTop();
  if ( scrollTop > 10 ) { 
    $("header").addClass('active-header')
  }else{
  	$("header").removeClass('active-header')
  }
});
$("#owl-team").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<i class='fa fa-chevron-left position-absolute top-50 start-0 translate-middle-y' style='left:20px;'></i>","<i class='fa fa-chevron-right position-absolute top-50 end-0 translate-middle-y' style='right:20px;'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
let rightArrow = `<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="18.5" cy="18.5" r="18.5" fill="white" fill-opacity="0.69"/>
<path d="M12 18H26" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19 11L26 18L19 25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`
let leftArrow = `<svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="18.5" cy="18.5" r="18.5" fill="white" fill-opacity="0.69"/>
<path d="M26 18H12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19 25L12 18L19 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`
$("#owl-how-to").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<div class='position-absolute top-50 translate-middle-y' style='left:17px;'>"+leftArrow+"</div>","<div class='position-absolute top-50 translate-middle-y' style='right:17px;'>"+rightArrow+"</div>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});