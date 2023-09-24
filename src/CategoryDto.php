<?php

namespace App;
class CategoryDto {
    private int $id;
    private string $name;
    private string $alias;
    private ?int $parentId = null; 


    public function __construct(int $id, string $name, string $alias, int $parentId=null) {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->parentId = $parentId;        
    }
    public function getId () : int {
        return $this->id;
    }

    public function setId (int $id) : self {
        $this->id = $id;
        return $this;
    }
    
    public function getName () : string {
        return $this->name;
    }

    public function setName (string $name) : self {
        $this->name = $name;
        return $this;
    }

    public function getAlias () : string {
        return $this->alias;
    }

    public function setAlias (string $alias) : self {
        $this->alias = $alias;
        return $this;
    }

    public function getParentId () : ?int {
        return $this->parentId;
    }
    
    public function setParentId (?int $parentId) : self {
        $this->parentId = $parentId;
        return $this;
    }

}