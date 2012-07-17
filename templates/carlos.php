<?php echo $this->doctype('HTML5') ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>/bin/nch</title>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8" />
        <link href="docs/scesi/nonchalant.png" rel="icon" />
        <link href="css/carlos/style.css" media="screen"
              rel="stylesheet" type="text/css" />
    </head>
    <body class="c5">
        <div id="header" />
        <div id="wrapper">
            <div id="wrapper2">
                <div id="main">
                    <pre><?php echo $this->output ?></pre>
                    <form action="" method="post">
                        <span class="prompt"><?php echo $this->escape($this->hostname) ?>!<?php echo $this->escape($this->user) ?>&nbsp;<?php echo $this->escape($this->prompt) ?></span>
                        <input id="command" name="comando" type="text" autocomplete="off" onkeypress="this.style.width=((this.value.length + 1) * 8) + 'px';" />
                    </form>
                </div>
            </div>
        </div>
        <div id="footer"><a href="http://www.scesi.memi.umss.edu.bo/" target="_BLANK">SCESI</a><a href="http://www.memi.umss.edu.bo/" target="_BLANK">MEMI</a><a href="https://github.com/ccaballero/nonchalant">Código fuente</a></div>
        <script type="text/javascript">window.onload=function(){document.getElementById("command").focus();}</script>
    </body>
</html>
