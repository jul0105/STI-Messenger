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

Auth::restricted(ROLE_ADMIN);

$users = Database::getInstance()->query('SELECT id, username, role, status FROM users')->fetchAll();

include '../parts/header.php';

?>
    <div class="container">
        <div class="row">
            <h2>Utilisateurs</h2>
            <a href="newUser.php" class="btn btn-lg btn-success mb-3 ml-3"><i class="fa fa-plus"></i> Ajouter</a>
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user['id'] ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['status'] == STATUS_ACTIVE ? "Activé" : "Désactivé" ?></td>
                    <td>
                        <a href="newUser.php?id=<?= $user['id'] ?>" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                        <a href="deleteUser.php?id=<?= $user['id'] ?>&token=<?= hash_hmac('sha256', 'deleteUser.php', $_SESSION['internal_token']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php

include '../parts/footer.php';
