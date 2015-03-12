<?php
return  array(
    'user' => array(
        // enable cookie-based authentication
        'class' => 'WebUser',
        'allowAutoLogin' => true,
        'loginUrl' => 'user/login',

    ),
    'widgetFactory' => array(
        widgets => require(dirname(__FILE__) . '/widgets.php'),

    ),
    'clientScript' => array(
        'scriptMap' => array(
            'jquery-ui.css' => false,
        )
    ),
    'authManager'=>array(
        //'class'=>'CDbAuthManager',
        'class'=>'PhpAuthManager',
        //'connectionID'=>require(dirname(__FILE__) . '/db.php'),
        'defaultRoles' => array('guest')
    ),
    'urlManager' => array(
        'urlFormat' => 'path',
        'showScriptName' => false,
        'rules' => require(dirname(__FILE__) . '/route.php'),
    ),

    'db' => require(dirname(__FILE__) . '/db.php'),

    'errorHandler' => array(
        // use 'site/error' action to display errors
        'errorAction' => 'site/error',
    ),
    'log' => array(
        'class' => 'CLogRouter',
        'routes' => array(
            array(
                'class' => 'CFileLogRoute',
                'levels' => 'error, warning',
            ),
            // uncomment the following to show log messages on web pages

//                                array(
//                                    'class'=>'CWebLogRoute',
//                                ),

        ),
    ),
);