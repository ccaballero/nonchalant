$(window).resize(resize_taskbar)
$(document).ready(resize_taskbar)

var layoutmanager=new (function(){
    this.windowcount=0
    this.windowlist={}
    this.indexactive=0
    this.windowtpl=function(id,title,content,top,left,width,height){
        this.id=id
        this.title=title
        this.content=content
        this.top=top
        this.left=left
        this.width=width
        this.height=height
        this.status='normal'
    };
    this.createwindow=function(title,content,top,left,width,height){
        ++this.windowcount
        this.windowlist[this.windowcount]=
            new this.windowtpl(this.windowcount,title,content,top,left,width,height)
        return this.windowlist[this.windowcount]
    };
    this.render=function(window){
        return '<div name="x'+window.id+'" class="window"><div class="border"><div class="title">'+window.title+'</div><div class="controls"><a class="minimize" href="#">-</a><a class="maximize" href="#">o</a><a class="close" href="#">x</a></div></div><div class="content">'+window.content+'</div></div>'
    };
    this.task=function(window){
        return '<li name="t'+window.id+'" class="task"><a href="#">'+window.title+'</a></li>'
    };
})();

var windowfactory=function(t,u,x,y,w,h){
    var w=layoutmanager.createwindow(t,u,x,y,w,h)
    $('#desktop').append(layoutmanager.render(w))
    $('#panel .tasks ul').append(layoutmanager.task(w))
    $('#desktop div.window[name=x'+layoutmanager.indexactive+']').removeClass('active')
    $('#panel .tasks ul li[name=t'+layoutmanager.indexactive+']').removeClass('active')
    layoutmanager.indexactive=w.id
    $('#desktop div.window[name=x'+w.id+']').addClass('active')
    $('#panel .tasks ul li[name=t'+w.id+']').addClass('active')
    $('.window[name=x'+w.id+']')
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
                var w=layoutmanager.windowlist[$(this).attr('name').substring(1)]
                w.top=ui.position.top+"px"
                w.left=ui.position.left+"px"
            }})
        .resizable({
            containment:'#desktop',
            stop:function(event,ui){
                var w=layoutmanager.windowlist[$(this).attr('name').substring(1)]
                w.width=ui.size.width+"px"
                w.height=ui.size.height+"px"
            }
        })
    $('.window[name=x'+w.id+'] .minimize').click(function(){
        var w=layoutmanager.windowlist[$(this).parents('.window').attr('name').substring(1)]
        w.status='minimized'
        $('.window[name=x'+w.id+']').hide()
        return false
    })
    $('.window[name=x'+w.id+'] .maximize').click(function(){
        var w=layoutmanager.windowlist[$(this).parents('.window').attr('name').substring(1)]
        if(w.status=='normal'){
            w.status='maximized'
            $('.window[name=x'+w.id+']')
                .css('top','0px')
                .css('left','0px')
                .css('width',($('#desktop').width())+'px')
                .css('height',($('#desktop').height())+'px')
        }else if(w.status=='maximized'){
            w.status='normal'
            $('.window[name=x'+w.id+']')
                .css('top',w.top)
                .css('left',w.left)
                .css('width',w.width)
                .css('height',w.height)
        }
        return false
    })
    $('.window[name=x'+w.id+'] .close').click(function(){
        var id = $(this).parent().parent().parent().attr('name').substring(1)
        $('.window[name=x'+id+']').remove()
        $('.tasks ul li[name=t'+id+']').remove()
        delete layoutmanager.windowlist[id]
        resize_taskbar()
        return false
    })
    $('.window[name=x'+w.id+'] .border').click(function(){
        var id=$(this).parent().attr('name').substring(1)
        $('.window[name=x'+layoutmanager.indexactive+']').removeClass('active')
        $('.tasks ul li[name=t'+layoutmanager.indexactive+']').removeClass('active')
        layoutmanager.indexactive=id
        $('.window[name=x'+id+']').addClass('active')
        $('.tasks ul li[name=t'+id+']').addClass('active')
        return false
    })
    $('.tasks ul li[name=t'+w.id+']').click(function(){
        var w=layoutmanager.windowlist[$(this).attr('name').substring(1)]
        if(w.status=='normal'||w.status=='maximized'){
            w.status='minimized'
            $('.window[name=x'+w.id+']').hide()
        }else if(w.status=='minimized'){
            w.status='normal'
            $('.window[name=x'+w.id+']').show()
        }
        return false
    })
    resize_taskbar()
}
