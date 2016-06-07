/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
localStorage.removeItem('user');

$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});


var calendar = $("#calendario").calendar({
    language: 'es-ES',
    tmpl_path: "bower_components/bootstrap-calendar/tmpls/",
    events_source: function() {
        return [{
            "id": 1,
            "title": "Cumpleaños de Woosang",
            "class": "event-important",
            "start": 1465209082155,
            "end": 1465239084437
        }, {
            "id": 2,
            "title": "Cumpleaños de Yoochun",
            "class": "event-important",
            "start": 1465209112155,
            "end": 1465239124437
        }, {
            "id": 3,
            "title": "Cumpleaños de AJ",
            "class": "event-important",
            "start": 1465108112155,
            "end": 1465238124437
        }, {
            "id": 4,
            "title": "Cumpleaños de Kim Hyunjoong",
            "class": "event-important",
            "start": 1465708112155,
            "end": 1465808124437
        }, {
            "id": 5,
            "title": "Cumpleaños de Dongwoon",
            "class": "event-important",
            "start": 1465558112155,
            "end": 1465658124437
        }, ];
    }
});


var cerrarSesion = function() {
    localStorage.removeItem('usuario');
    // $('#cerrarSesion').addClass("hide");
    // $('#iniciarSesion').removeClass("hide");
    location.reload();
};