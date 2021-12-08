$(document).ready(function () {
	// GeoTargeting
	$.getJSON('https://api.ipinfodb.com/v3/ip-country/?key=1ca069453246288ee1362b6617fce733f0b6c54f072e638678203a65af6ab31d&format=json&callback=?', function(data) {
		var countryCode = getCookie("countryCode");
		//var ip = getCookie("ip");
		// console.log(data.countryCode);
		if(countryCode == null || countryCode == ''){
			setCookie('countryCode', data.countryCode, 30);
            // console.log(getCookie('countryCode')+'*');
            countryCode = getCookie("countryCode");
		}
		// console.log(countryCode);
	});

	$('.lang.clickable').click(function(e){
		//e.preventDefault();
		var lang = $(this).text();
		lang = lang.toLowerCase();
		var langSwitched = getCookie("la_switched");
		if(langSwitched !== 'en' || langSwitched !== 'he'){
			setCookie('la_switched', lang, 30);
		}
	});
	
	// Anchor links smooth scrolling
    // $('a[href*="#"]:not([href="#"])').click(function () {
    //     if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    //         let target = $(this.hash);
    //         target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //         if (target.length) {
    //             $('html, body').animate({
    //                 scrollTop: target.offset().top - headerHeight
    //             }, 1000);
    //             return false;
    //         }
    //     }
    // });
    // Drop Down Menu
    if ($(window).width() >= 992) {
        $("nav li").hover(
            function () {
                $(this).addClass('active');
                $(this).find('ul').addClass('flexit').stop(true, true);
            },
            function () {
                $(this).removeClass('active');
                $(this).find('ul').removeClass('flexit').stop(true, true);
            });
    } else {
        $(".sub-menu li a").click(function () {
            $(".hamburger").toggleClass("menu-active");
            $('nav').slideUp(300);
        })

    }

    $('#product-details .tabs li a').on('show.bs.tab', function(e) {
      let target = $(e.target).data('target');
      $(target).addClass('active show').siblings('.tab-pane.active').removeClass('active show');
    });
    // Clear placeholder on focus
    // $('input, textarea').on('focus', function(){
    //     if($(this).attr('placeholder')){
    //        window.oldph = $(this).attr('placeholder');
    //         $(this).attr('placeholder', ' ');
    //     };
    //  });

    // Convert tabs to select drop down
    $('#tabs-select').on('change', function (e) {
        $('.tabs li a').eq($(this).val()).tab('show'); 
    });
    // Convert tabs to select drop down - BLOG
    // $('#blog-select').on('change', function (e) {
    //     let url = $('#blog-hero nav ul li a').eq($(this).val());
    //     console.log(url)
    //     // window.location = url;
    //     return false;
    // });

    // Hamburger menu trigger
    $(".hamburger").click(function () {
        $(this).toggleClass("menu-active");
        // $('.top-header').toggleClass("open");
        // $('.logo-normal').toggleClass('hide');
        // $('.logo-white').toggleClass('show');
        // $('.wrap-nav-mobile').toggleClass('menu-open');
        $('.wrap-nav-mobile').fadeToggle(300);
    });

    let currLang = imc.currLang;
    let sliderDIR = (currLang === 'he-IL') ? true : false;
    console.log(sliderDIR);
    // Testimonials Carousel
    if ($('#testimonials .carousel .item').length > 1) {
        $('#testimonials .carousel').slick({
            infinite: true,
            rtl: sliderDIR,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false,
            dots: true
        });
    }
    // Strains and Oils
    $('#strains-and-oils .carousel').slick({
        infinite: true,
        rtl: sliderDIR,
        slidesToShow: 5,
        // autoplay: true,
        // focusOnSelect: true,
        autoplaySpeed: 5000,
        // centerMode: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    // centerMode: true,
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    asNavFor: '.info',
                    // centerMode: true,
                    slidesToShow: 1
                }
            }
        ]
    });
    // Carousel Info
    $('#strains-and-oils .info').slick({
        infinite: true,
        rtl: sliderDIR,
        // asNavFor: '.carousel',
        slidesToShow: 1,
        fade: true,
        draggable: false,
        adaptiveHeight: true,
        cssEase: 'linear',
        // asNavFor: '.slider-for',
        // autoplay: true,
        autoplaySpeed: 5000,
        arrows: false
    });

    $('#strains-and-oils .carousel .slick-slide').on('click', function () {
        $('.info').slick('slickGoTo', $(this).data('slickIndex'));
        $(this).addClass('selected').siblings().removeClass('selected');
    });

    // Product testimonials carousel

    // Opinion Carousel
    if ($('#opinion .carousel .item').length > 1) {
        $('#opinion .carousel').slick({
            infinite: true,
            rtl: sliderDIR,
            slidesToShow: 1,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 8000,
            arrows: false,
            dots: true
        });
    }

    // Opinion Carousel
    // if ($('#other-related-products .carousel .item').length > 1) {
        $('#other-related-products .carousel').slick({
            infinite: true,
            rtl: sliderDIR,
            slidesToShow: 3,
            autoplaySpeed: 5000,
            arrows: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        // centerMode: true,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        // centerMode: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
    // }

    // Modal Video
    var $videoSrc;
    $('.content-about .video-btn').click(function () {
        $videoSrc = $(this).data("src");
        // console.log($videoSrc);
    });
    // when the modal is opened autoplay it  
    $('#video-modal').on('shown.bs.modal', function (e) {
        // set the video src to autoplay and not to show related video.
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    });
    $('#video-modal').on('hide.bs.modal', function (e) {
        // stop video
        $("#video").attr('src', $videoSrc);
    });


    // Ajax Load More Posts
    $(document).on('click', '#load-more', function (e) {
        e.preventDefault();
        jQuery(this).parent().toggle();
        let nextPage = jQuery(this).attr('href');
        jQuery('#posts-feed-container .append-posts-feed-flow:last-of-type').load( ''+nextPage+' #posts-feed-flow', function() {
            jQuery('#load-more').click (function (e) {
                e.preventDefault();
                jQuery(this).parent().toggle();
                let nextPage = jQuery(this).attr('href');
                jQuery('#posts-feed-container .append-posts-feed-flow:last-of-type').load( ''+nextPage+' #posts-feed-flow', function() {
                    jQuery('#load-more').click (function () {
                        e.preventDefault();
                        let nextPage = jQuery(this).attr('href');
                    })
                })
            })
        })
        // let page = $(this).data('page');
        // let max_pages = $(this).data('max-pages');
        // let newPage = page + 1;
        // $.ajax({
        //     url: imc.ajaxUrl,
        //     type: "POST",
        //     data: {
        //         page: page,
        //         action: 'load_more_posts'
        //     },
        //     success: (data, textStatus, jqXHR) => {
        //         console.log(data);
        //         $(this).data('page', newPage);
        //         $('.posts-flow').append(data);
        //         console.log(page + 'Out OF' + max_pages);
        //         if (page == max_pages - 1) {
        //             $(this).hide();
        //         }
        //     },
        //     error: (jqXHR, textStatus, errorThrown) => {
        //         console.log(errorThrown);
        //     }
        // });
    });
    $('select[multiple]').each(function () {
        $(this).multiselect({
            columns: 1,
            // search: false,
            // searchOptions: {
            //     delay: 250,
            //     showOptGroups: false,
            //     searchText: true,
            //     searchValue: false,
            //     onSearch: function (element) {
            //     }
            // },
            texts: {
                placeholder: $(this).attr('placeholder'),
                search: 'Search',
                selectedOptions: ' selected',
                selectAll: 'Select all',
                unselectAll: 'Unselect all',
                noneSelected: 'None Selected'
            },
            // selectAll: false,
            // selectGroup: false,
            minHeight: 100,
            // maxHeight: null,
            // maxWidth: null,
            // maxPlaceholderWidth: null,
            // maxPlaceholderOpts: 10,
            showCheckbox: true,
            // optionAttributes: [],
            // onLoad: function (element) {
            // },
            // onOptionClick: function (element, option) {
            // },
            // onControlClose: function (element) {
            // },
            // onSelectAll: function (element) {
            // },
            // minSelect: false,
            // maxSelect: false
        });
    });
});


