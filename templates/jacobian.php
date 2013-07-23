<!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>/bin/nch</title>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8" />
        <link href="docs/scesi/nonchalant.png" rel="icon" />
        <link href="<?php echo $this->template_dir . '/style.css' ?>"
              media="screen"
              rel="stylesheet" type="text/css" />
        <script type="text/javascript"
                src="<?php echo $this->template_dir
                    . '/jquery-1.7.1.min.js' ?>"></script>
        <script type="text/javascript"
                src="<?php echo $this->template_dir
                    . '/jacobian.js' ?>"></script>
    </head>
    <body class="c4">
        <div id="wrapper">
            <div id="wrapper2">
                <div id="main">
                    <pre><?php foreach ($this->history as $output) {
                        echo $output;
                    } ?></pre>
                    <form action="/" method="post" accept-charset="utf8">
                        <span class="prompt"><?php echo $this->ps1 ?>
                        </span><input id="command"
                               name="command"
                               type="text"
                               autocomplete="off" />
                    </form>
                </div>
            </div>
        </div>
        <div id="footer">
            <ul>
                <li>
                    <a href="http://www.scesi.memi.umss.edu.bo/"
                       target="_BLANK">SCESI</a>
                </li>
                <li>
                    <a href="http://www.memi.umss.edu.bo/"
                       target="_BLANK">MEMI</a>
                </li>
                <li>
                    <a href="https://github.com/ccaballero/nonchalant"
                       target="_BLANK">Código fuente</a>
                </li>
            </ul>
        </div>
    </body>
</html>
