/* window manager definition */

var WindowManager=new(function(){
    this.list=[]
    this.count=0
    this.active=0
    this.create=function(title,content,top,left,width,height){
        this.list[++this.count]=new Window(this.count,title,content,top,left,width,height)
        return this.list[this.count]
    }
    this.minimize=function(id){
        var w=this.list[id]
        w.status='minimized'
        $('.window[name=x'+id+']').hide()
    }
    this.maximize=function(id){
        var w=this.list[id]
        w.status='maximized'
        $('.window[name=x'+id+']')
            .css('top','0px')
            .css('left','0px')
            .css('width',($('#desktop').width())+'px')
            .css('height',($('#desktop').height())+'px')
    }
    this.restore=function(id){
        var w=this.list[id]
        w.status='normal'
        $('.window[name=x'+id+']')
            .css('top',w.top)
            .css('left',w.left)
            .css('width',w.width)
            .css('height',w.height)
            .show()
        this.activate(id)
    }
    this.close=function(id){
        $('.window[name=x'+id+']').remove()
        $('.tasks ul li[name=t'+id+']').remove()
        this.list[id] = {}
    }
    this.activate=function(id){
        $('.window[name=x'+this.active+']').removeClass('active')
        $('.tasks ul li[name=t'+this.active+']').removeClass('active')
        $('.window[name=x'+id+']').addClass('active')
        $('.tasks ul li[name=t'+id+']').addClass('active')
        this.active=id
    }
})()
