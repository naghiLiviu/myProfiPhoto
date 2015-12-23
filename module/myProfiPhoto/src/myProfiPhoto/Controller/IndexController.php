<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:15 PM
 */
namespace myProfiPhoto\Controller;

use myProfiPhoto\Form\RegisterForm;
use myProfiPhoto\Model\UserTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use myProfiPhoto\Form\LoginForm;

class IndexController extends AbstractActionController
{
    protected $userTable;

    public function indexAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/index.phtml');
        return $viewModel;
    }

    public function loginAction()
    {
        $form = new LoginForm();
//        $user = new UserTable();

        $request = $this->getRequest();
        if($request->isPost()){
            $postData = $request->getPost();
//            \Zend\Debug\Debug::dump($postData);
            $form->setData($request->getPost());
//            \Zend\Debug\Debug::dump($form->setData($request->getPost()));
            if($form->isValid()){
                $this->getUserTable()->login($postData['username'], $postData['password']);
            }
        }
        $viewModel = new ViewModel(
            array('form' => $form,)
        );
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/login.phtml');
        return $viewModel;


    }

    /**
     * adding form
     * sending them to mock
     *
     * @return ViewModel
     */
    public function registerAction()
    {
        $form = new RegisterForm();

        $viewModel = new ViewModel(
            array('form' => $form,)
        );
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/register.phtml');
        return $viewModel;
    }

    public function logoutAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/logout.phtml');
        return $viewModel;
    }

    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('myProfiPhoto\Model\UserTable');
        }
        return $this->userTable;
    }

}