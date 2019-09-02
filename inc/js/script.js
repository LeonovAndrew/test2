$('.hero_slider').slick({
    arrows: false,
    dots: true,
});
$('.slider_advance_line').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                nextArrow:'<p class="arrow_next text_inf"><i class="fa fa-angle-right" aria-hidden="true"></i></p>',
                prevArrow:'<p class="arrow_prev text_inf"></p>',
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                arrows: true,
                nextArrow:'<p class="arrow_next text_inf"><i class="fa fa-angle-right" aria-hidden="true"></i></p>',
                prevArrow:'<p class="arrow_prev text_inf"></p>',
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                arrows: true,
                nextArrow:'<p class="arrow_next text_inf"><i class="fa fa-angle-right" aria-hidden="true"></i></p>',
                prevArrow:'<p class="arrow_prev text_inf"></p>',
                slidesToScroll: 1,
            }
        }
    ]
});
$('.slider_product').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                rows:2
            }
        }
    ]
});
$('.slider_news').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    arrows: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
});
$('.slider_otz').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
});
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    nextArrow:'<p class="arrow_next arrow_top"><svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.6939 9.83418C11.5389 9.6792 11.5389 9.29174 11.6939 9.13676C11.9264 8.90428 12.2363 8.90428 12.4688 9.13676L17.5832 14.2512C17.7382 14.4062 17.7382 14.7936 17.5832 14.9486L12.3913 20.1406C12.2363 20.2955 11.9264 20.2955 11.6939 20.1406C11.4614 19.9081 11.4614 19.5981 11.6939 19.3656L16.4983 14.6387L11.6939 9.83418Z" fill="#666666" stroke="#666666" stroke-width="1.00739" stroke-miterlimit="22.9256"/>\n' + '<path d="M14.6385 28.2771C22.1709 28.2771 28.2771 22.1709 28.2771 14.6385C28.2771 7.10619 22.1709 1 14.6385 1C7.10619 1 1 7.10619 1 14.6385C1 22.1709 7.10619 28.2771 14.6385 28.2771Z" stroke="#727271" stroke-width="1.00739" stroke-miterlimit="22.9256"/>\n' + '</svg>\n</p>',
    prevArrow:'',
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows:false,
    vertical: true,
    centerMode: false,
    focusOnSelect: true
});
$(document).ready(function(){
    showView();
    function pause(delay) {
        var startTime = Date.now();
        while (Date.now() - startTime < delay);
    }
    $('[data-toggle="tooltip"]').tooltip();
    $(".back_menu").click(function () {
        $(".dropdown:hover>.dropdown-menu").css("display","none");
    });
    $(".nav-link").click(function () {
        $(".dropdown-menu").removeAttr("style");
    })

    window.onscroll = function() {stickyMenu()};
    var navbar = document.getElementById("st_nav");
    var sticky = navbar.offsetTop;
    function stickyMenu() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
    $("input[type='tel']").mask("+7(999) 999-99-99");

    $(document).on('click','.change_view',function(){
        var view=$(this).attr("data-view");
        $(".change_view").removeClass("active");
        $(this).addClass("active");
        $(".catalog_wrap").removeClass("gird line line_gird");
        $(".catalog_wrap").addClass(view);
        $.cookie('view', view);
        console.log(view);

    });
    function showView() {

        if ( $.cookie('view') == null ) {
            $(".catalog_wrap").removeClass("gird line line_gird");
            $(".catalog_wrap").addClass("gird");
            $(".change_view").removeClass("active");
            $("span[data-view='gird']").addClass("active");
        }else{
            var cocieView=$.cookie('view');
            $(".catalog_wrap").removeClass("gird line line_gird");
            $(".catalog_wrap").addClass(cocieView);
            $(".change_view").removeClass("active");
            var data="span[data-view='"+cocieView+"']";
            $(data).addClass("active");

        }
    }
    $("#ex2").slider({});
    $("#ris").slider({});
    getPriseVal();
    getRisVal();
    $("#ex2").change(function(){
        getPriseVal();
    });
    function getPriseVal() {
        if($("#ex2").length>0) {
            var value = $("#ex2").val();
            var arrVal = value.split(",");
            $("#price_max").val(arrVal[1]);
            $("#price_min").val(arrVal[0]);
        }
    }
    $("#ris").change(function(){
        getRisVal();
    });
    function getRisVal() {
        if($("#ris").length>0) {
            var value=$("#ris").val();
            var arrVal = value.split(",");
            $("#ris_max").val(arrVal[1]);
            $("#ris_min").val(arrVal[0]);
        }

    }
    $(".show_more_collapse").click(function(){
        $(this).css("display","none");
        $(this).siblings(".collapse_wrap").fadeIn();
        $(this).siblings(".close_more_collapse").css("display","block");
    });
    $(".close_more_collapse").click(function(){
        console.log($(this).parent())
        $(this).css("display","none");
        $(this).siblings(".show_more_collapse").fadeIn();
        $(this).siblings(".collapse_wrap").css("display","none");
    });

    $(document).on('click',".no_checked",function () {
        $(this).find('input').attr("checked","checked");
        $(this).removeClass('no_checked');
        $(this).addClass('checked');
        console.log("sd");
    });
    $(document).on('click',".checked",function () {
        $(this).find('input').removeAttr("checked");
        $(this).addClass('no_checked');
        $(this).removeClass('checked');
        console.log("sd");
    });
    $(document).on("click",".form_filter button[type='reset']", function() {
        $('.form_filter input').removeAttr("checked");
        $('.checked').addClass('no_checked');
        $(".checked").removeClass('checked');
    });
    $(document).on("click",".filter_mob_btn", function () {
        $(".cat_menu_block").fadeIn();
    });
    $('.cat_menu_block').click(function(e) {
        if ($(e.target).closest('.main_form.form_filter').length == 0) {
            $(this).removeAttr("style");
        }
    });
    $(document).on("click",".filter_close", function () {
        $(".cat_menu_block").removeAttr("style");
    });
    $('.mob_tabs a').click(function(){
        var url = $(this).attr('href');
        var name = $(this).text();
        $('.nav-tabs li a[href="'+url+'"]').tab('show');
        $(".tabs_btn").text(name);
    })
    $('.nav-tabs li a').click(function(){
        var name = $(this).text();
        $(".tabs_btn").text(name);
    })
});


$(document).ready(function(){


    $("input[name='dostavka']").click(function(){
        var data=$(this).attr("data-dost");
        $('.block_dostavka').css("display","none");
        $(data).fadeIn();
        $(".check_dostavka").css("display","none");
    });
    $(".map_show").click(function(){
        var data=$(this).attr("data-map");
        $('.map').css("display","none");
        $('.all_map').css("display","none");
        $("#"+data).fadeIn();
    });

    $(document).on("click",".btn_registr_w50 .btn_main", function () {
        $(".btn_registr_w50").removeClass("active");
        $(".btn_registr_w50").addClass("deactive");
        $(this).parent().removeClass("deactive")
        $(this).parent().addClass("active")
    });
    $(document).on("click",".map_click", function () {
        var mapId = $(this).attr("data-map");
        $(".map").css("display","none");
        $("#"+mapId).css("display","block");

    });



    /*addBlocksFav();
    function addBlocksFav(){
        var withBody = $("body").width();

        if(withBody<560){
            $(".mob_fav_img").after("<div class='block_body_fav'>");
            $(".close_fav").before("<div class='block_body_fav'>");
        }
    }
    window.addEventListener("resize", function() {
        addBlocksFav();
    }, false);*/
});
