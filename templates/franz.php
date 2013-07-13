<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel=stylesheet href="css/franz/style.css" type="text/css">
	<script language="JavaScript">
	    function activarPrimerControl() {
		document.cmd.command.focus();
	    }
	</script>
    </head>
    <body onload="activarPrimerControl()">
	<div class="transbox">
	    <pre>
		<?php echo implode(PHP_EOL, $this->history) ?>
	    </pre>
	    <div class="comando">
		<form name="cmd" action="" method="post">
			<?php echo $this->ps1 ?>
			<input name="command" type="text" autocomplete="off" />
		</form>
	    </div>
	</div>
    </body>
</html>
