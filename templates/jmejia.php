<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel=stylesheet href="css/jmejia/reset.css" type="text/css">
        <link rel=stylesheet href="css/jmejia/style.css" type="text/css">
<script language="JavaScript">
function activarPrimerControl()
{
  document.cmd.command.focus();
}
</script>
    </head>
    
    <body onload="activarPrimerControl()">
        <h1></h1>
        <pre><?php echo implode(PHP_EOL, $this->history) ?></pre>
        <form name="cmd" action="" method="post">
            <label>
                <?php echo $this->ps1?>@
            </label>
            <input name="command" type="text" autocomplete="off" />
        </form>
    </body
</html>
