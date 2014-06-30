<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfDeals\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of AdminControllerFactory
 *
 * @author Rafa
 */
class AdminControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $ctr = new AdminController();
        
        $form = new \ZfDeals\Form\ProductAdd();
        $form->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
        $form->bind(new \ZfDeals\Entity\Product());
        $ctr->setProductAddForm($form);
        
        $mapper = $serviceLocator->getServiceLocator()->get('ZfDeals\Mapper\Product');
        
        $ctr->setProductMapper($mapper);
        return $ctr;
    }

}
