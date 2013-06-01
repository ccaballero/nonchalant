/* menu */

$(document).ready(function(){
    $('.a_terminal').click(function() {
        WindowFactory('terminal','','25%','25%','50%','50%')
        $('#menu').removeClass('visible');
        return false;
    })
})
