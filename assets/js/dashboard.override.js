$('#my-overlay').hide();

$(window).click(function(ev){
    var elementId = $(ev).prop('target').id;
    if(elementId === 'my-overlay') {
        $('#my-sidebar-nav').css('left','-280px');
        $('#my-overlay').hide();
    }
});

$('#my-sidenav-toggler').click(function(){
    $('#my-sidebar-nav').css('left',0);
    $('#my-overlay').show();
});


$(document).ready(function(){
    var windowWidthInit = $(window).width();
    if(windowWidthInit <= 750) {
        $('#my-sidebar-nav').css('left','-280px');
    }
});

$(window).resize(function(){
    var windowWidth = $(window).width();
    if(windowWidth >= 751) {
        var displayMyOverlay = $('#my-overlay').css('display');

        if(displayMyOverlay === 'block') {
            $('#my-overlay').hide();
        }

        $('#my-sidebar-nav').css('left',0);
    }

    if(windowWidth <= 750) {
        $('#my-sidebar-nav').css('left','-280px');
    }
});

