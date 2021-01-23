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

// [Project2] Protect form with anti-CSRF token
$calc = hash_hmac('sha256', 'answerMessage.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_POST['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('index.php');
}

if(isset($_GET['id']) && isset($_POST['content'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);
    $contentInput = sanitizeTextInput($_POST['content']);

    // [Projet2] Prepare SQL statement
    $req = Database::getInstance()->prepare("SELECT messages.*, users.id AS sender FROM messages INNER JOIN users ON messages.sender = users.id WHERE messages.id = ?");
    $req->execute([$id]);
    $message = $req->fetch();

    $content = '<blockquote>'.$message['content'].'</blockquote>'.$contentInput;
    $recipient = $message['sender'];
    $subject = 'RE: '.$message['subject'];

    // [Project2] Avoid answer's spoofing where an attacker could set an arbitrary sender
    $sender = Auth::getInstance()->getUser()->getId();

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
