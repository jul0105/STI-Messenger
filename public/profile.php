<?php

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
