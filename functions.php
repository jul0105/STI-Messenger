<?php

function setFlash($content, $type = 'success') {
    $_SESSION['flash']['content'] = $content;
    $_SESSION['flash']['type'] = $type;
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show mb-4">
                    ' . $_SESSION['flash']['content'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
              </div>';
        unset($_SESSION['flash']);
    }
}

function redirect($page) {
    header('Location: /' . $page);
    die();
}