//faq
$('.faq-link').on("click", function () {
    $(this).parent().find(".faq-inner").slideToggle();
    $(this).parent().toggleClass("active");
    // $(this).parent().siblings().find(".faq-inner").slideUp();
    // $(this).parent().siblings().removeClass("active");
});

$('.gallery').each(function () {
    // set the rel for each gallery
    $(this).find(".gallery-icon a").attr('data-fancybox', 'group-' + jQuery(this).attr('id'));
});


var hreoVid = document.getElementById("myVideo");
if (hreoVid != null && hreoVid.length < 1) {
    $('#button.close,.modal').on('click', function () {
        hreoVid.pause();
    });
    $('.hero .wrap-text .btn').on('click', function () {
        hreoVid.play();
    });
}


// $('.background-pop').on('click', function () {
//     $('#thumbs,.close-btn-gallery').fadeOut(300);
//     $(this).fadeOut(300);
//     $('.popup-map').fadeOut(300);
//     $('.popup-search').fadeOut(300);
//     $('#popup').removeClass('popup');
//     return false;
//     // $('.popup').fadeOut(300);
// });

// document.addEventListener( 'wpcf7mailsent', function( event ) {
//     if ( '29' == event.detail.contactFormId ) {
//         $('#sticky-form').fadeOut(300);
//     } 
// }, false )

document.addEventListener( 'wpcf7mailsent', function( event ) {
    // Case resources after submit
    if ( '244' == event.detail.contactFormId ) {
        $('.order-received').fadeIn(500);
    }
}, false );

// Add class .table to all posts table if exist
$('#post-area table').addClass('table');
if ($(window).width() <= 992) {
    $('#post-area table').wrap('<div class="table-responsive"></div>');
}

//jQuery to collapse the navbar on scroll
let headerHeight1 = $('header').outerHeight();
// console.log(headerHeight);
$(window).scroll(function () {
    if ($(window).scrollTop() >= headerHeight1) {
        $('header').addClass('sticky');
        // $('.home header .logo img.logo-normal').show();
        // $('.home header .logo img.logo-white').hide();
    } else {
        $('header').removeClass('sticky');
        // $('.home header .logo img.logo-normal').hide();
        // $('.home header .logo img.logo-white').show();
    }
});

function marginTopHeader() {
    $('.first-section').css('margin-top', headerHeight1);
}

marginTopHeader();





function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}