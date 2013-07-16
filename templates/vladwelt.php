<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $this->template_dir . '/jquery.css' ?>"
              media="screen"
              rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->template_dir . '/style.css' ?>"
              media="screen"
              rel="stylesheet" type="text/css" />
        <script type="text/javascript"
                src="<?php echo $this->template_dir . '/jquery-1.7.1.min.js' ?>"></script>
        <script type="text/javascript"
                src="<?php echo $this->template_dir . '/jquery-ui-1.8.18.custom.min.js' ?>"></script>
        <script type="text/javascript"
                src="<?php echo $this->template_dir . '/vladwelt.js' ?>"></script>
    </head>
    <body class="c3">
        
        <div id="wrapper">
                <div id="main">
                    <div id="title">&nbsp;</div>
                    <div id="content">
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
    </body>
</html>
