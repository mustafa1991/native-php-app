<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/User.php');

class UserRepository
{
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
            $stmt = $db->prepare("INSERT INTO users (fname, email) VALUES (:fname, :email)");
            $stmt->bindValue(':fname', $data['fname']);
            $stmt->bindValue(':email', $data['email']);
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
            $stmt = $db->prepare("SELECT * FROM users");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }
}