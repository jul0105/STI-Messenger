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

if(isset($_GET['id'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['role']) && !empty($_POST['role'])) {
        // [Project2] Sanitize input
        $username = sanitizeTextInput($_POST['username']);
        $role = sanitizeRoleInput(['role']);

        // [Projet2] Store strongly hashed password
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

