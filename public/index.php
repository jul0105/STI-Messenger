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

$users = Database::getInstance()->query('SELECT id, username FROM users')->fetchAll();
$userId = Auth::getInstance()->getUser()->getId();
// [Projet2] Prepare SQL statement
$req = Database::getInstance()->prepare("SELECT messages.*, users.username AS sender FROM messages INNER JOIN users ON messages.sender = users.id WHERE recipient = ? ORDER BY messages.date DESC");
$req->execute([$userId]);
$messages = $req->fetchAll();

include '../parts/header.php';

?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h2 class="mb-3 text-center">Boîte de réception</h2>
                <button type="button" class="btn btn-outline-primary btn-block mb-3" data-toggle="modal"
                        data-target="#newMessageModal">
                    <i class="fa fa-feather-alt"></i> Nouveau message
                </button>
                <div class="list-group" id="list-tab" role="tablist">
                    <?php foreach ($messages as $message): ?>
                        <a class="list-group-item list-group-item-action" id="list-message-<?= $message['id'] ?>"
                           data-toggle="list"
                           href="#message-<?= $message['id'] ?>" role="tab">
                            <div class="d-flex justify-content-between">
                                <h5><?= $message['sender'] ?></h5>
                                <small><?= date('d.m.Y à H:i', strtotime($message['date'])) ?></small>
                            </div>
                            <div><?= $message['subject'] ?></div>
                        </a>
                    <?php endforeach; ?>
                    <?php if (empty($messages)): ?>
                        <div class="text-muted font-italic text-center">Aucun message dans la boîte de réception</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content">
                    <?php foreach ($messages as $message): ?>
                        <div class="tab-pane" id="message-<?= $message['id'] ?>" role="tabpanel">
                            <div class="btn-group mb-4" role="group" aria-label="First group">
                                <a href="deleteMessage.php?id=<?= $message['id'] ?>&token=<?= hash_hmac('sha256', 'deleteMessage.php', $_SESSION['internal_token']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer
                                </a>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <strong>De :</strong>
                                    <?= $message['sender']; ?>
                                </div>
                                <div>
                                    <strong>Sujet :</strong>
                                    <?= $message['subject']; ?>
                                </div>
                                <div style="white-space: pre-line">
                                    <?= $message['content'] ? $message['content'] : '<div class="text-muted font-italic">Message vide</div>' ?>
                                </div>

                                <form action="answerMessage.php?id=<?= $message['id'] ?>" method="post">
                                    <input type="hidden" name="token" value="<?= hash_hmac('sha256', 'answerMessage.php', $_SESSION['internal_token']); ?>" />
                                    <textarea id="content" name="content" class="form-control mb-3 mt-4" rows="3" required></textarea>
                                    <button type="submit" class="btn btn-primary float-right ml-3"><i class="fa fa-reply"></i> Répondre</button>
                                    <button type="reset" class="btn btn-secondary float-right"><i class="fa fa-broom"></i> Annuler</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- New message modal -->
    <div class="modal fade" id="newMessageModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="newMessage.php" method="post" class="needs-validation" novalidate>
                    <input type="hidden" name="token" value="<?= hash_hmac('sha256', 'newMessage.php', $_SESSION['internal_token']); ?>" />
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-feather-alt"></i> Nouveau message
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient">Destinataire</label>
                            <select name="recipient" id="recipient" class="custom-select" required>
                                <option value="" disabled selected hidden>- Sélectionnez un destinataire -</option>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                <? endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Veuillez choisir un destinataire.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <input type="text" id="subject" name="subject" class="form-control" required>
                            <div class="invalid-feedback">
                                Veuillez entrer un sujet pour votre message.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea id="content" name="content" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary"><i class="fa fa-broom"></i> Effacer</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php

include '../parts/footer.php';
