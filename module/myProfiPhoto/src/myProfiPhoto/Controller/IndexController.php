<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:15 PM
 */
class IndexController
{
// some funtions to be addded
    public function indexAction()
    {
        $viewModel = new \Zend\View\Model\ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/index.phtml');
        return $viewModel;
    }
}