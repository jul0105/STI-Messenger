<?php

use App\Database;

session_start();

require_once '../vendor/autoload.php';
require_once '../functions.php';

// On supprime l'ancienne db
$dbFile = dirname(__DIR__) . '/db/database.sqlite';
if (file_exists($dbFile)) {
    unlink($dbFile);
}

// Création de la nouvelle base de données
$db = Database::getInstance();

// Création des tables
$db->query('CREATE TABLE IF NOT EXISTS users (
    id          INTEGER PRIMARY KEY,
    username    VARCHAR(255) NOT NULL,
    password    VARCHAR(255),
    role        VARCHAR(255),
    status      BOOLEAN
)');

$db->query('CREATE TABLE IF NOT EXISTS messages (
    id          INTEGER PRIMARY KEY,
    sender      INTEGER NOT NULL,
    recipient   INTEGER NOT NULL,
    date        DATETIME NOT NULL,
    subject     TEXT,
    content     TEXT,
    FOREIGN KEY (sender)
        REFERENCES users(id)
            ON DELETE NO ACTION
            ON UPDATE CASCADE,
    FOREIGN KEY (recipient) 
        REFERENCES users(id)
            ON DELETE NO ACTION
            ON UPDATE CASCADE
)');

// Insertion de données de base
$req = $db->prepare('INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)');
$req->execute([
    'gil',
    password_hash('1234', PASSWORD_DEFAULT),
    'admin',
    true
]);
$req = $db->prepare('INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)');
$req->execute([
    'julien',
    password_hash('1234', PASSWORD_DEFAULT),
    'admin',
    true
]);
$req = $db->prepare('INSERT INTO users (username, password, role, status) VALUES (?, ?, ?, ?)');
$req->execute([
    'albert',
    password_hash('1234', PASSWORD_DEFAULT),
    'collaborator',
    true
]);

setFlash('Database initialisée.');
redirect('index.php');