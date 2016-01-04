<?php
/**
 * Created by PhpStorm.
 * User: slobodan
 * Date: 12/21/15
 * Time: 10:49 AM
 */

namespace myProfiPhoto;

use myProfiPhoto\Model\ContactDetail;
use myProfiPhoto\Model\ContactDetailTable;
use myProfiPhoto\Model\Photo;
use myProfiPhoto\Model\PhotoTable;
use myProfiPhoto\Model\Social;
use myProfiPhoto\Model\SocialTable;
use myProfiPhoto\Model\Topic;
use myProfiPhoto\Model\TopicTable;
use myProfiPhoto\Model\User;
use myProfiPhoto\Model\UserTable;
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
                'myProfiPhoto\Model\UserTable' =>  function($sm) {
                    $tableGateway = $sm->get('UserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'UserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new User());
                    return new TableGateway('User', $dbAdapter, null, $resultSetPrototype);
                },
                'myProfiPhoto\Model\ContactDetailTable' =>  function($sm) {
                    $tableGateway = $sm->get('ContactDetailTableGateway');
                    $table = new ContactDetailTable($tableGateway);
                    return $table;
                },
                'ContactDetailTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ContactDetail());
                    return new TableGateway('ContactDetail', $dbAdapter, null, $resultSetPrototype);
                },
                'myProfiPhoto\Model\TopicTable' =>  function($sm) {
                    $tableGateway = $sm->get('TopicTableGateway');
                    $table = new TopicTable($tableGateway);
                    return $table;
                },
                'TopicTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Topic());
                    return new TableGateway('Topic', $dbAdapter, null, $resultSetPrototype);
                },
                'myProfiPhoto\Model\PhotoTable' =>  function($sm) {
                    $tableGateway = $sm->get('PhotoTableGateway');
                    $table = new PhotoTable($tableGateway);
                    return $table;
                },
                'PhotoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Photo());
                    return new TableGateway('Photo', $dbAdapter, null, $resultSetPrototype);
                },
                'myProfiPhoto\Model\SocialTable' =>  function($sm) {
                    $tableGateway = $sm->get('SocialTableGateway');
                    $table = new SocialTable($tableGateway);
                    return $table;
                },
                'SocialTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Social());
                    return new TableGateway('Social', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }


}