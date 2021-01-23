<?php
/**
 * STI : Project 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 * ----------
 * STI : Project 2 - Secure Messenger
 * Authors : Julien Béguin & Gwendoline Dössegger
 * Date : 23.01.2021
 * Modification are tagged with "[Project2]" comment
 */

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted(ROLE_ADMIN);

// [Project2] Protect form with anti-CSRF token
$calc = hash_hmac('sha256', 'deleteUser.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_GET['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('admin.php');
}

if (isset($_GET['id'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    // [Project2] Prepare SQL statement
    $req = Database::getInstance()->prepare("DELETE FROM users WHERE id = ?");
    $req->execute([$id]);

    setFlash('Utilisateur supprimé.');
}

redirect('admin.php');
