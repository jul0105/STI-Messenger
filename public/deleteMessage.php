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

if(isset($_GET['id'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    // [Project2] User cannot delete another user's message
    $req = Database::getInstance()->prepare("SELECT recipient FROM messages WHERE id = ?");
    $req->execute([$id]);
    $user = $req->fetch();

    if ($user['recipient'] == AUTH::getInstance()->getUser()->getId()) {

        // [Projet2] Prepare SQL statement
        $req = Database::getInstance()->prepare("DELETE FROM messages WHERE id = ?");
        $req->execute([$id]);

        setFlash('Message supprimé.');
    }
}

redirect('index.php');
