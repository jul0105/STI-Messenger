<?php

use App\Auth;

require_once '../includes.php';

Auth::restricted();

include '../parts/header.php';

include '../parts/footer.php';