<?php

// Настройки всей системы
function settings()
{
    return [
        'site' => [  // Настройки сайта
            'title' => 'LightDev',
            'keywords' => '',
            'description' => ''
        ],

        'freekassa' => [  // Настройки freekassa
            'key' => 'merchant_secret',
            'shop_id' => 'merchant_id'
        ],

        'rcon' => [ // Настройки rcon
            'ip' => 'localhost',
            'port' => '25565',
            'password' => 'secret'
        ],

        'server' => [
            'ip' => '192.168.1.1:25565'
        ],

        'links' => [
            'vk' => 'https://vk.com/idmaksik69',
            'support' => 'https://vk.com/support'
        ],
        // Vk виджет
        'widget' => [
            'id' => '20003922', // id Группы
        ],
        'contacts' => [
            'mail' => '',
            'admin' => '',
            'group-server' => ''
        ]
    ];
}