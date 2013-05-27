/* taskbar definition */

var Taskbar=new(function(){
    this.tags=[]
    this.count=0
    this.active=0
    this.resize=function(){
    var res_width=$('#taskbar div.home').width()+1
        +$('#taskbar div.tags').width()+1
        +$('#taskbar div.layout').width()+1+2
    var width=width_navigator()-res_width
    var count_tasks=$('#taskbar div.tasks ul li.task').length
    $('#taskbar div.tasks').css('width',width+'px')
    $('#taskbar div.tasks ul li.task').each(function(){
        $(this).css('width',(width/count_tasks)+'px')
    })}
})()

$(window).resize(Taskbar.resize)
$(document).ready(Taskbar.resize)
