<?php

use App\Auth;
use App\Database;

require_once '../includes.php';

if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
    $username = $_POST['username'];
    $password = base64_encode($_POST['password1']);
    $password2 = base64_encode($_POST['password2']);

    $username_valid = Database::getInstance()->query("SELECT count(username) AS nb FROM users WHERE username = '".$username."'")->fetch();

    if ($username_valid['nb'] == '0') {
        if ($password == $password2) {
            $req = Database::getInstance()->prepare("INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)");
            $req->execute([
                $username,
                $password,
                ROLE_COLLABORATOR,
                STATUS_ACTIVE
            ]);

            setFlash('Inscription avec succès. Vous pouvez maintenant vous connecter.');
        } else {
            setFlash('Les mots de passe saisis ne sont pas identiques.', 'danger');
        }
    } else {
        setFlash('Ce nom d\'utilisateur est déjà utilisé.', 'danger');
    }
}
redirect('login.php');

