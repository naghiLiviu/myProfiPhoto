<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/21/15
 * Time: 10:49 AM
 */

namespace myProfiPhoto;

use myProfiPhoto\Model\myProfiPhoto;
use myProfiPhoto\Model\myProfiPhotoTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'myProfiPhoto\Model\myProfiPhotoTable' =>  function($sm) {
                    $tableGateway = $sm->get('myProfiPhotoTableGateway');
                    $table = new myProfiPhotoTable($tableGateway);
                    return $table;
                },
                'myProfiPhotoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new myProfiPhoto());
                    return new TableGateway('myProfiPhoto', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }


}