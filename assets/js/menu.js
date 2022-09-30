/**
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
 
 
 /**
  * header sticky 
  */
 
 const header = document.querySelector("[data-header]");
 const backTopBtn = document.querySelector("[data-back-top-btn]");
 
 window.addEventListener("scroll", function () {
   if (window.scrollY >= 100) {
     header.classList.add("active");
     backTopBtn.classList.add("active");
   } else {
     header.classList.remove("active");
     backTopBtn.classList.remove("active");
   }
 });


/**
 * menu filter
 */

 const addEventOnElem = function (elem, type, callback) {
    if (elem.length > 1) {
      for (let i = 0; i < elem.length; i++) {
        elem[i].addEventListener(type, callback);
      }
    } else {
      elem.addEventListener(type, callback);
    }
  }
  
   const filterBtns = document.querySelectorAll("[data-filter-btn]");
   const filterItems = document.querySelectorAll("[data-filter]");
   
   let lastClickedFilterBtn = filterBtns[0];
  
   const filter = function () {
     lastClickedFilterBtn.classList.remove("active");
     this.classList.add("active");
     lastClickedFilterBtn = this;
   
     for (let i = 0; i < filterItems.length; i++) {
       if (this.dataset.filterBtn === filterItems[i].dataset.filter ||
         this.dataset.filterBtn === "all") {
   
         filterItems[i].style.display = "block";
         filterItems[i].classList.add("active");
   
       } else {
   
         filterItems[i].style.display = "none";
         filterItems[i].classList.remove("active");
   
       }
     }
   }
  
   addEventOnElem(filterBtns, "click", filter);


  /**
 * cart
 */


  const orderBtn = document.querySelector('.js-order-btn');

  const cart = document.querySelector('.js-cart-order');
  
  const orderContainer = document.querySelector('.js-cart-container');
  
  const orderClose = document.querySelector('.js-order-close');
  
  //open the reservation form
  function showOrderList() {
    cart.classList.add('open');
    console.log('working');
  }
  
  //close the reservation form
  function hideOrderList() {
    cart.classList.remove('open');
  }
  
  // for (const bookingBtn of bookingBtns) {
  //   bookingBtn.addEventListener('click', showBookingForm)
  // }

  orderBtn.addEventListener('click', showOrderList);
  
  orderClose.addEventListener('click', hideOrderList);
  
  cart.addEventListener('click', hideOrderList);
  
  orderContainer.addEventListener('click', function (event) {
    event.stopPropagation();
  })
  
  
