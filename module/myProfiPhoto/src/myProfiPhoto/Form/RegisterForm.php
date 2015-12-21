<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:16 PM
 */
namespace myProfiPhoto\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
// some funtions to be addded
    public function __construct($name = null)
    {
        parent::__construct('myprofiphoto');
        $this->add(array(
            'name' => 'firstName',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'placeholder' => 'insert your first name',
            ),
        ));

        $this->add(array(
            'name' => 'lastName',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'placeholder' => 'insert your last name',
            ),
        ));

        $this->add(array(
            'name' => 'age',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'values' => array(
                    'min' => '14',
                    'max' => '100',
                ),
                'label' => 'Age',
                'allow_empty' => false,
            ),
            'attributes' => array(
                'placeholder' => 'insert age',
            ),
        ));

        $this->add(array(
            'name' => 'username',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Username'
            ),
            'attributes' => array(
                'placeholder' => 'type your username',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'placeholder' => 'type your email',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'placeholder' => 'type you password',
            ),
        ));

        $this->add(array(
            'name' => 'confirmPassword',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Re-type Password'
            ),
            'attribute' => array(
                'placeholder' => 'retype your password'
            ),
        ));

        $this->add(array(
            'name' => 'gender',
            'type' => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Gender',
            ),
            'attributes' => array(
                '1' => 'Male',
                '2' => 'Female,'
            ),
        ));

        $this->add(array(
            'name' => 'captcha',
            'type' => 'Zend\Form\Element\Captcha',
            'options' => array(
                'label' => 'Please verify you are a human',
                'captcha' => array(
                    'class' => 'Dumb',
                ),
            ),
        ));
    }
}