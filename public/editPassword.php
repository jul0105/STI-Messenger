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

Auth::restricted();

// [Project2] Protect form with anti-CSRF token
$calc = hash_hmac('sha256', 'editPassword.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_POST['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('profile.php');
}

if(isset($_GET['id']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['newPasswordRepeat'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    // [Project2] User cannot modify another user's password
    if ($id != Auth::getInstance()->getUser()->getId()) {
        setFlash('Accès interdit.', 'danger');
        redirect('profile.php');
        return;
    }

    // [Project2] Prepare SQL statement
    $req = Database::getInstance()->prepare("SELECT * FROM users WHERE id = ?");
    $req->execute([$id]);
    $user = $req->fetch();

    // [Project2] Store strongly hashed password
    if (password_verify($_POST['oldPassword'], $user['password'])) {
        if ($_POST['newPassword'] == $_POST['newPasswordRepeat']) {
            $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

            $req = Database::getInstance()->prepare('UPDATE users SET password = ? WHERE id = ?');
            $req->execute([
                $newPassword,
                $id
            ]);
            setFlash('Mot de passe modifié avec succès.');
        } else {
            setFlash('Les mots de passe saisis ne sont pas identiques.', 'danger');
        }
    } else {
        setFlash('L\'ancien mot de passe est incorrect.', 'danger');
    }
}

redirect('profile.php');
