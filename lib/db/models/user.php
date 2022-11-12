<?php
// create a user model class for our database

class User
{
    // Props

    private $id;
    private $email;
    private $username;
    private $password;
    // Constructor
    public function __construct($id, $email, $username, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $this->hashPassword($password);
    }

    // Methods
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
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
}
