<?php


namespace App;


class User {

    private $id;
    private $username;
    private $role;
    private $status;

    /**
     * User constructor.
     * @param $id
     * @param $username
     * @param $role
     * @param $status
     */
    public function __construct($id, $username, $role, $status) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
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