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
$calc = hash_hmac('sha256', 'newMessage.php', $_SESSION['internal_token']);
if (!(hash_equals($calc, $_POST['token']))) {
    setFlash('Token invalide.', 'danger');
    redirect('index.php');
}

if(isset($_POST['recipient']) && isset($_POST['subject'])) {
    // [Project2] Sanitize input
    $recipient = sanitizeTextInput($_POST['recipient']);
    $subject = sanitizeTextInput($_POST['subject']);
    $content = sanitizeTextInput(isset($_POST['content']) ? $_POST['content'] : '');

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
