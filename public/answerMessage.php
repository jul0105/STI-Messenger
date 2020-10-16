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

if(isset($_GET['id']) && isset($_POST['content'])) {
    $id = $_GET['id'];

    $message = Database::getInstance()->query("SELECT messages.*, users.id AS sender FROM messages INNER JOIN users ON messages.sender = users.id WHERE messages.id = '$id'")->fetch();
    $content = '<blockquote>'.$message['content'].'</blockquote>'.$_POST['content'];
    $sender = $message['recipient'];
    $recipient = $message['sender'];
    $subject = 'RE: '.$message['subject'];

    $req = Database::getInstance()->prepare("INSERT INTO messages (sender, recipient, subject, content) VALUES (?, ?, ?, ?)");
    $req->execute([
        $sender,
        $recipient,
        $subject,
        $content
    ]);

    setFlash('Réponse envoyé avec succès.');
}

redirect('index.php');
