<?php

use App\Auth;

require_once '../includes.php';

if (!empty($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(Auth::getInstance()->login($username, $password)) {
        setFlash('Vous êtes maintenant connecté.');
        redirect('index.php');
    } else {
        setFlash('Utilisateur ou mot de passe incorrect', 'danger');
    }
}

include APP_ROOT . '/parts/header.php';
?>

<div class="container mt-4">
    <h1 class="text-center mb-4">Connexion</h1>
    <div class="d-flex justify-content-center align-items-center">
        <div>
            <h2 class="text-center mb-4">Nouveau compte</h2>
            <form action="/register.php" method="post" class="w-50 mx-auto" style="min-width: 400px; max-width: 500px">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password1">Mot de passe</label>
                    <input type="password" id="password1" name="password1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password2">Répéter le mot de passe</label>
                    <input type="password" id="password2" name="password2" class="form-control" required>
                </div>
                <button type="submit" role="button" class="btn btn-primary btn-block">S'inscrire</button>
            </form>
        </div>
        <div class="separator"></div>
        <div>
            <h2 class="text-center mb-4">J'ai déjà un compte</h2>
            <form action="/login.php" method="post" class="w-50 mx-auto" style="min-width: 400px; max-width: 500px">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" role="button" class="btn btn-primary btn-block">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php

include APP_ROOT . '/parts/footer.php';