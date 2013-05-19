<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8" />
    </head>
    <body>
        <pre><?php echo $this->historial ?></pre>
        <form action="" method="post">
            <input type="hidden"
                   name="historial"
                   value="<?php echo $this->historial ?>" />
            <input type="hidden"
                   name="vars"
                   value="<?php echo htmlentities(serialize($this->vars)) ?>" />
            <input name="command"
                   type="text" />
            <input type="submit"
                   value="execute"/>
        </form>
    </body>
</html>
