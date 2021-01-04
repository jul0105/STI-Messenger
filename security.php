<?php
/**
 * STI : Projet 2 - Messenger
 * Authors : Julien Béguin
 * Date : 04.01.2021
 */

function sanitizeTextInput($input) {
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

function sanitizeIntegerInput($input) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
}

function sanitizeRoleInput($input) {
    return in_array($input, array(ROLE_COLLABORATOR, ROLE_ADMIN)) ? $input : DEFAULT_ROLE;
}
