<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel=stylesheet href="css/jmejia/reset.css" type="text/css">
        <link rel=stylesheet href="css/jmejia/style.css" type="text/css">
<script language="JavaScript">
function activarPrimerControl()
{
  document.cmd.comando.focus();
}
</script>
    </head>
    
    <body onload="activarPrimerControl()">
        <h1></h1>
        <pre><?php echo $this->output ?></pre>
        <form name="cmd" action="" method="post">
            <label>
                <?php echo $this->escape($this->hostname) ?>@
                <?php echo $this->escape($this->user)?>
                <?php echo $this->prompt?>
            </label>
            <input name="comando" type="text" autocomplete="off" />
        </form>
    </body
</html>
