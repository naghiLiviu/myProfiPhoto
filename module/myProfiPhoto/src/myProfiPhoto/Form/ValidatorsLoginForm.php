<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 12/22/15
 * Time: 10:46 AM
 */

namespace myProfiPhoto\Form;

use Zend\InputFilter\InputFilter;

class ValidatorsLoginForm
{
    public function LoginFormInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name'     => 'username',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 4,
                        'max'      => 20,
                    ),
                ),
            ),
        ));
        $inputFilter->add(array(
            'name'     => 'password',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 8,
                    ),
                ),
            ),
        ));


    }
}