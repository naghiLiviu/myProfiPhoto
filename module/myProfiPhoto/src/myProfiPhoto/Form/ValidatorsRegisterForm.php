<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/21/15
 * Time: 9:52 AM
 */

namespace myProfiPhoto\Form;

use Zend\InputFilter\InputFilter;


class ValidatorsRegisterForm
{
    public function registerFormInputFilter()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name'     => 'firstName',
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
                        'min'      => 1,
                        'max'      => 30,
                    ),
                ),
                array(
                    'name' => 'Zend\I18n\Validator\Alpha',
                    'options' => array(
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'larstName',
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
                        'min'      => 1,
                        'max'      => 20,
                    ),
                ),
                array(
                    'name' => 'Zend\I18n\Validator\Alpha',
                    'options' => array(
                        'allowWhiteSpace' => true,
                    ),
                ),
            ),
        ));

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
                        'min'      => 1,
                        'max'      => 20,
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'email',
            'required' => true,
            'filters'  => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'Zend\Validator\EmailAddress',
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

        $inputFilter->add(array(
            'name'     => 'confirmPassword',
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
                array(
                    'name' => 'Zend\Validator\Identical',
                    'options' => array(
                        'token' => 'password'
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'gender',
            'required' => true,
        ));

        return $inputFilter;

    }
}