<?php
// create a user model class for our database

class User
{
    // Props
    private $id;
    private $username;
    private $password;
    // Constructor

    public function __construct($username, $password, $hash = true, $id=null)
    {
        $id && $this->id = $id;
        $this->username = $username;
        $this->password = $hash ? $this->hashPassword($password) : $password;
    }

    // Methods
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    private function hashPassword($password)
    {
        $cost = getenv('HASH_COST');
        $options = ['cost' => $cost];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function getPassword()
    {
        return $this->password;
    }
}
