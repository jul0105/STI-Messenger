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

if(isset($_POST['recipient']) && isset($_POST['subject'])) {
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $sender = Auth::getInstance()->getUser()->getId();

    $req = Database::getInstance()->prepare("INSERT INTO messages (sender, recipient, subject, content) VALUES (?, ?, ?, ?)");
    $req->execute([
       $sender,
       $recipient,
       $subject,
       $content
    ]);

    setFlash('Message envoyé avec succès.');
}

redirect('index.php');
