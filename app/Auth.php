<?php


namespace App;


class Auth {

    private $user = null;

    private static $instance = null;

    /**
     * @return Auth
     */
    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password) {
        $user = Database::getInstance()->query("SELECT * FROM users WHERE username = '$username'")->fetch();
        if($user) {
            if(base64_decode($user['password']) === $password && $user['status']) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

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
     * @param string $role ROLE_COLLABORATOR ou ROLE_ADMIN
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