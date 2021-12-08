$(document).ready(function () {

  $.getJSON("https://api.ipinfodb.com/v3/ip-country/?key=1ca069453246288ee1362b6617fce733f0b6c54f072e638678203a65af6ab31d&format=json&callback=?", function (e) {

      var t = getCookie("countryCode");

    //   console.log(e.countryCode), (null != t && "" != t) || (setCookie("countryCode", e.countryCode, 30), console.log(getCookie("countryCode") + "*"), (t = getCookie("countryCode"))), console.log(t);

  }),

      $(".lang.clickable").click(function (e) {

          var t = $(this).text();

          t = t.toLowerCase();

          var o = getCookie("la_switched");

          ("en" === o && "he" === o) || setCookie("la_switched", t, 30);

      }),

      // $(window).width() >= 992

      //     ? $("nav li").hover(

      //           function () {

      //               $(this).addClass("active"), $(this).find("ul").addClass("flexit").stop(!0, !0);

      //           },

      //           function () {

      //               $(this).removeClass("active"), $(this).find("ul").removeClass("flexit").stop(!0, !0);

      //           }

      //       )

      //     : $(".sub-menu li a").click(function () {

      //           $(".hamburger").toggleClass("menu-active"), $("nav").slideUp(300);

      //       }),

      $("#product-details .tabs li a").on("show.bs.tab", function (e) {

          let t = $(e.target).data("target");

          $(t).addClass("active show").siblings(".tab-pane.active").removeClass("active show");

      }),

      $("#tabs-select").on("change", function (e) {

          $(".tabs li a").eq($(this).val()).tab("show");

      }); 

      // $(".hamburger").click(function () {

      //     $(this).toggleClass("menu-active"), $(".wrap-nav-mobile").fadeToggle(300);

      // });

  let e = "he-IL" === imc.currLang;

  var t;

//   console.log(e),

      $("#testimonials .carousel .item").length > 1 && $("#testimonials .carousel").slick({ infinite: !0, rtl: e, slidesToShow: 1, autoplay: !0, autoplaySpeed: 5e3, arrows: !1, dots: !0 }),

      $("#strains-and-oils .carousel").slick({

          infinite: !0,

          rtl: e,

          slidesToShow: 5,

          autoplaySpeed: 5e3,

          arrows: !0,

          focusOnChange: true,

          accessibility: true,

          responsive: [

              { breakpoint: 992, settings: { slidesToShow: 3 } },

              { breakpoint: 768, settings: { asNavFor: ".info", slidesToShow: 1 } },

          ],

      }),

      $("#strains-and-oils .info").slick({ infinite: !0, rtl: e, slidesToShow: 1, fade: !0, draggable: !1, adaptiveHeight: !0, cssEase: "linear", autoplaySpeed: 5e3, arrows: !1 }),

      $("#strains-and-oils .carousel .slick-slide").on("click", function () {

          $(".info").slick("slickGoTo", $(this).data("slickIndex")), $(this).addClass("selected").siblings().removeClass("selected");

      }),

      $("#opinion .carousel .item").length > 1 &&

          $("#opinion .carousel").slick({ infinite: !0, rtl: e, slidesToShow: 1, fade: !0, cssEase: "linear", autoplay: !0, autoplaySpeed: 8e3, arrows: !1, dots: !0, focusOnChange: true, accessibility: false }),

      $("#other-related-products .carousel .item").length > 1 &&

          $("#other-related-products .carousel").slick({

              infinite: !0,

              rtl: e,

              slidesToShow: 3,

              autoplaySpeed: 5e3,

              arrows: !0,

              responsive: [

                  { breakpoint: 992, settings: { slidesToShow: 2 } },

                  { breakpoint: 768, settings: { slidesToShow: 1 } },

              ],

          }),

      $(".content-about .video-btn").click(function () {

          t = $(this).data("src");

      }),

      $("#video-modal").on("shown.bs.modal", function (e) {

          $("#video").attr("src", t + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");

      }),

      $("#video-modal").on("hide.bs.modal", function (e) {

          $("#video").attr("src", t);

      }),

    //   $(document).on("click", "#load-more", function () {

    //       let e = $(this).data("page"),

    //           t = $(this).data("max-pages"),

    //           o = e + 1;

    //       $.ajax({

    //           url: imc.ajaxUrl,

    //           type: "POST",

    //           data: { page: e, action: "load_more_posts" },

    //           success: (i, a, s) => {

    //               $(this).data("page", o), $(".posts-flow").append(i), console.log(e + "Out OF" + t), e == t - 1 && $(this).hide();

    //           },

    //           error: (e, t, o) => {

    //               console.log(o);

    //           },

    //       });

    //   }),

      $("select[multiple]").each(function () {

          $(this).multiselect({

              columns: 1,

              texts: { placeholder: $(this).attr("placeholder"), search: "Search", selectedOptions: " selected", selectAll: "Select all", unselectAll: "Unselect all", noneSelected: "None Selected" },

              minHeight: 100,

              showCheckbox: !0,

          });

      });

}),

  $(".faq-link").on("click", function () {

      $(this).parent().find(".faq-inner").slideToggle(), $(this).parent().toggleClass("active");

  }),

  $(".gallery").each(function () {

      $(this)

          .find(".gallery-icon a")

          .attr("data-fancybox", "group-" + jQuery(this).attr("id"));

  });

var hreoVid = document.getElementById("myVideo");

null != hreoVid &&

  hreoVid.length < 1 &&

  ($("#button.close,.modal").on("click", function () {

      hreoVid.pause();

  }),

  $(".hero .wrap-text .btn").on("click", function () {

      hreoVid.play();

  })),

  document.addEventListener(

      "wpcf7mailsent",

      function (e) {

          "244" == e.detail.contactFormId && $(".order-received").fadeIn(500);

      },

      !1

  ),

  $("#post-area table").addClass("table"),

  $(window).width() <= 992 && $("#post-area table").wrap('<div class="table-responsive"></div>');

let headerHeight = $("header").outerHeight();

function marginTopHeader() {

  $(".first-section").css("margin-top", headerHeight);

}

function setCookie(e, t, o) {

  var i = new Date();

  i.setTime(i.getTime() + 24 * o * 60 * 60 * 1e3);

  var a = "expires=" + i.toUTCString();

  document.cookie = e + "=" + t + ";" + a + ";path=/";

}

function getCookie(e) {

  for (var t = e + "=", o = decodeURIComponent(document.cookie).split(";"), i = 0; i < o.length; i++) {

      for (var a = o[i]; " " == a.charAt(0); ) a = a.substring(1);

      if (0 == a.indexOf(t)) return a.substring(t.length, a.length);

  }

  return "";

}

$(window).scroll(function () {

  $(window).scrollTop() >= headerHeight ? $("header").addClass("sticky") : $("header").removeClass("sticky");

}),

  marginTopHeader();

$(document).ready(function () {

  jQuery("#popup-thankyou .close-btn").click(function () {

      jQuery("#popup-thankyou").toggleClass("show");

  });

  jQuery("#popup-thankyou-he .close-btn").click(function () {

      jQuery("#popup-thankyou-he").toggleClass("show");

  });

  $(".set > a").on("click", function(event) {

	event.preventDefault();

    if ($(this).hasClass("active")) {

      $(this).removeClass("active");

      $(this)

        .siblings(".content")

        .slideUp(200);

      $(".set > a i")

        .removeClass("fa-minus")

        .addClass("fa-plus");

    } else {

      $(".set > a i")

        .removeClass("fa-minus")

        .addClass("fa-plus");

      $(this)

        .find("i")

        .removeClass("fa-plus")

        .addClass("fa-minus");

      $(".set > a").removeClass("active");

      $(this).addClass("active");

      $(".content").slideUp(200);

      $(this)

        .siblings(".content")

        .slideDown(200);

    }

  });

});

