<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 19:17
 */

namespace config;

class App
{
    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ADMIN_CONTROLLER = 'tables';
    const DEFAULT_ACTION = 'index';

    const NOTIFICATION_EMAIL = 'neket313@gmail.com';
    const SUPPORT_FROM_EMAIL = 'feedback@hookah-msk.ru';
    const SUPPORT_NAME = 'Кальянная на Отрадной';

    const EMAIL_REGEXP = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';
    const PHONE_REGEXP = '/^(\+7|8)[0-9]{10}$/';
}