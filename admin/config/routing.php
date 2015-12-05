<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 29.11.2015
 * Time: 21:03
 */

namespace config;


class Routing
{
    protected static $routes = [
        'home' => '/admin',
        'auth' => '/admin/auth',
        'logout' => '/admin/auth/logout',
        'login' => '/admin/auth/login',
        'actions' => '/admin/actions',
        'actions_change_visibility' => '/admin/actions/playPause',
        'actions_remove' => '/admin/actions/remove',
        'actions_create' => '/admin/actions/create',
    ];
}