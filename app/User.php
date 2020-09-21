<?php


namespace App;


class User {

    private $username;
    private $role;
    private $status;

    /**
     * User constructor.
     * @param $username
     * @param $role
     * @param $status
     */
    public function __construct($username, $role, $status) {
        $this->username = $username;
        $this->role = $role;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }


}