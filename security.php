<?php
/**
 * STI : Projet 2 - Messenger
 * Authors : Julien Béguin
 * Date : 04.01.2021
 */

/*
 * [Project2] Encode html entities
 */
function sanitizeTextInput($input) {
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

/*
 * [Project2] Only allow numeric value. Return filtered input.
 */
function sanitizeIntegerInput($input) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
}

/*
 * [Project2] Input must be a valid role. If not, return DEFAULT_ROLE
 */
function sanitizeRoleInput($input) {
    return in_array($input, array(ROLE_COLLABORATOR, ROLE_ADMIN)) ? $input : DEFAULT_ROLE;
}

/*
 * [Project2] Encode special chars but allow <blockquote> to format cascaded answers
 */
function sanitizeOutput($output) {
    $result = $output;
    $result = str_replace('<blockquote>', "[START]", $result);
    $result = str_replace('</blockquote>', "[END]", $result);
    $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
    $result = str_replace("[START]", '<blockquote>', $result);
    $result = str_replace("[END]", '</blockquote>', $result);
    return $result;
}
