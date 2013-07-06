<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8" />
    </head>
    <body>
        <pre><?php echo implode(PHP_EOL, $this->history); ?></pre>
        <form action="" method="post">
            <input name="command"
                   type="text" />
            <input type="submit"
                   value="execute"/>
        </form>
    </body>
</html>
