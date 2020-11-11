$(function() {
  "use strict";

  //------- Parallax -------//
  skrollr.init({
    forceHeight: false
  });

  //------- Active Nice Select --------//
  $('select').niceSelect();

  //------- hero carousel -------//
  $(".hero-carousel").owlCarousel({
    items:3,
    margin: 10,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:false,
    dots:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items: 2
      },
      810:{
        items:3
      }
    }
  });

  //------- Best Seller Carousel -------//
  if($('.owl-carousel').length > 0){
    $('#bestSellerCarousel').owlCarousel({
      loop:true,
      margin:30,
      nav:true,
      navText: ["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
      dots: false,
      responsive:{
        0:{
          items:1
        },
        600:{
          items: 2
        },
        900:{
          items:3
        },
        1130:{
          items:4
        }
      }
    })
  }

  //------- single product area carousel -------//
  $(".s_Product_carousel").owlCarousel({
    items:1,
    autoplay:false,
    autoplayTimeout: 5000,
    loop:true,
    nav:false,
    dots:false
  });

  //------- mailchimp --------//  
	function mailChimp() {
		$('#mc_embed_signup').find('form').ajaxChimp();
	}
  mailChimp();
  
  //------- fixed navbar --------//  
  $(window).scroll(function(){
    var sticky = $('.header_area'),
    scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });

  //------- Price Range slider -------//
  if(document.getElementById("price-range")){
  
    var nonLinearSlider = document.getElementById('price-range');
    
    noUiSlider.create(nonLinearSlider, {
        connect: true,
        behaviour: 'tap',
        start: [ 500, 4000 ],
        range: {
            // Starting at 500, step the value by 500,
            // until 4000 is reached. From there, step by 1000.
            'min': [ 0 ],
            '10%': [ 500, 500 ],
            '50%': [ 4000, 1000 ],
            'max': [ 10000 ]
        }
    });
  
  
    var nodes = [
        document.getElementById('lower-value'), // 0
        document.getElementById('upper-value')  // 1
    ];
  
    // Display the slider value and how far the handle moved
    // from the left edge of the slider.
    nonLinearSlider.noUiSlider.on('update', function ( values, handle, unencoded, isTap, positions ) {
        nodes[handle].innerHTML = values[handle];
    });
  
  }

});

/* Cart */
function showCart(cart) {
  $('#modal-cart .modal-body').html(cart);
  $('#modal-cart').modal();
  let cartQty = $('#cart-qty').text() ? $('#cart-qty').text() : '';
  if(cartQty) {
    $(".nav-shop__circle").text(cartQty);
  }
}

function clearCart() {
  $.ajax({
    url: 'cart/clear',
    type: 'GET',
    success: function(res) {
      if(!res) alert('Ошибка');
      showCart(res);
    },
    error: function () {
      alert('Error!');
    }
  });
}

$('.add-to-cart').on('click', function(e) {
  e.preventDefault();
  let id = $(this).data('id');
  $.ajax({
    url: '/cart/add',
    data: {id: id},
    type: 'GET',
    success: function(res) {
      if(!res) alert('Ошибка');
      showCart(res);
    },
    error: function () {
      alert('Error!');
    }
  });
  return false;
});

$('#modal-cart .modal-body').on('click', '.del-item', function() {
  let id = $(this).data('id');
  $.ajax({
    url: '/cart/del-item',
    data: {id: id},
    type: 'GET',
    success: function(res) {
      if(!res) alert('Ошибка');
      showCart(res);
    },
    error: function () {
      alert('Error!');
    }
  });
  return false;
});

/* Cart */

