<?php


/**
 * @Entity
 * @Table(name="categories")
**/
class Category {
    
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     **/
    private int $id;

    /**
     * @Column(type="string")
    */
    private string $name;


    /**
     * @Column(type="string")
    */
    private string $alias;

    /**
     * @ManyToOne(targetEntity="Category", inversedBy="children")
    **/
    private ?Category $parent;
/*
    /**
     * @OneToMany(targetEntity="Category", mappedBy="parent")
    **/
//    private ?Category $children = null;


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

    public function getParent () : ?Category {
        return $this->parent;
    }
    public function setParent (?Category $category) : self {
        $this->parent = $category;
        return $this;
    }
/*
    public function getChildren () : ?Category {
        return $this->children;    
    }

    public function setChildren (?Category $category){
        $this->children = $category;
        return $this;    
    }
*/
}