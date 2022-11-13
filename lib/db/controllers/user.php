<?php
include_once 'lib/db/index.php';
include_once 'lib/db/models/user.php';

class UserController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * Looks up a user by their username
     * @param string $username
     * returns a User object or null if no user is found
     */
    public function findUserByName($name)
    {
        // create our query
        $query = "SELECT * FROM admin WHERE username = '$name'";

        // run our query
        try {
            $result = $this->db->query($query);

            // check if we have any results
            if ($result->num_rows > 0) {
                
                // get the first row
                $row = $result->fetch_assoc();

                // create a new user object
                return new User($row['username'], $row['password'], false, $row['id']);
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * Looks up a user by their id
     * @param int $id
     * returns a User object or null if no user is found
     */
    public function findUserById($id)
    {
        $query = "SELECT * FROM admin WHERE id = '$id'";

        try {
            $result = $this->db->query($query);

            // check if we have any results
            if ($result->num_rows > 0) {
                
                // get the first row
                $row = $result->fetch_assoc();

                // create a new user object
                return new User($row['username'], $row['password'], false, $row['id']);
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     *Verifies a user's login attempt
     * @param string $username
     * @param string $password
     * returns a User object or false if the login attempt fails
     */
    public function verifyLogin($username, $password)
    {
        // find the user by name
        $user = $this->findUserByName($username);

        // check if the user exists
        if ($user) {
            // verify the password
            if ($user->verifyPassword($password)) {
                // return the user
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Creates a new user and adds them to the Admin table
     */
    public function createUser($username, $password)
    {
        try {
            // create a new user
            $usr = new User($username, $password);

            // create a query to insert the user into the database
            $username = $usr->getUsername();
            $password = $usr->getPassword();

            $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

            // run the query
            $result = $this->db->query($query);

            if ($result) {
                // get the last inserted id
                $id = $this->db->getLastInsertedId();
                // set the id on the user object and return it
                $usr->setId($id);
                return $usr;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    /**
     * Gets all users from the Admin table
     * returns an array of User objects or null if there is an error
     */
    public function getAll()
    {
        $query = "SELECT * FROM admin";

        try {
            $result = $this->db->query($query);

            // check if we have any results
            if ($result->num_rows > 0) {
                $users = [];
                while ($row = $result->fetch_assoc()) {
                    $users[] = new User($row['username'], $row['password'], false, $row['id']);
                }
                return $users;
            } else {
                return [];
            }
        } catch (\Throwable $th) {
            return null;
        }
    }
}

