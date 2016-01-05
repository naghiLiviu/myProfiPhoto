<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:15 PM
 */
namespace myProfiPhoto\Controller;

use myProfiPhoto\Form\RegisterForm;
use myProfiPhoto\Form\ValidatorsRegisterForm;
use myProfiPhoto\Model\User;
use myProfiPhoto\Model\UserTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use myProfiPhoto\Form\LoginForm;

class IndexController extends AbstractActionController
{
    protected $userTable;
    protected $contactDetailTable;

    public function indexAction()
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('myprofiphoto/myprofiphoto/index.phtml');
        return $viewModel;
    }

    public function loginAction()
    {
        $form = new LoginForm();

        $request = $this->getRequest();
        if($request->isPost()){
            $postData = $request->getPost();
            $form->setData($request->getPost());
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

        $request = $this->getRequest();

        if ($request->isPost()) {
            $data = $request->getPost();
            $validator = new ValidatorsRegisterForm();
            $form->setInputFilter($validator->getInputFilter());

            $form->setData($data);
            $valid = $form->isValid();
            if($valid) {
                if (!$this->getUserTable()->verifyUser('LiviuAdmin', 'liviu.naghi93@gmail.com')) {
                    echo 'sugeo';
                }
                $this->getUserTable()->registerUser($data['username'], $data['password'], $data['email']);
                $this->getContactDetailTable()->insertUserDetail($data['firstName'], $data['lastName'],
                    $data['birthDate'], $data['gender']);
            } else {
                echo 'Please fill in all the fields';
            }

        }

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

    public function getContactDetailTable()
    {
        if (!$this->contactDetailTable) {
            $sm = $this->getServiceLocator();
            $this->contactDetailTable = $sm->get('myProfiPhoto\Model\ContactDetailTable');
        }
        return $this->contactDetailTable;
    }



}