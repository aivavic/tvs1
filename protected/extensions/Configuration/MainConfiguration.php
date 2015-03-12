<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.03.2015
 * Time: 14:25
 */
class MainConfiguration
{


    public static function commentableModels()
    {

        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.json';

        $content = file_get_contents($file);
        $options = json_decode($content, true);


        return array(
                'Series' => array(
                    'registeredOnly' => $options['options']['registeredOnly'],
                    'useCaptcha' => $options['options']['useCaptcha'],
                    'allowSubcommenting' => $options['options']['allowSubcommenting'],
                    'premoderate' => $options['options']['premoderate'],
                    'pageUrl' => array(
                        'route' => 'admin/series/view',
                        'data' => array('id' => 'id'),
                    ),
                ),

        );

    }


}