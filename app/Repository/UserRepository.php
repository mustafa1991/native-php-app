<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/User.php');

class UserRepository
{
    /**
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * UserRepository constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Create user
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table (fname, email, password) VALUES (:fname, :email, :password)");
            $stmt->bindValue(':fname', $data['fname']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':password', md5($data['password']));
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Get all users
     *
     * @return array
     */
    public function getAll(): array
    {
        $result = [];

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Get user by id
     *
     * @return User
     */
    public function getById($id)
    {
        $result = null;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table where id = :user_id");
            $stmt->bindValue(':user_id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Update user
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set fname=:fname, email=:email, password=:password where id = :user_id");
            $stmt->bindValue(':user_id', $user->getId());
            $stmt->bindValue(':fname', $user->getFname());
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', md5($user->getPassword()));
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Update user
     *
     * @param int $user
     * @return bool
     */
    public function deleteById($id): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM $this->table where id = :user_id");
            $stmt->bindValue(':user_id', $id);
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * User login
     *
     * @param $email
     * @param $password
     * @return User|null
     */
    public function login($email, $password)
    {
        $result = null;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table where email = :email and password = :password limit 1");
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', md5($password));
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }
}