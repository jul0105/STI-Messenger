<?php
/**
 * STI : Projet 1 - Messenger
 * Authors : Gil Baliser & Julien Béguin
 * Date : 16.10.2020
 */

namespace App;

/**
 * Class Auth
 * Singleton to manage authentification
 * @package App
 */
class Auth {

    private $user = null;

    private static $instance = null;

    /**
     * @return Auth Singleton instance
     */
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    /**
     * Try to login a user
     * @param $username
     * @param $password
     * @return boolean True if login succeed
     */
    public function login($username, $password) {
        // [Projet2] Prepare SQL statement
        $req = Database::getInstance()->prepare("SELECT * FROM users WHERE username = ?");
        $req->execute([$username]);
        $user = $req->fetch();

        if($user) {
            // [Projet2] Store strongly hashed password
            if (password_verify($password, $user['password']) && $user['status'] == STATUS_ACTIVE) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    /**
     * Clear session for user
     */
    public function logout() {
        unset($_SESSION['user']);
        $this->user = null;
    }

    /**
     * @return boolean
     */
    public function isLoggedIn() {
        return $this->getUser() !== false;
    }

    /**
     * Get the currently logged in user
     * @return User|false
     */
    public function getUser() {
        if(!$this->user) {
            if(isset($_SESSION['user'])) {
                $this->user = new User($_SESSION['user']['id'], $_SESSION['user']['username'], $_SESSION['user']['role'], $_SESSION['user']['status']);
            } else {
                return false;
            }
        }
        return $this->user;
    }

    /**
     * Redirect the user to login page if not enough rights
     * @param string $role ROLE_COLLABORATOR or ROLE_ADMIN
     */
    public static function restricted($role = ROLE_COLLABORATOR) {
        if(!self::getInstance()->isLoggedIn()) {
            redirect('login.php');
        }

        if ($role == ROLE_ADMIN && self::getInstance()->getUser()->getRole() != ROLE_ADMIN) {
            setFlash('Vous n\'avez pas accès à cette resource.', 'danger');
            redirect('index.php');
        }
    }

}
