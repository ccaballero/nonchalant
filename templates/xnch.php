<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>/bin/xnch</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <?php
            $css= array('jquery','all','taskbar','desktop','menu','window');
            foreach ($css as $value) {
                echo '<link media="screen" rel="stylesheet" type="text/css" href="'.$this->template_dir.'/css/'.$value.'.css" />';
            }
            $js = array('jquery-1.7.1.min','jquery-ui-1.8.18.custom.min','desktop', 'common', 'window','manager','factory','taskbar','menu','apps');
            foreach ($js as $script){
                echo '<script type="text/javascript" src="'.$this->template_dir.'/js/'.$script.'.js"></script>';
            }
        ?>
    </head>
    <body>
        <div id="desktop"></div>
        <div id="taskbar">
            <div class="home"><a href="">:)</a></div>
            <div class="tags"><ul></ul></div>
            <div class="tasks"><ul></ul></div>
            <div class="layout"><a href="">#</a></div>
        </div>
        <div id="menu">
            <ul>
                <li class="item"><a class="a_terminal" href="">terminal</a></li>
            </ul>
        </div>
    </body>
</html>
