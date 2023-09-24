<?php

namespace App;

class CategoryListDto {
    private array $items;

    public function __construct (array $items) {
        $this->items = $items;
    }

    public function setItems (array $items) : self {
        $this->items = $items;
        return $this;
    }
    public function getItems () : array {
        return $this->items;
    }
}