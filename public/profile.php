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

$user = Auth::getInstance()->getUser();

include '../parts/header.php';

?>
    <div class="container">
        <h2 class="text-center mb-4">Changer de mot de passe</h2>
        <form action="/editPassword.php?id=<?=$user->getId() ?>" method="post" class="w-50 mx-auto">
            <input type="hidden" name="token" value="<?= hash_hmac('sha256', 'editPassword.php', $_SESSION['internal_token']); // [Project2] Protect form with anti-CSRF token  ?>" />
            <div class="form-group">
                <label for="oldPassword">Ancien mot de passe</label>
                <input type="password" id="oldPassword" name="oldPassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="newPassword">Nouveau mot de passe</label>
                <input type="password" id="newPassword" name="newPassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="newPasswordRepeat">Nouveau mot de passe (répéter)</label>
                <input type="password" id="newPasswordRepeat" name="newPasswordRepeat" class="form-control">
            </div>
            <button type="submit" role="button" class="btn btn-primary btn-block">Confirmer</button>
        </form>
    </div>
<?php

include '../parts/footer.php';
