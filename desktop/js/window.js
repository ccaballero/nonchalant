/* window definition */

function Window(id,title,content,top,left,width,height){
    this.id=id
    this.title=title
    this.content=content
    this.top=top
    this.left=left
    this.width=width
    this.height=height
    this.status='normal'
    this.render=function(){
        return '<div name="x'+this.id+'" class="window">'
            +'<div class="border"><div class="title">'+this.title+'</div>'
            +'<div class="controls">'
            +'<a class="minimize" href="">-</a>'
            +'<a class="maximize" href="">o</a>'
            +'<a class="close" href="">x</a></div></div>'
            +'<div class="content">'+this.content+'</div></div>'
    }
    this.task=function(){
        return '<li name="t'+this.id+'" class="task">'
            +'<a href="">'+this.title+'</a></li>'
    }
}
