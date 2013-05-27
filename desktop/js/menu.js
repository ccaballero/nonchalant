/* menu */

$(document).ready(function(){
    $('.home a').click(function(){
        $('#menu').toggleClass('visible');
        return false;
    })

    $('.a_terminal').click(function() {
        WindowFactory('terminal','','25%','25%','50%','50%')
        $('#menu').removeClass('visible');
        return false;
    })
})
