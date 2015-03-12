<?php


return array(

    'gii' => array(
        'class' => 'system.gii.GiiModule',
        'password' => '211605',
        'ipFilters' => array('127.0.0.1', '::1', '46.118.20.*', '212.92.232.*'),
    ),
    'forum' => array(
        'class' => 'application.modules.forum.YiiForumModule',
    ),
    'comments' => array(
        'defaultModelConfig' => array(
            'registerOnly' => true,
            'useCaptcha' => false,
            'allowSubcommenting' => true,
            'premoderate' => false,
            'postCommentAction' => 'comments/comment/postComment',
            'isSuperuser' => false,
            'orderComments' => 'DESC',
        ),

        'commentableModels' => $commentableModels,
        'userConfig' => array(
            'class' => 'User',
            'nameProperty' => 'username',
            'emailProperty' => 'email',
        ),
    ),
);