/*
 * navbar toggle
*/

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const menuToggleBtn = document.querySelector("[data-menu-toggle-btn]");

menuToggleBtn.addEventListener("click", function () {
  navbar.classList.toggle("active");
  this.classList.toggle("active");
});

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    menuToggleBtn.classList.toggle("active");
    
  });
}


/*
 * header sticky 
*/

const header = document.querySelector("[data-header]");
const fixedToolbar = document.querySelector("[data-fixed-tool-bar]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    fixedToolbar.classList.add("active");
  } else {
    header.classList.remove("active");
    fixedToolbar.classList.remove("active");
  }
});


/*
 * reviews slider 
*/

const slider = document.querySelector(".slider");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");
const slides = document.querySelectorAll(".slide");
const numberOfSlides = slides.length;
var slideNumber = 0;

//slider next button
nextBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });

  slideNumber++;

  if(slideNumber > (numberOfSlides - 1)){
    slideNumber = 0;
  }

  slides[slideNumber].classList.add("active");
});

//slider previous button
prevBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });

  slideNumber--;

  if(slideNumber < 0){
    slideNumber = numberOfSlides - 1;
  }

  slides[slideNumber].classList.add("active");

});

//slider autoplay
var playSlider;

var repeater = () => {
  playSlider = setInterval(function(){
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });

    slideNumber++;

    if(slideNumber > (numberOfSlides - 1)){
      slideNumber = 0;
    }

    slides[slideNumber].classList.add("active");
  }, 4000);
}
repeater();

//stop the slider autoplay on mouseover
slider.addEventListener("mouseover", () => {
  clearInterval(playSlider);
});

//start the slider autoplay again on mouseout
slider.addEventListener("mouseout", () => {
  repeater();
});


/*
 * booking form
*/


const bookingBtns = document.querySelectorAll('.js-booking-btn')

const booking = document.querySelector('.js-booking-form') 

const bookingContainer = document.querySelector('.js-booking-container')

const bookingClose = document.querySelector('.js-booking-close')

//open the reservation form
function showBookingForm() {
  booking.classList.add('open')
}

//close the reservation form
function hideBookingForm() {
  booking.classList.remove('open')
}

for (const bookingBtn of bookingBtns) {
  bookingBtn.addEventListener('click', showBookingForm)
}

bookingClose.addEventListener('click', hideBookingForm)

booking.addEventListener('click', hideBookingForm)

bookingContainer.addEventListener('click', function (event) {
  event.stopPropagation()
})


