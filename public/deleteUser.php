<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted(ROLE_ADMIN);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // [Projet2] Prepare SQL statement
    $req = Database::getInstance()->prepare("DELETE FROM users WHERE id = ?");
    $req->execute([$id]);

    setFlash('Utilisateur supprimé.');
}

redirect('admin.php');
