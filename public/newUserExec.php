<?php

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted(ROLE_ADMIN);

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $role = $_POST['role'];
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
