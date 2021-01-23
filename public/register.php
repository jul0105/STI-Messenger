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

if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
    // [Project2] Sanitize input
    $username = sanitizeTextInput($_POST['username']);

    // [Project2] Prepare SQL statement
    $req = Database::getInstance()->prepare("SELECT count(username) AS nb FROM users WHERE username = ?");
    $req->execute([$username]);
    $username_valid = $req->fetch();

    if ($username_valid['nb'] == '0') {
        if ($_POST['password1'] == $_POST['password2']) {
            // [Project2] Store strongly hashed password
            $password = password_hash($_POST['password1'], PASSWORD_BCRYPT);

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

