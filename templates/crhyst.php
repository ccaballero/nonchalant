
<html>
    <head>
        <title>---NonchaLant---</title>
        <link href="css/crhyst/css.css" media="screen" rel="stylesheet" type="text/css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <!--    <body BACKGROUND="img/crhyst.jpg" BGPROPERTIES="fixed">-->

    <body onload="activarPrimerControl()">
        <script language="JavaScript">
            function activarPrimerControl()
            {
                document.comnd.comando.focus();
            }
        </script>

        <style>
            body
            { background-image: url('img/crhyst/crhyst.jpg');
              background-repeat: no-repeat;
              background-attachment: fixed;
              background-position: 50% 0%;
            }

        </style>
        <header>
        </header>
        <article>
            <pre><?php foreach ($this->outputs as $output) { ?><span class="prompt"><?php echo $this->escape($this->hostname) ?>!<?php echo $this->escape($this->user) ?>&nbsp;<?php echo $this->escape($this->prompt) ?></span><?php echo $output ?><?php } ?></pre>
            <form action="" method="post">
                <span class="prompt"><?php echo $this->escape($this->hostname) ?>!<?php echo $this->escape($this->user) ?>&nbsp;<?php echo $this->escape($this->prompt) ?></span>
                <input id="command" name="comando" type="text" autocomplete="off" onkeypress="this.style.width=((this.value.length + 1) * 8) + 'px';" />
            </form>
        </article>


        <!--    <div id="footer" >
               
                <a class="right" href="http://scesi.fcyt.umss.edu.bo/" target="_BLANK">SCESI</a>
                <a class="right" href="http://www.memi.umss.edu.bo/" target="_BLANK">MEMI</a>
                <a class="right" href="/static/terms">Términos de uso</a>
                <a class="right" href="/static/privacy">Privacidad</a>
        
                <a class="right" href="/static/development">Desarrollo</a>
                <a class="right" href="https://github.com/ccaballero/babel">Código fuente</a>
                <a class="right" href="/help">Ayuda</a>
            </div>-->

    </body>

</html>
