<?php

/**
 * Created by PhpStorm.
 * User: my1-asus
 * Date: 12/18/15
 * Time: 3:16 PM
 */
namespace myProfiPhoto\Form;

use Zend\Form\Form;
use Zend\InputFilter\Input;

class RegisterForm extends Form
{
// some funtions to be addded
    public function __construct($name = null)
    {
        parent::__construct('myprofiphoto');

        $this->setAttribute('method', 'POST');

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden'
        ));

        $this->add(array(
            'name' => 'firstName',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'placeholder' => 'type your first name',
            ),
        ));

        $this->add(array(
            'name' => 'lastName',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'placeholder' => 'type your last name',
            ),
        ));

        $this->add(array(
            'name' => 'birthDate',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Insert birth day',
            ),
            'attributes' => array(
                'placeholder' => '__/__/____'
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
            'attributes' => array(
                'placeholder' => 'retype your password'
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'gender',
            'options' => array(
                'label' => 'Select Gender',

            ),
            'attributes' => array(
                'options' => array(
                    'Male' => 'Male',
                    'Female' => 'Female',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'g-recaptcha-response',
            'type' => 'Zend\Form\Element\Text',
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Register',
                'id' => 'submitbutton',
                'class' => 'btn-link'
            ),
        ));
    }
}




