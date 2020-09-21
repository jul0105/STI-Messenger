<?php
session_start();

require_once __DIR__ . '/constants.php';
require_once APP_ROOT . '/functions.php';

if(!file_exists(APP_ROOT . '/db/database.sqlite')) {
    header('Location: /initdb.php');
    die();
}

require_once APP_ROOT . '/vendor/autoload.php';
