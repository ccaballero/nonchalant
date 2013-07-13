<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>/bin/nch</title>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8" />
        <link href="docs/scesi/nonchalant.png" rel="icon" />
        <link href="<?php echo $this->template_dir . '/style.css' ?>"
              media="screen"
              rel="stylesheet" type="text/css" />
    </head>
    <body class="c3">
        <div id="header" />
        <div id="wrapper">
            <div id="wrapper2">
                <div id="main">
                <?php foreach ($this->history as $output) { ?>
                    <pre><?php echo $output ?></pre>
                <?php } ?>
                    <form action="" method="post">
                        <span class="prompt"><?php echo $this->ps1 ?></span>
                        <input id="command" name="command"
                               type="text" autocomplete="off"
                               onkeypress="this.style.width=((this.value.length + 1) * 8) + 'px';" />
                    </form>
                </div>
            </div>
        </div>
        <div id="footer">
            <a href="http://www.scesi.memi.umss.edu.bo/" target="_BLANK">SCESI</a>
            <a href="http://www.memi.umss.edu.bo/" target="_BLANK">MEMI</a>
            <a href="https://github.com/ccaballero/nonchalant">Código fuente</a>
        </div>
        <script type="text/javascript">
            window.onload=function(){document.getElementById("command").focus();}
        </script>
    </body>
</html>
