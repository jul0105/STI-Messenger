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
$calc = hash_hmac('sha256', 'editUser.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_POST['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('admin.php');
}

if(isset($_GET['id'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['role']) && !empty($_POST['role'])) {
        // [Project2] Sanitize input
        $username = sanitizeTextInput($_POST['username']);
        $role = sanitizeRoleInput(['role']);

        // [Project2] Store strongly hashed password
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $status = isset($_POST['status']);

        $req = Database::getInstance()->prepare('UPDATE users SET username = ?, password = ?, role = ?, status = ? WHERE id = ?');
        $req->execute([
            $username,
            $password,
            $role,
            $status,
            $id
        ]);

        setFlash('Utilisateur modifié avec succès.');
        redirect('admin.php');
    } else {
        setFlash('Erreur lors de la modification de l\'utilisateur.', 'danger');
        redirect('newUser.php?id=' . $id);
    }
} else {
    setFlash('Requête invalide', 'danger');
}

