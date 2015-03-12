<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$commentableModels = MainConfiguration::commentableModels();
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'TV Series',

    // preloading 'log' component
    //'preload' => array('log'),



    // autoloading model and component classes
    'import' => require(dirname(__FILE__) . '/import.php'),

    'modules' => require(dirname(__FILE__) . '/modules.php'),

    // application components
    'components' => require(dirname(__FILE__) . '/components.php'),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),

);