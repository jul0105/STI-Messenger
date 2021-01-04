<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted();

if(isset($_GET['id']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['newPasswordRepeat'])) {
    $id = $_GET['id'];
    $oldPassword = base64_encode($_POST['oldPassword']);
    $newPassword = base64_encode($_POST['newPassword']);
    $newPasswordRepeat = base64_encode($_POST['newPasswordRepeat']);

    // [Projet2] Prepare SQL statement
    $req = Database::getInstance()->prepare("SELECT * FROM users WHERE id = ?");
    $req->execute([$id]);
    $user = $req->fetch();

    if ($user['password'] == $oldPassword) {
        if ($newPassword == $newPasswordRepeat) {
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
