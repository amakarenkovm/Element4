jQuery(document).ready(function ($) {
  $('.btn-one-click').click(function (e) {
    e.preventDefault()
    $('.modal-one-click').fadeIn()
    $('body').css('overflow', 'hidden')
  })

  $('.overlay').click(function (e) {
    e.preventDefault()
    $('.modal-one-click').fadeOut()
    $('body').css('overflow', 'scroll')
  })

  $('.modal-close').click(function (e) {
    e.preventDefault()
    $('.modal-one-click').fadeOut()
    $('body').css('overflow', 'scroll')
  })

  // Valid phone
  jQuery(document).ready(function () {
    jQuery('#click-phone').mask('+38(999) 999-99-99')
  })

  jQuery(document).ready(function () {
    jQuery('#billing_phone').mask('+38(999) 999-99-99')
  })

  $('.submit-click').click(function (e) {
    $('.modal-by-one-click').addClass('open')
    e.preventDefault()
    priceOrder = $('#one-click').attr('data-price')
    titleOrder = $('#one-click').attr('data-title')
    qtyOrder = $('.qty').val()
    $('.hide-title').val(titleOrder)
    $('.hide-price').val(priceOrder)
    $('.hide-qty').val(qtyOrder)
  })

  $('select').niceSelect()
})
