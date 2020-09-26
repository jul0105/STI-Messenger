<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Messenger</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">STI Messenger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Boîte de réception</a>
                </li>
            </ul>
            <?php use App\Auth;

            if (($user = Auth::getInstance()->getUser()) !== false): ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bonjour, <?= $user->getUsername(); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile.php"><i class="fa fa-user"></i> Profil</a>
                            <?php if ($user->getRole() === ROLE_ADMIN): ?>
                                <a class="dropdown-item" href="/admin.php"><i class="fa fa-cog"></i> Administration</a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout.php"><i class="fa fa-sign-out-alt"></i> Déconnexion</a>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <?php getFlash(); ?>
</div>
