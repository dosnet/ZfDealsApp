<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace zfDeals\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Description of ProductFieldset
 *
 * @author Rafa
 */
class ProductFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @assert (0, 0) == 0
     * @assert (0, 1) == 1
     * @assert (1, 0) == 1
     * @assert (1, 1) == 2
     * @assert (1, 2) == 4
     */
    public function __construct()
    {
        parent::__construct('product');
        
        $this->add(array(
            'name' => 'id',
            'atributtes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Product-ID:',
            )
        ));
        
        $this->add(array(
            'name' => 'name',
            'atributtes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Name:',
            )
        ));
        
        $this->add(array(
            'name' => 'stock',
            'atributtes' => array(
                'type' => 'Text',
            ),
            'options' => array(
                'label' => 'Stock #:',
            )
        ));
    }
    
    public function getInputFilterSpecification()
    {
        return array(
            'id' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => "Product-ID cannot be empty!"
                        )
                    )
                ),
            ),'name' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => "Name cannot be empty!"
                        )
                    )
                ),
            ),
            'stock' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => "Stock # cannot be empty!"
                        )
                    ),
                    array(
                        'name' => 'Digits',
                        'options' => array(
                            'message' => "Stock # must be a number!"
                        )
                    ),
                    array(
                        'name' => 'GreaterThan',
                        'options' => array(
                            'min' => 0,
                            'message' => "Stock # must be >= 0!"
                        )
                    ),
                ),
            ),
        );
    }
}
