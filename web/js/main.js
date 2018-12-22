(function($) {
  "use strict"

  // NAVIGATION
  var responsiveNav = $('#responsive-nav'),
    catToggle = $('#responsive-nav .category-nav .category-header'),
    catList = $('#responsive-nav .category-nav .category-list'),
    menuToggle = $('#responsive-nav .menu-nav .menu-header'),
    menuList = $('#responsive-nav .menu-nav .menu-list');

  catToggle.on('click', function() {
    menuList.removeClass('open');
    catList.toggleClass('open');
  });

  menuToggle.on('click', function() {
    catList.removeClass('open');
    menuList.toggleClass('open');
  });

  $(document).click(function(event) {
    if (!$(event.target).closest(responsiveNav).length) {
      if (responsiveNav.hasClass('open')) {
        responsiveNav.removeClass('open');
        $('#navigation').removeClass('shadow');
      } else {
        if ($(event.target).closest('.nav-toggle > button').length) {
          if (!menuList.hasClass('open') && !catList.hasClass('open')) {
            menuList.addClass('open');
          }
          $('#navigation').addClass('shadow');
          responsiveNav.addClass('open');
        }
      }
    }
  });

  // HOME SLICK
  // $('#home-slick').slick({
  //   autoplay: true,
  //   infinite: true,
  //   speed: 300,
  //   arrows: true,
  // });
  //
  // // PRODUCTS SLICK
  // $('#product-slick-1').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 2,
  //   autoplay: true,
  //   infinite: true,
  //   speed: 300,
  //   dots: true,
  //   arrows: false,
  //   appendDots: '.product-slick-dots-1',
  //   responsive: [{
  //       breakpoint: 991,
  //       settings: {
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //       }
  //     },
  //     {
  //       breakpoint: 480,
  //       settings: {
  //         dots: false,
  //         arrows: true,
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //       }
  //     },
  //   ]
  // });
  //
  // $('#product-slick-2').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 2,
  //   autoplay: true,
  //   infinite: true,
  //   speed: 300,
  //   dots: true,
  //   arrows: false,
  //   appendDots: '.product-slick-dots-2',
  //   responsive: [{
  //       breakpoint: 991,
  //       settings: {
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //       }
  //     },
  //     {
  //       breakpoint: 480,
  //       settings: {
  //         dots: false,
  //         arrows: true,
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //       }
  //     },
  //   ]
  // });
  //
  // // PRODUCT DETAILS SLICK
  // $('#product-main-view').slick({
  //   infinite: true,
  //   speed: 300,
  //   dots: false,
  //   arrows: true,
  //   fade: true,
  //   asNavFor: '#product-view',
  // });
  //
  // $('#product-view').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   arrows: true,
  //   centerMode: true,
  //   focusOnSelect: true,
  //   asNavFor: '#product-main-view',
  // });

  // PRODUCT ZOOM
  $('#product-main-view .product-view').zoom();

  // // PRICE SLIDER
  // var slider = document.getElementById('price-slider');
  // if (slider) {
  //   noUiSlider.create(slider, {
  //     start: [1, 999],
  //     connect: true,
  //     tooltips: [true, true],
  //     format: {
  //       to: function(value) {
  //         return value.toFixed(2) + '$';
  //       },
  //       from: function(value) {
  //         return value
  //       }
  //     },
  //     range: {
  //       'min': 1,
  //       'max': 999
  //     }
  //   });
  // }

})(jQuery);

$('.follow-btn').click(function(){
    var that = $(this);
    $.ajax({
        url: '/user/follow-product',
        type:'POST',
        data:{product_id: $(this).attr('data-pid'), _csrf: frsc},
        success: function(e) {
            if(e == 1){
               that.addClass('followed');
            } else {
                that.removeClass('followed');
            }
        }
    })
});

$('.loginmodal-submit').click(function(){
  submitLoginForm();
});
$('.loginmodal-container input').keypress(function(e) {
  if(e.keyCode == 13){
      submitLoginForm();
  }
});

    function submitLoginForm(){
        var user = $('#login-form input[name="user"]');
        var pass = $('#login-form input[name="pass"]');
        var token = $('#login-form input[name="_csrf"]');

        var info = $('.loginmodal-container .info');

        $.ajax({
            type: 'POST',
            url: '/user/login',
            data: {u:user.val(), p:pass.val(), '_csrf':token.val() },
            success: function (e) {
                e = JSON.parse(e);
                if(e.status){
                    if(e.redirect == '') {
                        location.reload();
                    } else {
                        location.replace(e.redirect)
                    }
                } else {

                    if(user.val() == '') {
                        user.addClass('error');
                    } else {
                        user.removeClass('error');
                    }

                    if(pass.val() == '') {
                        pass.addClass('error');
                    } else {
                        pass.removeClass('error');
                    }

                    info.text(e.info);
                }
            }
        });
    }


    $('.row-filter .change-list-type').click(function () {
        var type = $(this).attr('data-type');

        $.ajax({
            url: '/user/change-list-type',
            type: 'POST',
            data:{type:type, _csrf: frsc},
            success: function (e) {
                var result = JSON.parse(e);
                if(result.status == 1){
                    location.reload();
                }
            }
        })
    });