/* the window factory */

WindowFactory=function(title,content,top,left,width,height){
    var w=WindowManager.create(title,content,top,left,width,height);

    $('#desktop').append(w.render())
    $('#taskbar .tasks ul').append(w.task())

    $('#desktop div.window[name='+config.window.selector+WindowManager.active+']').removeClass('active')
    $('#taskbar .tasks ul li[name='+config.taskbar.selector+WindowManager.active+']').removeClass('active')

    WindowManager.active=w.id

    $('#desktop div.window[name='+config.window.selector+w.id+']').addClass('active')
    $('#taskbar .tasks ul li[name='+config.taskbar.selector+w.id+']').addClass('active')

    $('.window[name='+config.window.selector+w.id+']')
        .css('top',w.top)
        .css('left',w.left)
        .css('width',w.width)
        .css('height',w.height)
        .draggable({
            snap:true,
            handle:'.border',
            containment:'#desktop',
            scroll:false,
            stop:function(event,ui){
                var w=WindowManager.list[$(this).attr('name').substring(config.window.selector.length)]
                w.top=ui.position.top+'px'
                w.left=ui.position.left+'px'
            }})
        .resizable({
            containment:'#desktop',
            stop:function(event,ui){
                var w=WindowManager.list[$(this).attr('name').substring(config.window.selector.length)]
                w.width=ui.size.width+'px'
                w.height=ui.size.height+'px'
            }
        })
    $('.window[name='+config.window.selector+w.id+'] .minimize').click(function(){
        WindowManager.minimize($(this).parents('.window').attr('name').substring(config.window.selector.length))
        Taskbar.resize()
        return false
    })
    $('.window[name='+config.window.selector+w.id+'] .maximize').click(function(){
        var w=WindowManager.list[$(this).parents('.window').attr('name').substring(config.window.selector.length)]
        if(w.status=='normal'){
            WindowManager.maximize(w.id)
        }else if(w.status=='maximized'){
            WindowManager.restore(w.id)
        }
        Taskbar.resize()
        return false
    })
    $('.window[name='+config.window.selector+w.id+'] .close').click(function(){
        WindowManager.close($(this).parents('.window').attr('name').substring(config.window.selector.length))
        Taskbar.resize()
        return false
    })
    $('.window[name='+config.window.selector+w.id+'] .border').click(function(){
        WindowManager.activate($(this).parents('.window').attr('name').substring(config.window.selector.length))
        return false
    })
    $('.window[name='+config.window.selector+w.id+'] .border').dblclick(function(){
        var w=WindowManager.list[$(this).parents('.window').attr('name').substring(config.window.selector.length)]
        switch(w.status){
            case 'normal':
                WindowManager.maximize(w.id)
                break
            case 'maximized':
                WindowManager.restore(w.id)
                break
        }
        return false
    })
    $('.tasks ul li[name='+config.taskbar.selector+w.id+']').click(function(){
        var w=WindowManager.list[$(this).attr('name').substring(config.window.selector.length)]
        switch(w.status){
            case 'minimized':
                WindowManager.restore(w.id)
                break
            case 'normal':
                WindowManager.minimize(w.id)
                break
            case 'maximized':
                WindowManager.restore(w.id)
                break
        }
        return false
    })
    Taskbar.resize()
}
