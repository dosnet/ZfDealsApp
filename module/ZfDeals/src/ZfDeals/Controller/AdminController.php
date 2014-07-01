<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZfDeals\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Annotation\AnnotationBuilder;

class AdminController extends AbstractActionController
{
    private $productAddForm;
    private $productMapper;

    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function addProductAction()
    {
        $form = $this->productAddForm;

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());

            if ($form->isValid()) {
                $model = new ViewModel(
                    array(
                        'form' => $form
                    )
                );

                try {
                    $this->productMapper->insert($form->getData());
                    $model->setVariable('success', true);
                } catch (\Exception $e) {
                    $model->setVariable('insertError', true);
                }

                return $model;
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

