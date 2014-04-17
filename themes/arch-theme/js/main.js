$(document).ready(function(){
    $('.category .flat').bxSlider({
        maxSlides: 5,
        auto: false,
        moveSlides: 1,
        moveSlides: 0
    });

    $('.flashnews .flashnews-slide').bxSlider({
        auto: false,
        moveSlides: 1,
        moveSlides: 0
    });

    $('nav .navigation li.login a').click(function () {
        $( "nav .navigation li.login a" ).addClass( "arrow-up" ).removeClass('arrow-down');

        if($("nav .navigation li.login .menu-login").hasClass("fadeOutUp")){
            $("nav .navigation li.login .menu-login").removeClass('fadeOutUp hide').addClass('fadeInDown');
        }else{
            $("nav .navigation li.login .menu-login").removeClass('fadeInDown').addClass('fadeOutUp');
            setTimeout(function(){
                $("nav .navigation li.login .menu-login").addClass('hide');
            },600);
            $( "nav .navigation li.login a" ).addClass( "arrow-down" ).removeClass('arrow-up');
        }
    });

    $(".error p").click(function() {
        $(this).addClass("hide");
    });

    $(".info p").click(function() {
        $(this).addClass("hide");
    });

    stylized ();

});



// ======================== xn ===========================

function stylized () {
    $("*").hover(function () {
        $(this).addClass("hover");
    }, function () {
        $(this).removeClass("hover");
    });

    $(".tab a:first-child").addClass("first");
    $(".tab a:last-child").addClass("last");

    $("input:text").addClass("text");
    $("input:password").addClass("password");
    $("input:reset").addClass("reset");
    $("input:submit").addClass("submit");
    $("input:button").addClass("button");
    $("input:radio").addClass("radio");

    $("ul > li:nth-child(odd), ol > li:nth-child(odd), .list > .comment:nth-child(odd)").addClass("odd");
    $("ul > li:nth-child(even), ol > li:nth-child(even), .list > .comment:nth-child(even)").addClass("even");
    $("ul > li:first-child, ol > li:first-child, .list > .comment:first-child").addClass("first");
    $("ul > li:last-child, ol > li:last-child, .list > .comment:last-child").addClass("last");

    $("[class^=blocks_] > div.block:first-child, [class^=blocks_] > div.block:first").addClass("first");
    $("[class^=blocks_] > div.block:last-child, [class^=blocks_] > div.block:last").addClass("last");

    $("[class^=tablelist] tr:first-child").addClass ("first");
    $("[class^=tablelist] tr:last-child").addClass ("last");
    $("[class^=tablelist] tr:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr:nth-child(even)").addClass ("odd");

    $("[class^=tablelist] tr:first-child td:first-child").addClass ("first");
    $("[class^=tablelist] tr:first-child td:last-child").addClass ("last");
    $("[class^=tablelist] tr:first-child td:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr:first-child td:nth-child(even)").addClass ("odd");

    $("[class^=tablelist] tr td:first-child").addClass ("first");
    $("[class^=tablelist] tr td:last-child").addClass ("last");
    $("[class^=tablelist] tr td:nth-child(odd)").addClass ("even");
    $("[class^=tablelist] tr td:nth-child(even)").addClass ("odd");
}

// =======================================================
