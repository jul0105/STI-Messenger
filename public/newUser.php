<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

use App\Auth;
use App\Database;

require_once '../includes.php';

Auth::restricted(ROLE_ADMIN);

$edit = false;
if (isset($_GET['id'])) {
    // [Project2] Sanitize input
    $id = sanitizeIntegerInput($_GET['id']);

    // [Projet2] Prepare SQL statement
    $req = Database::getInstance()->prepare("SELECT username, role, status FROM users WHERE id = ?");
    $req->execute([$id]);
    $user = $req->fetch();

    $username = $user['username'];
    $role = $user['role'];
    $status = $user['status'];
    $edit = true;
}

include '../parts/header.php';

?>
    <div class="container">
        <div class="mb-3">
            <? if ($edit): ?>
                <h2>Modifier <?= $username ?></h2>
            <? else: ?>
                <h2>Nouvel utilisateur</h2>
            <? endif; ?>
        </div>

        <form action="<?= $edit ? "editUser.php?id=$id" : "newUserExec.php" ?>" method="post" class="needs-validation"
              novalidate>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="username" name="username"
                           required <?= $edit ? "value=\"$username\"" : '' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Rôle</label>
                <div class="col-sm-10">
                    <select class="form-control" id="role" name="role">
                        <option <?= $edit ? ($role == ROLE_COLLABORATOR ? 'selected' : '') : '' ?>><?= ROLE_COLLABORATOR ?></option>
                        <option <?= $edit ? ($role == ROLE_ADMIN ? 'selected' : '') : '' ?>><?= ROLE_ADMIN ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Statut</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="status"
                               name="status" <?= $edit ? ($status == STATUS_ACTIVE ? 'checked' : '') : 'checked' ?>>
                        <label class="form-check-label" for="status">
                            Activé
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <? if ($edit): ?>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    <? else: ?>
                        <button type="submit" class="btn btn-success">Créer</button>
                    <? endif; ?>
                </div>
            </div>
        </form>

    </div>
<?php

include '../parts/footer.php';
