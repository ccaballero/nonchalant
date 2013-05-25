/* common function of extract information and utilities for resizing */

var width_navigator=function(){
    if(window.innerWidth){
        return window.innerWidth
    }else{
        return document.documentElement.clientWidth
    }}

var height_navigator=function(){
    if(window.innerWidth){
        return window.innerWidth
    }else{
        return document.documentElement.clientWidth
    }}

var resize_taskbar=function(){
    var res_width=$('#panel div.home').width()+1
        +$('#panel div.tags').width()+1
        +$('#panel div.layout').width()+1+2
    var width=width_navigator()-res_width
    var count_tasks=$('#panel div.tasks ul li.task').length
    $('#panel div.tasks').css('width',width+'px')
    $('#panel div.tasks ul li.task').each(function(){
        $(this).css('width',width/count_tasks)
    })}
