var focus=function(){$('input[name="command"]').focus()}
var resize_command=function(){
    var s_form=$('form').css('width')
    s_form=parseInt(s_form.substr(0,s_form.length-2))
    var s_span=$('form span.prompt').css('width')
    s_span=parseInt(s_span.substr(0,s_span.length-2))
    $('input[name="command"]').css('width',(s_form-s_span-6)+'px')
}

$(window).resize(resize_command)
$(document).ready(resize_command)

$(document).ready(function(){
    focus()
    $('#main').click(focus)
})
