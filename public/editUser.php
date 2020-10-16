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
    $id = $_GET['id'];
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['role']) && !empty($_POST['role'])) {
        $username = $_POST['username'];
        $password = base64_encode($_POST['password']);
        $role = $_POST['role'];
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

