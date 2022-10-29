(function($) {

	$(document).ready(function() {
	  $('body').addClass('js');
	  var $menu = $('#menu'),
	    $menulink = $('.menu-link');

	$menulink.click(function() {
	  $menulink.toggleClass('active');
	  $menu.toggleClass('active');
	  return false;
	});});


	videoPopup();


	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:30,
	    nav:true,
	    autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        550:{
	            items:2
	        },
	        750:{
	            items:3
	        },
	        1000:{
	            items:4
	        },
	        1200:{
	            items:5
	        }
	    }
	})


	$(".Modern-Slider").slick({
	    autoplay:true,
	    autoplaySpeed:10000,
	    speed:600,
	    slidesToShow:1,
	    slidesToScroll:1,
	    pauseOnHover:false,
	    dots:true,
	    pauseOnDotsHover:true,
	    cssEase:'fade',
	   // fade:true,
	    draggable:false,
	    prevArrow:'<button class="PrevArrow"></button>',
	    nextArrow:'<button class="NextArrow"></button>',
	});


	$("div.features-post").hover(
	    function() {
	        $(this).find("div.content-hide").slideToggle("medium");
	    },
	    function() {
	        $(this).find("div.content-hide").slideToggle("medium");
	    }
	 );


	$( "#tabs" ).tabs();


	// (function init() {
	//   function getTimeRemaining(endtime) {
	//     var t = Date.parse(endtime) - Date.parse(new Date());
	//     var seconds = Math.floor((t / 1000) % 60);
	//     var minutes = Math.floor((t / 1000 / 60) % 60);
	//     var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
	//     var days = Math.floor(t / (1000 * 60 * 60 * 24));
	//     return {
	//       'total': t,
	//       'days': days,
	//       'hours': hours,
	//       'minutes': minutes,
	//       'seconds': seconds
	//     };
	//   }

	//   function initializeClock(endtime){
	//   var timeinterval = setInterval(function(){
	//     var t = getTimeRemaining(endtime);
	//     document.querySelector(".days > .value").innerText=t.days;
	//     document.querySelector(".hours > .value").innerText=t.hours;
	//     document.querySelector(".minutes > .value").innerText=t.minutes;
	//     document.querySelector(".seconds > .value").innerText=t.seconds;
	//     if(t.total<=0){
	//       clearInterval(timeinterval);
	//     }
	//   },1000);
	// }
	// initializeClock(((new Date()).getFullYear()+1) + "/1/1")
	// })()

})(jQuery);
// slider

let valueDisplays = document.querySelectorAll(".num2");
let interval = 4000;
valueDisplays.forEach((valueDisplay) => {
	let startValue = 0;
	let endValue = parseInt(valueDisplay.getAttribute("data-to"));
	let duration = Math.floor(interval / endValue);
	let counter = setInterval(function() {
		startValue += 1;
		valueDisplay.textContent = startValue;
		if (startValue == endValue) {
			clearInterval(counter);
		}
	}, duration);
});


const slides = document.querySelector(".slider").children;
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const indicator = document.querySelector(".indicator");
let index = 0;


prev.addEventListener("click", function() {
	prevSlide();
	updateCircleIndicator();
	resetTimer();
})

next.addEventListener("click", function() {
	nextSlide();
	updateCircleIndicator();
	resetTimer();

})

// create circle indicators
function circleIndicator() {
	for (let i = 0; i < slides.length; i++) {
		const div = document.createElement("div");
		div.innerHTML = i + 1;
		div.setAttribute("onclick", "indicateSlide(this)")
		div.id = i;
		if (i == 0) {
			div.className = "active";
		}
		indicator.appendChild(div);
	}
}
circleIndicator();

function indicateSlide(element) {
	index = element.id;
	changeSlide();
	updateCircleIndicator();
	resetTimer();
}

function updateCircleIndicator() {
	for (let i = 0; i < indicator.children.length; i++) {
		indicator.children[i].classList.remove("active");
	}
	indicator.children[index].classList.add("active");
}

function prevSlide() {
	if (index == 0) {
		index = slides.length - 1;
	} else {
		index--;
	}
	changeSlide();
}

function nextSlide() {
	if (index == slides.length - 1) {
		index = 0;
	} else {
		index++;
	}
	changeSlide();
}

function changeSlide() {
	for (let i = 0; i < slides.length; i++) {
		slides[i].classList.remove("active");
	}

	slides[index].classList.add("active");
}

function resetTimer() {
	// when click to indicator or controls button
	// stop timer
	clearInterval(timer);
	// then started again timer
	timer = setInterval(autoPlay, 4000);
}


function autoPlay() {
	nextSlide();
	updateCircleIndicator();
}

let timer = setInterval(autoPlay, 4000);
// marquee
// function Marquee(selector, speed) {
// 	const parentSelector = document.querySelector(selector);
// 	const clone = parentSelector.innerHTML;
// 	const firstElement = parentSelector.children[0];
// 	let i = 0;
// 	// console.log(firstElement);
// 	parentSelector.insertAdjacentHTML('beforeend', clone);
// 	parentSelector.insertAdjacentHTML('beforeend', clone);

// 	setInterval(function () {
// 	  firstElement.style.marginLeft = `-${i}px`;
// 	  if (i > firstElement.clientWidth) {
// 		i = 0;
// 	  }
// 	  i = i + speed;
// 	}, 0);
//   }

  //after window is completed load
  //1 class selector for marquee
  //2 marquee speed 0.2
//   window.addEventListener('load', Marquee('.marquee', 0.2))
//   scroll-top
let scrollPercentage = () => {
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollValue = Math.round( pos * 100 / calcHeight);

    scrollProgress.style.background = `conic-gradient(#008fff ${scrollValue}%, #c0c0ff ${scrollValue}%)`;
    progressValue.textContent = `${scrollValue}%`;
}

window.onscroll = scrollPercentage;
window.onload = scrollPercentage;

