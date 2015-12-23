<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/21/15
 * Time: 9:52 AM
 */

namespace myProfiPhoto\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\Filter\FilterInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\Validator\ValidatorInterface;
use Zend\InputFilter\InputFilterInterface;

class ValidatorsRegisterForm implements InputFilterAwareInterface
{
    protected $inputFilter;


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {


        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();


            $inputFilter->add($factory->createInput(array(
                'name' => 'firstName',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 30,
                        ),
                    ),
                    array(
                        'name' => 'Zend\I18n\Validator\Alpha',
                        'options' => array(
                            'allowWhiteSpace' => true,
                        ),
                    ),
                ),
            )));


            $inputFilter->add($factory->createInput(array(
                'name' => 'lastName',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 1,
                            'max' => 20,
                        ),
                    ),
                    array(
                        'name' => 'Zend\I18n\Validator\Alpha',
                        'options' => array(
                            'allowWhiteSpace' => true,
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'username',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 8,
                            'max' => 20,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\EmailAddress',
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'password',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 8,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'confirmPassword',
                'required' => true,
                'filters' => array(
                    array('name' => 'Zend\Filter\StripTags'),
                    array('name' => 'Zend\Filter\StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 8,
                        ),
                    ),
                    array(
                        'name' => 'Zend\Validator\Identical',
                        'options' => array(
                            'token' => 'password'
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'g-recaptcha-response',
                'require' => 'true',
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'gender',
                'required' => true,
            )));
            $this->inputFilter = $inputFilter;

        }
        return $this->inputFilter;
    }
}
