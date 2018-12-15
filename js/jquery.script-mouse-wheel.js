// $(function () {
//     if($(window).width() > 768)
//         window.addEventListener('wheel', wheelListener);
//
//     $(window).resize(function () {
//         if ($(window).width() > 768)
//             window.addEventListener('wheel', wheelListener);
//         else
//             window.removeEventListener('wheel', wheelListener);
//     });
// });
// function wheelListener(e) {
//     let el;
//     if (e.deltaY < 0)
//         el = $("section.active").prev("section");
//     else if (e.deltaY > 0)
//         el = $("section.active").next("section");
//     e.preventDefault();
//     e.stopPropagation();
//
//     if (!el.length) {
//         if (e.deltaY < 0)
//             el = $("#top");
//     }
//
//     if (animationRunning === false && el.length) {
//         animationRunning = true;
//         $('html, body').animate({
//             scrollTop: el.offset().top
//         }, 1000, function () {
//             $("section.active").removeClass("active");
//             el.addClass("active");
//             animationRunning = false;
//             window.location.hash = '#'+el.attr("id");
//         });
//     }
// }