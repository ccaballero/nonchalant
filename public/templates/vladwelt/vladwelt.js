$(document).ready(function() {
    $('#main')
    .draggable({
        snap: true,
        handle: '#title',
        containment: '#wrapper2',
        scroll: false,
        stop: function(event, ui) {
            console.log('drag')
        }
    })
    .resizable({
        containment: '#wrapper2'
    })
    $('#command').focus()
})
