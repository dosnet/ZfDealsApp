<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfDeals\Entity;

/**
 * Description of Product
 *
 * @author Rafa
 */
class Product
{
    protected $id;
    protected $name;
    protected $stock;
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    
    public function getStock()
    {
        return $this->stock;
    }

    }
