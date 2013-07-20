<?php

abstract class FS_Tree_Default implements FS_Tree {
    public $name;
    public $parent;
    protected $children;
    protected $attribute;
    
    public function __construct($name, $parent, $attribute = null) {
        $this->name = $name;
        $this->parent = $parent;
        $this->children = array();
        $this->attribute = $attribute;
    }
    
    public function addChild($node) {
        $this->children[] = $node;
    }
    
    public function getChildren() {
        return $this->children;
    }

    public function getAttribute() {
        return $this->attribute;
    }

    public function setChildren($children) {
        $this->children = $children;
    }

    public function setAttribute($attribute) {
        $this->attribute = $attribute;
    }
    
    public abstract function exists($node);
    
    public function sync() {
        foreach ($this->children as $child) {
            $child->sync();
        }
    }
}
