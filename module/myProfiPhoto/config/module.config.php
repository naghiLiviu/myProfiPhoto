<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'myProfiPhoto\Controller\Index' => 'myProfiPhoto\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'album' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/myprofiphoto[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'myProfiPhoto\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
    'home' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/',
            'defaults' => array(
                'controller' => 'Application\Controller\myProfiPhoto',
                'action'     => 'index',
            ),
        ),
    ),
);
