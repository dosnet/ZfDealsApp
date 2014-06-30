<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace zfDeals\Form;

use Zend\Form\Form;

/**
 * Description of ProductAdd
 *
 * @author Rafa
 */
class ProductAdd extends Form
{
    public function __construct()
    {
        parent::__construct('login');
        $this->setAttribute('action', '/deals/admin/product/add');
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'type' => 'ZfDeals\Form\ProductFieldSet',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));
        
        $this->add(array(
           'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'submit',
            ),
        ));
        
    }
}
