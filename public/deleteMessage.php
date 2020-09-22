<?php

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = Database::getInstance()->query("DELETE FROM messages WHERE id = '$id'");
    setFlash('Message supprimé.');
}

redirect('index.php');
