<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

require_once '../includes.php';

\App\Auth::getInstance()->logout();
setFlash('Vous êtes maintenant déconnecté.');
redirect('login.php');
