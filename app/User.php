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
     * @return mixed User ID
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed Username
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return mixed Role: admin or collaborator
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * @return mixed Status: active or inactive
     */
    public function getStatus() {
        return $this->status;
    }


}
