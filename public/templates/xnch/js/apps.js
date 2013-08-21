var TerminalApp=new(function(){
    this.tpl_start='<pre></pre><form action="" method="post"><input name="command" type="text" /><input type="submit" value="execute"/></form>'
    
    this.start=function(){
        return this.tpl_start
    }
})()