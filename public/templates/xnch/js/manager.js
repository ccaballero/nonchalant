/* window manager definition */

var WindowManager=new(function(){
    this.list={}
    this.count=0
    this.active=0
    this.create=function(title,content,top,left,width,height){
        this.list[++this.count]=new Window(this.count,title,content,top,left,width,height)
        return this.list[this.count]
    }
    this.minimize=function(id){
        var w=this.list[id]
        w.status='minimized'
        $('.window[name='+config.window.selector+id+']').hide()
    }
    this.maximize=function(id){
        var w=this.list[id]
        w.status='maximized'
        $('.window[name='+config.window.selector+id+']')
            .css('top','0px')
            .css('left','0px')
            .css('width',($('#desktop').width())+'px')
            .css('height',($('#desktop').height())+'px')
    }
    this.restore=function(id){
        var w=this.list[id]
        w.status='normal'
        $('.window[name='+config.window.selector+id+']')
            .css('top',w.top)
            .css('left',w.left)
            .css('width',w.width)
            .css('height',w.height)
            .show()
        this.activate(id)
    }
    this.close=function(id){
        $('.window[name='+config.window.selector+id+']').remove()
        $('.tasks ul li[name='+config.taskbar.selector+id+']').remove()
        this.list[id] = {}
    }
    this.activate=function(id){
        $('.window[name='+config.window.selector+this.active+']').removeClass('active')
        $('.tasks ul li[name='+config.taskbar.selector+this.active+']').removeClass('active')
        $('.window[name='+config.window.selector+id+']').addClass('active')
        $('.tasks ul li[name='+config.taskbar.selector+id+']').addClass('active')
        this.active=id
    }
})()
