<?php

class Vi
{
    public function main($getopt) {
        $arguments = $getopt->arguments;
        $file = '';

        switch (count($arguments)) {
            case 1:
                $file = file_get_contents(translate($arguments[0]));
                break;
        }
        
       $tpl = <<<EOL
<form method="post" action="">
    <input type="submit" value="Guardar" />
    <textarea name="edit" class="editor">$file</textarea>
</form>
EOL;
       echo $tpl;
    }
}