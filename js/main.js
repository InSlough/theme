"use strict";

var siteUrl = window.location.protocol + "//" + window.location.hostname;

(function ($, undefined) {
  jQuery(document).ready(function () {
    //
    console.log("Start Site jQuery, current Link:", siteUrl); // * SimpleBar Init
    // var SB = new SimpleBar($(".i-body")[0]);
    // Инициализация слайдера

    var mySwiper = new Swiper(".swiper-container", {
      speed: 400,
      spaceBetween: 100,
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      }
    });
    var mySecondSwiper = new Swiper(".second-swiper-container", {
      speed: 400,
      spaceBetween: 32,
      slidesPerView: 3,
      pagination: {
        el: ".second-swiper-pagination",
        type: "bullets"
      }
    }); // = ./jqe/file_name
    // = ./jqe/file_name
    // = ./jqe/file_name
    // = ./jqe/file_name

    console.log("End Site jQuery"); //
  });
  var newarr = [];
  var atr = "";
  var proid = $('.proid').text();

  var _loop = function _loop(pi) {
    newarr[pi] = new Array();
    $("." + pi + " td").each(function (ip) {
      atr = $(this).text();
      newarr[pi][ip] = atr;
    });
  };

  for (var pi = 0; pi <= proid; pi++) {
    _loop(pi);
  }

  var result = [];
  var $data = [];
  $("body").on("click", ".filter-button", function () {
    $(".filter").find("input, textearea, select").each(function () {
      $data[this.name] = $(this).val(); // console.log($data);
    });
    newarr.forEach(function (m, i) {
      result[i] = Math.abs(1 - (m[0] / $data['eco'] * 2 + m[1] / $data['weight'] + m[2] / $data['calorie'] + m[3] / $data['price']) / 5);
      console.log(result[i]);
    });
    result.forEach(function (m, i) {
      m[i];
    });
    $("body").find('.product-single').toggle();
  });
})(jQuery);

var app = function () {
  var body = undefined;
  var menu = undefined;
  var menuItems = undefined;

  var init = function init() {
    body = document.querySelector('body');
    menu = document.querySelector('.menu-icon');
    menuItems = document.querySelectorAll('.menu-main-menu-container .menu-item');
    applyListeners();
  };

  var applyListeners = function applyListeners() {
    menu.addEventListener('click', function () {
      return toggleClass(body, 'nav-active');
    });
  };

  var toggleClass = function toggleClass(element, stringClass) {
    if (element.classList.contains(stringClass)) element.classList.remove(stringClass);else element.classList.add(stringClass);
  };

  init();
}();

function throttle(func, ms) {
  var isThrottled = false,
      savedArgs,
      savedThis;

  function wrapper() {
    if (isThrottled) {
      savedArgs = arguments;
      savedThis = this;
      return;
    }

    func.apply(this, arguments);
    isThrottled = true;
    setTimeout(function () {
      isThrottled = false;

      if (savedArgs) {
        wrapper.apply(savedThis, savedArgs);
        savedArgs = savedThis = null;
      }
    }, ms);
  }

  return wrapper;
}
/**
 * @param json try : return JSON.parse(json)
 * @param rv catch : return !rv ? null : rv
 */


function saveJSONParse(json, rv) {
  try {
    return JSON.parse(json);
  } catch (e) {
    return !rv ? null : rv;
  }
}

function randID() {
  return "_" + Math.random().toString(36).substr(5, 15);
}