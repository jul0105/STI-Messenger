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

// [Project2] Protect form with anti-CSRF token
$calc = hash_hmac('sha256', 'newUserExec.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_POST['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('admin.php');
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    // [Project2] Sanitize input
    $username = sanitizeTextInput($_POST['username']);
    $role = sanitizeRoleInput($_POST['role']);

    // [Projet2] Store strongly hashed password
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $status = isset($_POST['status']);

    $req = Database::getInstance()->prepare("INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)");
    $req->execute([
        $username,
        $password,
        $role,
        $status
    ]);

    setFlash('Utilisateur créé avec succès.');
}

redirect('admin.php');
