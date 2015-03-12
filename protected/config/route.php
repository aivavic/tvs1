<?php
return array(
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',

//    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

   '<action:(login|logout|about|registration)>'=>'site/<action>',
    'admin/setting'=>'Setting/index',
    'admin/users'=>'User/admin',
    'admin/actors'=>'Actor/admin',
    'admin/tv-series'=>'Tvseries/admin',
    'add-news'=>'news/create',

    'all-tv-series'=>'tvseries/index',
    'new-tv-series'=>'tvseries/newTvSeries',
    'news'=>'news/index',
    'actors'=>'actor/index',


);