<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:15 PM
 */
namespace myProfiPhoto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
// some funtions to be addded
    public function indexAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/index.phtml');
        return $viewModel;
    }

    public function loginAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/login.phtml');
        return $viewModel;
    }

    public function registerAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/register.phtml');
        return $viewModel;
    }

    public function logoutAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/logout.phtml');
        return $viewModel;
    }
}