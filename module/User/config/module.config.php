<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'myProfiPhoto\Controller\Index' => 'myProfiPhoto\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /admin/:controller/:action

            'admin' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/myProfiPhoto',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'module'        => 'user',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/id/:id][/planid/:planid][/docid/:docid][/page/:page][/order_by/:order_by][/:order]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'         => '[a-zA-Z0-9_-]+',
                                'planid'     => '[a-zA-Z0-9_-]+',
                                'docid'      => '[0-9]+',
                                'page'       => '[0-9]+',
                                'order_by'   => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'order' => 'ASC|DESC',
                            ),

                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'myprofiphoto' => __DIR__ . '/../view',
        ),
    ),
    'home' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route'    => '/',
            'defaults' => array(
                'controller' => 'Application\Controller\Index',
                'action'     => 'index',
            ),
        ),
    ),
);
