<html>
    <head>
        <title>Nonchalant</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            body {
                background: none repeat scroll 0 0 orange;
                font-family: monospace;
                font-size: 12px;
                height: 99%;
                margin: 0;
                padding: 0;
            }
            input[type="text"] {
                border: 1px dashed #707070;
                background: orange;
                width: 50%;
            }
            #consola{
                border-radius: 0px 10px 0px 10px;
                text-align: center;
                background: graytext;
                color: whitesmoke;
            }
        </style>
    </head>
    <body>
        
        <div id="consola">
            mi consola
        </div>
        <pre><?php echo implode('', $this->outputs) ?></pre>
        <form action="" method="post">
            <input name="comando" type="text" />
        </form>
    </body>
</html>
