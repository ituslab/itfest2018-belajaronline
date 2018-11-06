$('#toggle-navbar').click(function(){
    var leftProps = $('#left-nav').css('left');
    if(leftProps === '-250px'){
        $('#left-nav').css('left',0);
    } else {
        $('#left-nav').css('left','-250px');
    }
});