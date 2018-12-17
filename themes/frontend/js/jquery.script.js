var animationRunning= false;
$(function () {
    var gap = 0;
    if($(window).width() <= 768)
        gap = 60;

    var body = $("body");
    var url = window.location.hash, idx = url.indexOf("#");
    var hash = idx !== -1 ? url.substring(idx) : -1;
    if(hash !== -1){
        $('html, body').animate({
            scrollTop: ($(hash).offset().top - gap)
        },0);
        $("section.active").removeClass("active");
        $(hash).addClass("active");
    }

    var vw = $(window).width(),
        vh = $(window).height();
    $(window).resize(function () {
        var nw = $(window).width(),
            nh = $(window).height();

        if($(window).width() <= 768)
            gap = 60;
        else
            gap = 0;
        if($(window).width() <= 768)
            return;
        var url = window.location.hash, idx = url.indexOf("#");
        var hash = idx !== -1 ? url.substring(idx) : -1;
        if(hash !== -1){
            $('html, body').animate({
                scrollTop: ($(hash).offset().top - gap)
            },0);
            $("section.active").removeClass("active");
            $(hash).addClass("active");
        }

        vw = nw;
        vh = nh;
    });

    let shownItem;
    body.on('click', '.navbar li a, .ease-link', function (e) {
        e.preventDefault();
        var href = $(this).attr('href'),
            el = $(href);
        if (href.substr(1, href.length))
            $('html, body').animate({
                scrollTop: (el.offset().top - gap)
            }, 1000,function () {
                $("section.active").removeClass("active");
                el.addClass("active");
                animationRunning= false;
                history.replaceState(null, null, ('#'+el.attr('id')));
            });
    }).on("click", ".menu-item > a", function (e) {
        e.preventDefault();

        let src = $(this).find("img").data('src'),
            details = $(this).find(".details").html(),
            modal = $("#show-menu-modal");

        if(src === undefined)
            return;

        modal
            .data("gallery-id", "#"+$(this).parents(".item-carousel").attr("id"))
            .data("index", $(this).parents(".menu-item").index());

        // modal.find(".image-box").fadeOut(100, function() {
        //     modal.find("img").attr('src', src);
        //     modal.find(".detail-box").html(details);
        // }).fadeIn(100);

        modal.find("img").attr('src', src);
        modal.find(".detail-box").html(details);

        $('body, html').addClass("overflow-fix");
        modal.modal("show");
    }).on("click", '.menu-trigger', function (e) {
        e.preventDefault();
        let body = $("body"),
            html = $("html"),
            btn = $(this),
            menu = btn.parent().next("ul");
        if(btn.hasClass("open")) {
            menu.removeClass("open");
            btn.removeClass("open");
        }else{
            menu.addClass("open");
            btn.addClass("open");
        }
    }).on("click", '.nav-trigger', function (e) {
        e.preventDefault();
        let body = $("body"),
            html = $("html"),
            btn = $(this),
            header = btn.parent(),
            menu = header.find("ul");
        if(header.hasClass("open")) {
            body.removeClass("overflow-fix");
            html.removeClass("overflow-fix");
        }else{
            body.addClass("overflow-fix");
            html.addClass("overflow-fix");
        }
        header.toggleClass("open");
    }).on("click", '.header .nav li', function (e) {
        $(".nav-trigger").trigger('click');
    }).on("click", '.navigation .nav.open a', function (e) {
        e.preventDefault();
        let btn = $(this).parents('.navigation').find(".menu-trigger");
        btn.trigger('click');
    });

    $("#show-menu-modal").on("hide.bs.modal", function () {
        $('body, html').removeClass("overflow-fix");
    });

    if($("#slider").length) {
        $("#slider").owlCarousel({
            items: 1,
            nav: false,
            dots: true
        });
    }

    $(document).on('scroll',function(e){
        if(window.pageYOffset > $('section#top').height())
            $(".top-btn").addClass('active');
        else
            $(".top-btn").removeClass('active');
        $('section').each(function() {
            if (($(this).offset().top - gap) <= window.pageYOffset
                && ($(this).offset().top - gap) + $(this).height() > window.pageYOffset
            ) {
                $("section.active").removeClass("active");
                $(this).addClass("active");
                history.replaceState(null, null, ('#'+$(this).attr('id')));
            }
        });
    });

});