<?php

require_once '../includes.php';

\App\Auth::getInstance()->logout();
setFlash('Vous êtes maintenant déconnecté.');
redirect('login.php');