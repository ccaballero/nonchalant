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
    this.buildTags=function(){
        var tpl='<li class="tag"><a href=""></a></li>'
        var tags=''
        for(i=0;i<config.tags;i++)
            tags+=tpl
        $('.tags ul').html(tags)
        $('.tags ul li:first').attr('class', 'tag active')
        $('.tags ul li a').each(function(index, element){
            $(element).html(index+1)
    })}})()

$(document).ready(function(){
    Taskbar.buildTags()
    $('.home a').click(function(){
        $('#menu').toggleClass('visible')
        return false
    })
    $('.tags ul li.tag a').click(function(){
        return false
    })
    $('.layout a').click(function(){
        return false
    })
    if(config.taskbar.orientation=='top'){
        $('#taskbar').css('top', '0px')
        $('#desktop')
            .css('top', ($('#taskbar').height())+'px')
            .css('bottom', '0px')
    }})

$(window).resize(Taskbar.resize)
$(document).ready(Taskbar.resize)
