<?php

/**
 * @package ImpressPages
 */

 return array(
    'sessionName' => 'ses1119650872', // prevents session conflict when two sites runs on the same server
    'developmentEnvironment' => 1, // displays error and debug information. Change to 0 before deployment to production server
    'showErrors' => 1, // 0 if you don't wish to display errors on the page
    'debugMode' => 0, // Debug mode loads raw unminified JavaScript files, alerts AJAX errors.
    'timezone' => 'Europe/Berlin', // PHP 5 requires timezone to be set.
    'db' => array (
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'tablePrefix' => 'ip_',
        'database' => 'impresspages',
        'charset' => 'utf8',
      ), // Database configuration
);