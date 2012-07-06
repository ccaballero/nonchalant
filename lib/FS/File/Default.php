<?php

abstract class FS_File_Default implements FS_File {
    protected $attribute;
    protected $opened_files;
    
    public function __construct(Collections_Listable $listable, $attribute = null) {
        $this->attribute = $attribute;
        $this->opened_files = $listable;
    }
    public function getAttribute() {
        return $this->attribute;
    }

    public function setAttribute($attribute) {
        $this->attribute = $attribute;
    }

                
}