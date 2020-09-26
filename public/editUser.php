<?php

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted(ROLE_ADMIN);

if(isset($_GET['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    $id = $_GET['id'];
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
}

redirect('admin.php');
