var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');
var csrf_token = document.getElementsByName('csrf-token')[0].getAttribute('content');

$(function(){

  $('[data-bs-toggle="tooltip"]').tooltip(); 
  new WOW().init();

  $(window).on("scroll", function() {
    if($(window).scrollTop())
    {
        $('#header').css('background', 'rgba(0, 0, 0, .8)');
        $('#header').addClass('shadow');
    }else
    {
        $('#header').css('background', 'rgba(0, 0, 0, .0)');
        $('#header').removeClass('shadow');
    }
  })

  $('#cart_user').on('click',function(e){
    e.preventDefault();
    if($('.cartlist').hasClass('cartlist-active'))
    {
        $('.cartlist').removeClass('cartlist-active');
        $('.fondo-cart').removeClass('fondo-cart-active');
    }else
    {
        $('.cartlist').addClass('cartlist-active');
        $('.fondo-cart').addClass('fondo-cart-active');
    }
  });

  $('.cartlist_close').on('click',function(){
      if($('.cartlist').hasClass('cartlist-active'))
      {
          $('.cartlist').removeClass('cartlist-active');
          $('.fondo-cart').removeClass('fondo-cart-active');
      }
  });

  $("input[name=telephone]").bind("change keyup input", function() {
    var position = this.selectionStart - 1;
    var fixed = this.value.replace(/[^0-9]/g, "");

    if (this.value !== fixed) {
      this.value = fixed;
      this.selectionStart = position;
      this.selectionEnd = position;
    }
  });

  $('.a_forgot').on('click', function(e){
    e.preventDefault();
    $('#modal_login').hide();
    $('#modal_forgot').addClass('d-flex');
    $('#modal_forgot').show();
  });

  $('.a_back_login').on('click', function(e){
    e.preventDefault();
    $('#modal_forgot').removeClass('d-flex');
    $('#modal_forgot').hide();
    $('#modal_login').show();
  });

  $('#choose-file').on('change', function () {
		var i = $(this).prev('label').clone();
		var file = $('#choose-file')[0].files[0].name;
		$(this).prev('label').text(file);
	});

  $('#form_login').on('submit', function(e){
      var formData = new FormData($(this)[0]);
      $.ajax({
          type: "POST",
          url: base + '/myaccount/loginPost',
          data: formData,
          dataType: 'json',
          success: function success(response) {
            console.log(response);
            if(response.success == false){
                $('#alert_login').removeClass('d-none');
            }else{
              $('#alert_login_success').removeClass('d-none');
              $('#alert_login').addClass('d-none');
              $('#form_login').find(':submit').attr('disabled', true);
              $('#form_login').find(':submit').html('<i class="fa fa-spinner fa-spin"></i> Ingresando ...');
              window.location.href = base + '/' + response.ruta;
            }
          },
          cache: false,
          contentType: false,
          processData: false,
          error: function error(_error3, e) {
              console.log(_error3);
              console.log(e);
          }
      });
      return false;
  })

  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else{ // for me
          form.classList.add('submitted'); // for me
          $('input[type=submit]').attr('value', 'Enviando ...');
          $('input[type=submit]').attr('disabled', true);
          $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i> Enviando ...');
          $(this).find(':submit').attr('disabled', true);
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

  $('.carousel-header').slick({
    cssEase: 'linear',
    dots: false,
    arrows: true,
    infinite: true,
    fade: true,
    autoplay: true,
    autoplaySpeed: 6000,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.carousel-upcoming-matches').slick({
    dots: false,
    arrows: true,
    infinite: false,
    autoplay: true,
    autoplaySpeed: 6000,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.carousel-slider').slick({
      cssEase: 'linear',
      dots: true,
      infinite: true,
      fade: true,
      autoplay: true,
      autoplaySpeed: 6000,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: false,
      responsive: [
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }               
      ]
  });

  $('.carousel-eventos').slick({
      dots: true,
      infinite: false,
      fade: false,
      autoplay: false,
      autoplaySpeed: 10000,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: false,
      responsive: [
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }               
      ]
  });

  $('.carousel-testimonios').slick({
      dots: true,
      slidesToShow: 3,
      centerPadding: '0px',
      centerMode: true,
      arrows: false,
      responsive: [
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 1,
            }
          }               
      ]
  });

  $('.carousel-blog').slick({
    dots: true,
    arrows: true,
    infinite: false,
    fade: false,
    autoplay: true,
    autoplaySpeed: 10000,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.carousel-nosotros').slick({
    centerPadding: '30px',
    autoplay: true,
    autoplaySpeed: 10000,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.carousel-consejo-directivo').slick({
    dots: true,
    slidesToShow: 5,
    centerPadding: '100px',
    centerMode: true,
    arrows: false,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
          }
        }               
    ]
  });

  $('.carousel-eventos-page').slick({
    dots: true,
    arrows: true,
    infinite: false,
    fade: false,
    autoplay: true,
    autoplaySpeed: 10000,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.slider-for-talleres').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: false,
    asNavFor: '.slider-nav-talleres',
    responsive: [
      {
        breakpoint: 800,
        settings: {
          dots: true,
        }
      }               
    ]
  });

  $('.slider-nav-talleres').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 500,
    asNavFor: '.slider-for-talleres',
    dots: true,
    arrows: true,
    centerMode: true,
    focusOnSelect: true
  });

  $('.carousel-talleres').slick({
    centerPadding: '30px',
    autoplay: true,
    autoplaySpeed: 10000,
    slidesToShow: 3,
    centerMode: true,
    responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }               
    ]
  });

  $('.slider-for-event-buy').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    dots: false,
    asNavFor: '.slider-nav-event-buy',
    responsive: [
      {
        breakpoint: 800,
        settings: {
          dots: true,
        }
      }               
    ]
  });

  $('.slider-nav-event-buy').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 500,
    asNavFor: '.slider-for-event-buy',
    dots: false,
    arrows: false,
    centerMode: false,
    focusOnSelect: true
  });


  $('.burgergg').on('click',function(){
      if($('.nav-mobile').hasClass('nav-mobile-active'))
      {
          $('.nav-mobile').removeClass('nav-mobile-active');
          $('.fondo').removeClass('fondo-active');
      }else
      {
          $('.nav-mobile').addClass('nav-mobile-active');
          $('.fondo').addClass('fondo-active');
      }
      if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
      if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
      if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
  });

  $('.btn-cerrar').on('click',function(){
      if($('.nav-mobile').hasClass('nav-mobile-active'))
      {
          $('.nav-mobile').removeClass('nav-mobile-active');
      }else
      {
          $('.nav-mobile').addClass('nav-mobile-active');
      }
      if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
      if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
      if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
  });

})