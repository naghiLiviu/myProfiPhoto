<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 12/22/15
 * Time: 10:00 AM
 */
namespace myProfiPhoto\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        parent ::__construct('myprofiphoto');
        $this->setAttribute('method', 'POST');


        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'username',
            'type' => 'Zend\Form\Element\Text',
            'options'=> array(
                'label' => 'Username',
            ),
            'attributes' => array(
                'id' => 'username',
                'class'=>'',
                'autocomplete'=>'OFF',
                'max'=>'100',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'id' => 'password',
                'class'=>'',
                'autocomplete'=>'OFF',
                'max'=>'100',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));


    }
}