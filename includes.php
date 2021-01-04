<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

session_start();

require_once __DIR__ . '/constants.php';
require_once APP_ROOT . '/functions.php';
require_once APP_ROOT . '/security.php';

if(!file_exists(APP_ROOT . '/db/database.sqlite')) {
    header('Location: /initdb.php');
    die();
}

require_once APP_ROOT . '/vendor/autoload.php';
