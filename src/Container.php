<?php

namespace App;

use App\CategoryRepository;
use App\ExportCategoriesHandler;
use ReflectionClass;

class Container {
    private array $objects = [];

    public function has (string $id) : bool {
        return isset($this->objects[$id]);
    }

    public function get (string $id) : mixed { 
        return  isset($this->objects[$id]) ? $this->objects[$id] : $this->prepareObject($id) ;
    }

    public function prepareObject (string $class) : object {
        $classReflector = new ReflectionClass($class);


        $constructReflector = $classReflector->getConstructor();

        if (empty($constructReflector)) {
            return new $class;
        }

        $constructArguments = $constructReflector->getParameters();
        if (empty($constructArguments)) {
            return new $class;
        }

        $args = [];

        foreach ($constructArguments as $argument) {
            $argumentType = $argument->getType()->getName();
            $args[$argument->getName()] = $this->get($argumentType);
        }

        return new $class(...$args);
    }
}