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
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        vertical: true,
        centerMode: false,
        focusOnSelect: true
    });

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
// With JQuery



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
