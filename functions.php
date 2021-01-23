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

/**
 * Set a new flash message (info message at the top of the next page) in session
 * @param string $content Flash content
 * @param string $type Type of flash (color)
 */
function setFlash($content, $type = 'success') {
    $_SESSION['flash']['content'] = $content;
    $_SESSION['flash']['type'] = $type;
}

/**
 * Get flash message in session
 */
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

/**
 * Redirect to another page
 * @param string $page page to redirect to
 */
function redirect($page) {
    header('Location: /' . $page);
    die();
}
