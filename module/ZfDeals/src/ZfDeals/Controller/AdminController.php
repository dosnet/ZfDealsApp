<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfDeals\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function addProductAction()
    {
        $form = new \ZfDeals\Form\ProductAdd();
        
        if ($this->getRequest()->isPost()) {
            $form->setHydrator(new \Zend\Stdlib\Hydrator\Reflection());
            $form->bind(new \ZfDeals\Entity\Product());
            $form->setData($this->getRequest()->getPost());
            
            if ($form->isValid()) {
                $newEntity = $form->getData();
                $mapper = $this->getServiceLocator()->get('ZfDeals\Mapper\Product');
                
                $mapper->insert($newEntity);
                $form = new \ZfDeals\Form\ProductAdd();
                
                return new ViewModel(
                    array(
                        'form' => $form,
                        'success' => true
                    )
                );
            } else {
                return new ViewModel(
                    array(
                        'form' => $form
                    )
                );
            }
        } else {
            return new ViewModel(
                array(
                    'form' => $form
                )
            );
        }
    }
    
    public function setProductAddForm($productAddForm)
    {
        $this->productAddForm = $productAddForm;
    }

    public function getProductAddForm()
    {
        return $this->productAddForm;
    }

    public function setProductMapper($productMapper)
    {
        $this->productMapper = $productMapper;
    }

    public function getProductMapper()
    {
        return $this->productMapper;
    }
}

